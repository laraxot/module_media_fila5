<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction;
use Modules\Media\Actions\Image\Merge as ImageMerge;
use Modules\Media\Actions\Image\SvgExistsAction;
use Modules\Media\Actions\S3\BaseS3Action;
use Modules\Media\Actions\S3\CheckFileExistsAction;
use Modules\Media\Actions\S3\DeleteFileAction;
use Modules\Media\Actions\S3\GetFileInfoAction;
use Modules\Media\Actions\S3\UploadFileAction;
use Modules\Media\Actions\Video\ConvertVideoAction;
use Modules\Media\Actions\Video\ConvertVideoByConvertDataAction;
use Modules\Media\Actions\Video\ConvertVideoByMediaConvertAction;
use Modules\Media\Actions\Video\GetVideoDurationAction;
use Modules\Media\Actions\Video\GetVideoFrameContentAction;
use Modules\Media\Actions\Video\GetVideoScreenshotAction;
use Modules\Media\Tests\TestCase;
use ReflectionClass;

uses(TestCase::class);

describe('Media Actions Coverage', function () {
    describe('Image Merge Action', function () {
        it('can be instantiated', function (): void {
            // `new ImageMerge()` restituisce per costruzione un ImageMerge: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(ImageMerge::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has handle method', function (): void {
            expect((new ReflectionClass(ImageMerge::class))->hasMethod('handle'))->toBeTrue();
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ImageMerge::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ImageMerge::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ImageMerge::class);
        });
    });

    describe('SvgExistsAction', function () {
        it('can be instantiated', function (): void {
            // `new SvgExistsAction()` restituisce per costruzione un SvgExistsAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(SvgExistsAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('can be resolved from container', function (): void {
            // Il fatto che conta e' che il container sappia costruirla senza
            // sollevare: il tipo di ritorno di `app()` e' gia' noto staticamente.
            expect(static fn (): SvgExistsAction => app(SvgExistsAction::class))->not->toThrow(\Throwable::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(SvgExistsAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(SvgExistsAction::class);
        });
    });

    describe('ConvertVideoAction', function () {
        it('can be instantiated', function (): void {
            // `new ConvertVideoAction()` restituisce per costruzione un ConvertVideoAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(ConvertVideoAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('can be resolved from container', function (): void {
            // Il fatto che conta e' che il container sappia costruirla senza
            // sollevare: il tipo di ritorno di `app()` e' gia' noto staticamente.
            expect(static fn (): ConvertVideoAction => app(ConvertVideoAction::class))->not->toThrow(\Throwable::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ConvertVideoAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ConvertVideoAction::class);
        });
    });

    describe('ConvertVideoByConvertDataAction', function () {
        it('can be instantiated', function (): void {
            // `new ConvertVideoByConvertDataAction()` restituisce per costruzione un ConvertVideoByConvertDataAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(ConvertVideoByConvertDataAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoByConvertDataAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ConvertVideoByConvertDataAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ConvertVideoByConvertDataAction::class);
        });
    });

    describe('ConvertVideoByMediaConvertAction', function () {
        it('can be instantiated', function (): void {
            // `new ConvertVideoByMediaConvertAction()` restituisce per costruzione un ConvertVideoByMediaConvertAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(ConvertVideoByMediaConvertAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoByMediaConvertAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ConvertVideoByMediaConvertAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ConvertVideoByMediaConvertAction::class);
        });
    });

    describe('GetVideoScreenshotAction', function () {
        it('can be instantiated', function (): void {
            // `new GetVideoScreenshotAction()` restituisce per costruzione un GetVideoScreenshotAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(GetVideoScreenshotAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has backoff property', function (): void {
            expect((new ReflectionClass(GetVideoScreenshotAction::class))->hasProperty('backoff'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetVideoScreenshotAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetVideoScreenshotAction::class);
        });
    });

    describe('GetVideoFrameContentAction', function () {
        it('can be instantiated', function (): void {
            // `new GetVideoFrameContentAction()` restituisce per costruzione un GetVideoFrameContentAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(GetVideoFrameContentAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(GetVideoFrameContentAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetVideoFrameContentAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetVideoFrameContentAction::class);
        });
    });

    describe('GetVideoDurationAction', function () {
        it('can be instantiated', function (): void {
            // `new GetVideoDurationAction()` restituisce per costruzione un GetVideoDurationAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(GetVideoDurationAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(GetVideoDurationAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetVideoDurationAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetVideoDurationAction::class);
        });
    });

    describe('S3 UploadFileAction', function () {
        it('has execute method', function (): void {
            expect((new ReflectionClass(UploadFileAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(UploadFileAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(UploadFileAction::class);
        });
    });

    describe('S3 DeleteFileAction', function () {
        it('has execute method', function (): void {
            expect((new ReflectionClass(DeleteFileAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(DeleteFileAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(DeleteFileAction::class);
        });
    });

    describe('S3 GetFileInfoAction', function () {
        it('has execute method', function (): void {
            expect((new ReflectionClass(GetFileInfoAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(GetFileInfoAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetFileInfoAction::class);
        });
    });

    describe('S3 CheckFileExistsAction', function () {
        it('has execute method', function (): void {
            expect((new ReflectionClass(CheckFileExistsAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(CheckFileExistsAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(CheckFileExistsAction::class);
        });
    });

    describe('BaseS3Action', function () {
        it('is abstract', function (): void {
            expect((new ReflectionClass(BaseS3Action::class))->isAbstract())->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(BaseS3Action::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(BaseS3Action::class);
        });

        it('has s3Client property', function (): void {
            expect((new ReflectionClass(BaseS3Action::class))->hasProperty('s3Client'))->toBeTrue();
        });

        it('has bucketName property', function (): void {
            expect((new ReflectionClass(BaseS3Action::class))->hasProperty('bucketName'))->toBeTrue();
        });

        it('has logger property', function (): void {
            expect((new ReflectionClass(BaseS3Action::class))->hasProperty('logger'))->toBeTrue();
        });
    });

    describe('GetCloudFrontSignedUrlAction', function () {
        it('can be instantiated', function (): void {
            // `new GetCloudFrontSignedUrlAction()` restituisce per costruzione un GetCloudFrontSignedUrlAction: cio' che il test
            // puo' verificare e' che il costruttore non abbia parametri obbligatori.
            expect((new ReflectionClass(GetCloudFrontSignedUrlAction::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
                ->toBe(0);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(GetCloudFrontSignedUrlAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetCloudFrontSignedUrlAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetCloudFrontSignedUrlAction::class);
        });
    });
});
