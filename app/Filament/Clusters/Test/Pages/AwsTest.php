<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Clusters\Test\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Modules\Media\Actions\Diagnostic\Aws\GetAwsConfigSnapshotAction;
use Modules\Media\Actions\Diagnostic\Aws\RunFullAwsDiagnosticAction;
use Modules\Media\Actions\Diagnostic\Aws\TestCloudFrontConfigAction;
use Modules\Media\Actions\Diagnostic\Aws\TestCloudFrontSignedUrlsAction;
use Modules\Media\Actions\Diagnostic\Aws\TestIamCredentialsAction;
use Modules\Media\Actions\Diagnostic\Aws\TestIamPoliciesAction;
use Modules\Media\Actions\Diagnostic\Aws\TestS3ConnectionAction;
use Modules\Media\Actions\Diagnostic\Aws\TestS3FileOperationsAction;
use Modules\Media\Actions\Diagnostic\Aws\TestS3PermissionsAction;
use Modules\Media\Filament\Clusters\Test;
use Modules\Xot\Filament\Pages\XotBasePage;

use function Safe\json_encode;

class AwsTest extends XotBasePage
{
    protected static ?string $cluster = Test::class;

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('super-admin') ?? false;
    }

    /** @var array<string, mixed> */
    public array $testResults = [];

    public string $activeTab = 's3';

    /** @var array<string, string> */
    public array $connectionTests = [
        's3' => 'Test S3 Connection',
        'cloudfront' => 'Test CloudFront',
        'iam' => 'Test IAM Permissions',
        'full' => 'Full Diagnostic',
    ];

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    protected function getS3TestSchema(): array
    {
        return [
            Section::make('S3 Connection Test')
                ->description('Verify S3 bucket access and permissions')
                ->schema([
                    Actions::make([
                        Action::make('test_s3_connection')
                            ->label(__('ui::aws_test.test_s3_connection'))
                            ->action('testS3Connection'),
                        Action::make('test_s3_permissions')
                            ->label(__('ui::aws_test.test_s3_permissions'))
                            ->color('warning')
                            ->action('testS3Permissions'),
                        Action::make('test_file_operations')
                            ->label(__('ui::aws_test.test_file_operations'))
                            ->color('success')
                            ->action('testS3FileOperations'),
                    ])->fullWidth(),
                    Textarea::make('s3_results')
                        ->label('S3 Test Results')
                        ->rows(10)
                        ->disabled()
                        ->default(fn () => json_encode($this->testResults['s3'] ?? [], JSON_PRETTY_PRINT)),
                ]),
        ];
    }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    protected function getCloudFrontTestSchema(): array
    {
        return [
            Section::make('CloudFront Test')->schema([
                TextInput::make('cloudfront_url')->default(config('filesystems.cloudfront.url')),
                Actions::make([
                    Action::make('test_cloudfront_config')->action('testCloudFrontConfig'),
                    Action::make('test_signed_urls')->action('testCloudFrontSignedUrls'),
                ]),
                Textarea::make('cloudfront_results')
                    ->label('CloudFront Test Results')
                    ->rows(10)
                    ->disabled()
                    ->default(fn () => json_encode($this->testResults['cloudfront'] ?? [], JSON_PRETTY_PRINT)),
            ]),
        ];
    }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    protected function getIamTestSchema(): array
    {
        return [
            Section::make('IAM Permissions Test')->schema([
                TextInput::make('iam_user')->default(config('filesystems.disks.s3.key')),
                Actions::make([
                    Action::make('test_iam_credentials')->action('testIamCredentials'),
                    Action::make('test_iam_policies')->color('warning')->action('testIamPolicies'),
                ]),
                Textarea::make('iam_results')
                    ->label('IAM Test Results')
                    ->rows(10)
                    ->disabled()
                    ->default(fn () => json_encode($this->testResults['iam'] ?? [], JSON_PRETTY_PRINT)),
            ]),
        ];
    }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    protected function getDiagnosticsSchema(): array
    {
        return [
            Section::make('Complete Diagnostic')->schema([
                Actions::make([
                    Action::make('run_full_diagnostic')
                        ->color('danger')
                        ->icon('heroicon-o-bolt')
                        ->action('runFullDiagnostic'),
                ]),
                Textarea::make('full_results')
                    ->label('Full Diagnostic Results')
                    ->rows(15)
                    ->disabled()
                    ->default(fn () => json_encode($this->testResults['full'] ?? [], JSON_PRETTY_PRINT)),
                KeyValue::make('aws_config')->columnSpanFull()->state($this->getAwsConfig(...)),
            ]),
        ];
    }

    public function test_s3_connection(): void
    {
        $this->testResults['s3'] = app(TestS3ConnectionAction::class)->execute();
        $this->notifyAwsResult(
            __('ui::awstest.notifications.s3_connection_successful'),
            __('ui::awstest.notifications.s3_connection_failed'),
            $this->testResults['s3'],
        );
    }

    public function test_s3_permissions(): void
    {
        $this->testResults['s3_permissions'] = app(TestS3PermissionsAction::class)->execute();
        $this->notifyAwsResult('S3 Permissions OK', 'S3 Permissions Failed', $this->testResults['s3_permissions']);
    }

    public function test_s3_file_operations(): void
    {
        $this->testResults['s3_operations'] = app(TestS3FileOperationsAction::class)->execute();
        $this->notifyAwsResult('S3 File Operations OK', 'S3 File Operations Failed', $this->testResults['s3_operations']);
    }

    public function test_cloud_front_config(): void
    {
        $this->testResults['cloudfront'] = app(TestCloudFrontConfigAction::class)->execute();
        $this->notifyAwsResult(
            __('ui::awstest.notifications.cloudfront_config_valid'),
            __('ui::awstest.notifications.cloudfront_config_error'),
            $this->testResults['cloudfront'],
        );
    }

    public function test_cloud_front_signed_urls(): void
    {
        $this->testResults['cloudfront_signed'] = app(TestCloudFrontSignedUrlsAction::class)->execute();
        $this->notifyAwsResult('CloudFront Signed URLs OK', 'CloudFront Signed URLs Failed', $this->testResults['cloudfront_signed']);
    }

    public function test_iam_credentials(): void
    {
        $this->testResults['iam_credentials'] = app(TestIamCredentialsAction::class)->execute();
        $this->notifyAwsResult('IAM Credentials OK', 'IAM Credentials Failed', $this->testResults['iam_credentials']);
    }

    public function test_iam_policies(): void
    {
        $this->testResults['iam_policies'] = app(TestIamPoliciesAction::class)->execute();
        $this->notifyAwsResult('IAM Policies OK', 'IAM Policies Failed', $this->testResults['iam_policies']);
    }

    public function runFullDiagnostic(): void
    {
        $diagnostics = app(RunFullAwsDiagnosticAction::class)->execute();
        $this->testResults = array_merge($this->testResults, $diagnostics);

        $this->testResults['full'] = [
            'status' => 'completed',
            'message' => 'Full diagnostic completed',
            'details' => $this->testResults,
        ];

        Notification::make()
            ->title(__('ui::awstest.notifications.full_diagnostic_completed'))
            ->success()
            ->send();
    }

    /**
     * @return array<string, mixed>
     */
    protected function getAwsConfig(): array
    {
        return app(GetAwsConfigSnapshotAction::class)->execute();
    }

    /**
     * @param  array<string, mixed>  $result
     */
    private function notifyAwsResult(string $successTitle, string $failureTitle, array $result): void
    {
        $isSuccess = ($result['status'] ?? '') === 'success';
        $notification = Notification::make()->title($isSuccess ? $successTitle : $failureTitle);

        if ($isSuccess) {
            $notification->success()->send();

            return;
        }

        $notification
            ->danger()
            ->body(is_string($result['message'] ?? null) ? $result['message'] : null)
            ->send();
    }
}
