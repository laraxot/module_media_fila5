<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Clusters\Test\Pages;

use Exception;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction;
use Modules\Media\Actions\Diagnostic\S3\BuildConfigDebugDataAction;
use Modules\Media\Actions\Diagnostic\S3\CheckBucketPolicyAction;
use Modules\Media\Actions\Diagnostic\S3\FormatDebugOutputAction;
use Modules\Media\Actions\Diagnostic\S3\RunS3SaveTestAction;
use Modules\Media\Actions\Diagnostic\S3\TestBucketPermissionsAction;
use Modules\Media\Actions\Diagnostic\S3\TestCloudFrontConnectionAction;
use Modules\Media\Actions\Diagnostic\S3\TestConnectionDetailsAction;
use Modules\Media\Actions\Diagnostic\S3\TestCredentialsAction;
use Modules\Media\Actions\Diagnostic\S3\TestFileUploadDownloadAction;
use Modules\Media\Filament\Clusters\Test;
use Modules\Xot\Filament\Pages\XotBasePage;
use Override;
use Webmozart\Assert\Assert;

/**
 * S3Test Page for AWS S3 testing and diagnostics.
 *
 * @property array<string, mixed> $debugResults
 */
class S3Test extends XotBasePage
{
    protected static ?string $cluster = Test::class;

    /** @var array<string, mixed> */
    public array $debugResults = [];

    private const TEST_FILE_PREFIX = 'test-upload-';

    private const DEBUG_OUTPUT_ROWS = 15;

    public function mount(): void
    {
        $this->fillForms();
    }

    /**
     * @return array<string>
     */
    protected function getForms(): array
    {
        return ['form'];
    }

    /**
     * @return array<Action>
     */
    #[Override]
    protected function getFormActions(): array
    {
        return [
            Action::make('testCredentials')->color('secondary')->action('testCredentials'),
            Action::make('testS3Connection')->color('info')->action('testS3Connection'),
            Action::make('testPermissions')->color('warning')->action('testPermissions'),
            Action::make('testBucketPolicy')->color('danger')->action('testBucketPolicy'),
            Action::make('testCloudFront')->color('success')->action('testCloudFront'),
            Action::make('testFileOperations')->color('primary')->action('testFileOperations'),
            Action::make('debugConfig')->color('gray')->action('debugConfig'),
            Action::make('clearResults')->color('warning')->action('clearResults'),
            Action::make('test01')->submit('test01'),
        ];
    }

    /**
     * @return array<int, Component>
     */
    protected function getFormSchema(): array
    {
        $prefix = Config::string('media-library.prefix');
        $attachmentDir = $prefix !== '' ? $prefix.'/form-attachments' : 'form-attachments';

        return [
            Grid::make(2)->schema([
                FileUpload::make('attachment')
                    ->disk('s3')
                    ->directory($attachmentDir)
                    ->visibility('private')
                    ->columnSpan(1),
                Textarea::make('debug_output')
                    ->rows(self::DEBUG_OUTPUT_ROWS)
                    ->default($this->getDebugOutput())
                    ->disabled()
                    ->columnSpan(1),
            ]),
        ];
    }

    protected function fillForms(): void
    {
        /** @phpstan-ignore-next-line */
        $this->form->fill(['debug_output' => $this->getDebugOutput()]);
    }

    public function test_s3_connection(): void
    {
        $this->debugResults['s3_connection'] = app(TestConnectionDetailsAction::class)->execute();
        $this->updateDebugOutput();
    }

    public function test_permissions(): void
    {
        $this->debugResults['permissions'] = app(TestBucketPermissionsAction::class)->execute();
        $this->updateDebugOutput();
    }

    public function test_cloud_front(): void
    {
        $this->debugResults['cloudfront'] = app(TestCloudFrontConnectionAction::class)->execute();
        $this->updateDebugOutput();
    }

    public function test_credentials(): void
    {
        $this->debugResults['credentials'] = app(TestCredentialsAction::class)->execute();
        $this->updateDebugOutput();

        Notification::make()
            ->title(__('media::s3test.notifications.credentials_tested'))
            ->success()
            ->send();
    }

    public function test_bucket_policy(): void
    {
        $this->debugResults['bucket_policy'] = app(CheckBucketPolicyAction::class)->execute();
        $this->updateDebugOutput();

        Notification::make()
            ->title(__('media::s3test.notifications.bucket_policy_tested'))
            ->success()
            ->send();
    }

    public function test_file_operations(): void
    {
        $this->debugResults['file_operations'] = app(TestFileUploadDownloadAction::class)->execute();
        $this->updateDebugOutput();

        Notification::make()
            ->title(__('media::s3test.notifications.file_operations_tested'))
            ->success()
            ->send();
    }

    public function debugConfig(): void
    {
        $this->debugResults['config'] = app(BuildConfigDebugDataAction::class)->execute();
        $this->updateDebugOutput();

        Notification::make()
            ->title(__('media::s3test.notifications.config_debugged'))
            ->success()
            ->send();
    }

    public function clearResults(): void
    {
        $this->debugResults = [];
        $this->updateDebugOutput();

        Notification::make()
            ->title(__('media::s3test.notifications.results_cleared'))
            ->success()
            ->send();
    }

    public function test01(): void
    {
        $filePath = $this->resolveAttachmentPath();
        if ($filePath === null) {
            return;
        }

        $signedUrl = app(GetCloudFrontSignedUrlAction::class)->execute($filePath, 60);

        $this->debugResults = [];
        $this->updateDebugOutput();
    }

    public function sendEmail(): void
    {
        try {
            $filePath = $this->resolveAttachmentPath();
            if ($filePath === null) {
                return;
            }

            $signedUrl = app(GetCloudFrontSignedUrlAction::class)->execute($filePath, 60);

            Log::debug('S3 Test Email Data', [
                'attachment_path' => $filePath,
                'signed_url' => $signedUrl,
                'timestamp' => now()->toISOString(),
            ]);

            Notification::make()
                ->success()
                ->title(__('media::s3test.notifications.email_sent'))
                ->body(__('media::s3test.notifications.email_with_attachment'))
                ->send();
        } catch (Exception $exception) {
            Log::error('S3 Test Email Failed', [
                'error' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            Notification::make()
                ->danger()
                ->title(__('media::s3test.notifications.email_failed'))
                ->body($exception->getMessage())
                ->send();
        }
    }

    public function save(): void
    {
        try {
            $results = app(RunS3SaveTestAction::class)->execute(
                $this->resolveAttachmentPath(allowMissing: true),
                self::TEST_FILE_PREFIX,
            );

            Notification::make()
                ->success()
                ->title(__('media::s3test.notifications.s3_test_successful'))
                ->body(__('media::s3test.notifications.operations_completed'))
                ->send();

            Log::debug('S3 Test Results', $results);
        } catch (Exception $exception) {
            Notification::make()
                ->danger()
                ->title(__('media::s3test.notifications.test_failed'))
                ->body($exception->getMessage())
                ->send();

            Log::error('S3 Test Failed', [
                'error' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString(),
            ]);
        }
    }

    private function getDebugOutput(): string
    {
        return app(FormatDebugOutputAction::class)->execute(
            $this->debugResults,
            __('media::s3test.debug.run_tests_message'),
        );
    }

    private function updateDebugOutput(): void
    {
        /** @phpstan-ignore-next-line */
        $this->form->fill(['debug_output' => $this->getDebugOutput()]);
    }

    private function resolveAttachmentPath(bool $allowMissing = false): ?string
    {
        /** @phpstan-ignore-next-line */
        $formState = $this->form->getState();
        Assert::isArray($formState, 'Form state must be array');

        $filePath = $formState['attachment'] ?? null;
        if ($filePath) {
            return (string) $filePath;
        }

        if ($allowMissing) {
            return null;
        }

        Notification::make()
            ->warning()
            ->title(__('media::s3test.notifications.no_attachment'))
            ->body(__('media::s3test.notifications.upload_file_first'))
            ->send();

        return null;
    }
}
