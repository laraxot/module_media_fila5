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
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

require_once dirname(__DIR__, 2).'/Pest.php';

=======
use Modules\Media\Tests\TestCase;
use ReflectionClass;

>>>>>>> be7d0c3 (.)
uses(TestCase::class);

describe('Media Actions Coverage', function () {
    describe('Image Merge Action', function () {
        it('can be instantiated', function (): void {
            $action = new ImageMerge;
<<<<<<< HEAD
            Assert::assertInstanceOf(ImageMerge::class, $action);
        });

        it('has handle method', function (): void {
            Assert::assertTrue((new ReflectionClass(ImageMerge::class))->hasMethod('handle'));
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(ImageMerge::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(ImageMerge::class);
        });

        it('has handle method', function (): void {
            expect((new ReflectionClass(ImageMerge::class))->hasMethod('handle'))->toBeTrue();
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ImageMerge::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
            $action = new SvgExistsAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(SvgExistsAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(SvgExistsAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(SvgExistsAction::class);
        });

        it('can be resolved from container', function (): void {
            $action = app(SvgExistsAction::class);
            expect($action)->toBeInstanceOf(SvgExistsAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(SvgExistsAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(SvgExistsAction::class);
        });
    });

    describe('ConvertVideoAction', function () {
        it('can be instantiated', function (): void {
            $action = new ConvertVideoAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(ConvertVideoAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(ConvertVideoAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(ConvertVideoAction::class);
        });

        it('can be resolved from container', function (): void {
            $action = app(ConvertVideoAction::class);
            expect($action)->toBeInstanceOf(ConvertVideoAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
            $action = new ConvertVideoByConvertDataAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(ConvertVideoByConvertDataAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(ConvertVideoByConvertDataAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(ConvertVideoByConvertDataAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoByConvertDataAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
            $action = new ConvertVideoByMediaConvertAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(ConvertVideoByMediaConvertAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(ConvertVideoByMediaConvertAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(ConvertVideoByMediaConvertAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoByMediaConvertAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
            $action = new GetVideoScreenshotAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(GetVideoScreenshotAction::class, $action);
        });

        it('has backoff property', function (): void {
            Assert::assertTrue((new ReflectionClass(GetVideoScreenshotAction::class))->hasProperty('backoff'));
=======
            expect($action)->toBeInstanceOf(GetVideoScreenshotAction::class);
        });

        it('has backoff property', function (): void {
            expect((new ReflectionClass(GetVideoScreenshotAction::class))->hasProperty('backoff'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
            $action = new GetVideoFrameContentAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(GetVideoFrameContentAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(GetVideoFrameContentAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(GetVideoFrameContentAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(GetVideoFrameContentAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
            $action = new GetVideoDurationAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(GetVideoDurationAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(GetVideoDurationAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(GetVideoDurationAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(GetVideoDurationAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
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
<<<<<<< HEAD
            Assert::assertTrue((new ReflectionClass(UploadFileAction::class))->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            Assert::assertTrue((new ReflectionClass(UploadFileAction::class))->isSubclassOf(BaseS3Action::class));
=======
            expect((new ReflectionClass(UploadFileAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(UploadFileAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(UploadFileAction::class);
        });
    });

    describe('S3 DeleteFileAction', function () {
        it('has execute method', function (): void {
<<<<<<< HEAD
            Assert::assertTrue((new ReflectionClass(DeleteFileAction::class))->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            Assert::assertTrue((new ReflectionClass(DeleteFileAction::class))->isSubclassOf(BaseS3Action::class));
=======
            expect((new ReflectionClass(DeleteFileAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(DeleteFileAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(DeleteFileAction::class);
        });
    });

    describe('S3 GetFileInfoAction', function () {
        it('has execute method', function (): void {
<<<<<<< HEAD
            Assert::assertTrue((new ReflectionClass(GetFileInfoAction::class))->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            Assert::assertTrue((new ReflectionClass(GetFileInfoAction::class))->isSubclassOf(BaseS3Action::class));
=======
            expect((new ReflectionClass(GetFileInfoAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(GetFileInfoAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetFileInfoAction::class);
        });
    });

    describe('S3 CheckFileExistsAction', function () {
        it('has execute method', function (): void {
<<<<<<< HEAD
            Assert::assertTrue((new ReflectionClass(CheckFileExistsAction::class))->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            Assert::assertTrue((new ReflectionClass(CheckFileExistsAction::class))->isSubclassOf(BaseS3Action::class));
=======
            expect((new ReflectionClass(CheckFileExistsAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(CheckFileExistsAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(CheckFileExistsAction::class);
        });
    });

    describe('BaseS3Action', function () {
        it('is abstract', function (): void {
<<<<<<< HEAD
            Assert::assertTrue((new ReflectionClass(BaseS3Action::class))->isAbstract());
=======
            expect((new ReflectionClass(BaseS3Action::class))->isAbstract())->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(BaseS3Action::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(BaseS3Action::class);
        });

        it('has s3Client property', function (): void {
<<<<<<< HEAD
            Assert::assertTrue((new ReflectionClass(BaseS3Action::class))->hasProperty('s3Client'));
        });

        it('has bucketName property', function (): void {
            Assert::assertTrue((new ReflectionClass(BaseS3Action::class))->hasProperty('bucketName'));
        });

        it('has logger property', function (): void {
            Assert::assertTrue((new ReflectionClass(BaseS3Action::class))->hasProperty('logger'));
=======
            expect((new ReflectionClass(BaseS3Action::class))->hasProperty('s3Client'))->toBeTrue();
        });

        it('has bucketName property', function (): void {
            expect((new ReflectionClass(BaseS3Action::class))->hasProperty('bucketName'))->toBeTrue();
        });

        it('has logger property', function (): void {
            expect((new ReflectionClass(BaseS3Action::class))->hasProperty('logger'))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });
    });

    describe('GetCloudFrontSignedUrlAction', function () {
        it('can be instantiated', function (): void {
            $action = new GetCloudFrontSignedUrlAction;
<<<<<<< HEAD
            Assert::assertInstanceOf(GetCloudFrontSignedUrlAction::class, $action);
        });

        it('has execute method', function (): void {
            Assert::assertTrue((new ReflectionClass(GetCloudFrontSignedUrlAction::class))->hasMethod('execute'));
=======
            expect($action)->toBeInstanceOf(GetCloudFrontSignedUrlAction::class);
        });

        it('has execute method', function (): void {
            expect((new ReflectionClass(GetCloudFrontSignedUrlAction::class))->hasMethod('execute'))->toBeTrue();
>>>>>>> be7d0c3 (.)
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetCloudFrontSignedUrlAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetCloudFrontSignedUrlAction::class);
        });
    });
});
