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
<<<<<<< HEAD
            Assert::assertSame(ImageMerge::class, (new ImageMerge)::class);
=======
            $action = new ImageMerge;
            expect(get_class($action))->toBe(ImageMerge::class);
>>>>>>> ec2b884b (.)
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
<<<<<<< HEAD
            Assert::assertSame(SvgExistsAction::class, (new SvgExistsAction)::class);
        });

        it('can be resolved from container', function (): void {})->todo();
=======
            $action = new SvgExistsAction;
            expect(get_class($action))->toBe(SvgExistsAction::class);
        });

        it('can be resolved from container', function (): void {
            $action = app(SvgExistsAction::class);
            expect(get_class($action))->toBe(SvgExistsAction::class);
        });
>>>>>>> ec2b884b (.)

        it('has execute method', function (): void {
            expect((new ReflectionClass(SvgExistsAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(SvgExistsAction::class);
        });
    });

    describe('ConvertVideoAction', function () {
        it('can be instantiated', function (): void {
<<<<<<< HEAD
            Assert::assertSame(ConvertVideoAction::class, (new ConvertVideoAction)::class);
        });

        it('can be resolved from container', function (): void {})->todo();
=======
            $action = new ConvertVideoAction;
            expect(get_class($action))->toBe(ConvertVideoAction::class);
        });

        it('can be resolved from container', function (): void {
            $action = app(ConvertVideoAction::class);
            expect(get_class($action))->toBe(ConvertVideoAction::class);
        });
>>>>>>> ec2b884b (.)

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
<<<<<<< HEAD
            Assert::assertSame(ConvertVideoByConvertDataAction::class, (new ConvertVideoByConvertDataAction)::class);
=======
            $action = new ConvertVideoByConvertDataAction;
            expect(get_class($action))->toBe(ConvertVideoByConvertDataAction::class);
>>>>>>> ec2b884b (.)
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
<<<<<<< HEAD
            Assert::assertSame(ConvertVideoByMediaConvertAction::class, (new ConvertVideoByMediaConvertAction)::class);
=======
            $action = new ConvertVideoByMediaConvertAction;
            expect(get_class($action))->toBe(ConvertVideoByMediaConvertAction::class);
>>>>>>> ec2b884b (.)
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
<<<<<<< HEAD
            Assert::assertSame(GetVideoScreenshotAction::class, (new GetVideoScreenshotAction)::class);
=======
            $action = new GetVideoScreenshotAction;
            expect(get_class($action))->toBe(GetVideoScreenshotAction::class);
>>>>>>> ec2b884b (.)
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
<<<<<<< HEAD
            Assert::assertSame(GetVideoFrameContentAction::class, (new GetVideoFrameContentAction)::class);
=======
            $action = new GetVideoFrameContentAction;
            expect(get_class($action))->toBe(GetVideoFrameContentAction::class);
>>>>>>> ec2b884b (.)
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
<<<<<<< HEAD
            Assert::assertSame(GetVideoDurationAction::class, (new GetVideoDurationAction)::class);
=======
            $action = new GetVideoDurationAction;
            expect(get_class($action))->toBe(GetVideoDurationAction::class);
>>>>>>> ec2b884b (.)
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
<<<<<<< HEAD
            Assert::assertSame(GetCloudFrontSignedUrlAction::class, (new GetCloudFrontSignedUrlAction)::class);
=======
            $action = new GetCloudFrontSignedUrlAction;
            expect(get_class($action))->toBe(GetCloudFrontSignedUrlAction::class);
>>>>>>> ec2b884b (.)
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
