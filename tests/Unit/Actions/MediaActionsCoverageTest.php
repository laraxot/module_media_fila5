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
use Modules\Media\Tests\TestCase;
use ReflectionClass;

uses(TestCase::class);

describe('Media Actions Coverage', function () {
    describe('Image Merge Action', function () {
        it('can be instantiated', function (): void {
=======

describe('Media Actions Coverage', function () {
    describe('Image Merge Action', function () {
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new ImageMerge;
            expect($action)->toBeInstanceOf(ImageMerge::class);
        });

<<<<<<< HEAD
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
=======
        it('has handle method', function () {
            $action = new ImageMerge;
            expect(method_exists($action, 'handle'))->toBeTrue();
        });

        it('has execute method', function () {
            $action = new ImageMerge;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ImageMerge::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(ImageMerge::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('SvgExistsAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new SvgExistsAction;
            expect($action)->toBeInstanceOf(SvgExistsAction::class);
        });

<<<<<<< HEAD
        it('can be resolved from container', function (): void {
=======
        it('can be resolved from container', function () {
>>>>>>> provtv/dev
            $action = app(SvgExistsAction::class);
            expect($action)->toBeInstanceOf(SvgExistsAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(SvgExistsAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(SvgExistsAction::class);
=======
        it('has execute method', function () {
            $action = new SvgExistsAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(SvgExistsAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('ConvertVideoAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new ConvertVideoAction;
            expect($action)->toBeInstanceOf(ConvertVideoAction::class);
        });

<<<<<<< HEAD
        it('can be resolved from container', function (): void {
=======
        it('can be resolved from container', function () {
>>>>>>> provtv/dev
            $action = app(ConvertVideoAction::class);
            expect($action)->toBeInstanceOf(ConvertVideoAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ConvertVideoAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ConvertVideoAction::class);
=======
        it('has execute method', function () {
            $action = new ConvertVideoAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(ConvertVideoAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('ConvertVideoByConvertDataAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new ConvertVideoByConvertDataAction;
            expect($action)->toBeInstanceOf(ConvertVideoByConvertDataAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoByConvertDataAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ConvertVideoByConvertDataAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ConvertVideoByConvertDataAction::class);
=======
        it('has execute method', function () {
            $action = new ConvertVideoByConvertDataAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoByConvertDataAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(ConvertVideoByConvertDataAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('ConvertVideoByMediaConvertAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new ConvertVideoByMediaConvertAction;
            expect($action)->toBeInstanceOf(ConvertVideoByMediaConvertAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(ConvertVideoByMediaConvertAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(ConvertVideoByMediaConvertAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(ConvertVideoByMediaConvertAction::class);
=======
        it('has execute method', function () {
            $action = new ConvertVideoByMediaConvertAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoByMediaConvertAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(ConvertVideoByMediaConvertAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('GetVideoScreenshotAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new GetVideoScreenshotAction;
            expect($action)->toBeInstanceOf(GetVideoScreenshotAction::class);
        });

<<<<<<< HEAD
        it('has backoff property', function (): void {
            expect((new ReflectionClass(GetVideoScreenshotAction::class))->hasProperty('backoff'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetVideoScreenshotAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetVideoScreenshotAction::class);
=======
        it('has backoff property', function () {
            $action = new GetVideoScreenshotAction;
            expect(property_exists($action, 'backoff'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoScreenshotAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(GetVideoScreenshotAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('GetVideoFrameContentAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new GetVideoFrameContentAction;
            expect($action)->toBeInstanceOf(GetVideoFrameContentAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(GetVideoFrameContentAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetVideoFrameContentAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetVideoFrameContentAction::class);
=======
        it('has execute method', function () {
            $action = new GetVideoFrameContentAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoFrameContentAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(GetVideoFrameContentAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('GetVideoDurationAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new GetVideoDurationAction;
            expect($action)->toBeInstanceOf(GetVideoDurationAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(GetVideoDurationAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetVideoDurationAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetVideoDurationAction::class);
=======
        it('has execute method', function () {
            $action = new GetVideoDurationAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoDurationAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(GetVideoDurationAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('S3 UploadFileAction', function () {
<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(UploadFileAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(UploadFileAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(UploadFileAction::class);
=======
        it('has execute method', function () {
            $reflection = new ReflectionClass(UploadFileAction::class);
            expect($reflection->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function () {
            $reflection = new ReflectionClass(UploadFileAction::class);
            expect($reflection->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(UploadFileAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('S3 DeleteFileAction', function () {
<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(DeleteFileAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(DeleteFileAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(DeleteFileAction::class);
=======
        it('has execute method', function () {
            $reflection = new ReflectionClass(DeleteFileAction::class);
            expect($reflection->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function () {
            $reflection = new ReflectionClass(DeleteFileAction::class);
            expect($reflection->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(DeleteFileAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('S3 GetFileInfoAction', function () {
<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(GetFileInfoAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(GetFileInfoAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetFileInfoAction::class);
=======
        it('has execute method', function () {
            $reflection = new ReflectionClass(GetFileInfoAction::class);
            expect($reflection->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function () {
            $reflection = new ReflectionClass(GetFileInfoAction::class);
            expect($reflection->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(GetFileInfoAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('S3 CheckFileExistsAction', function () {
<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(CheckFileExistsAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function (): void {
            expect((new ReflectionClass(CheckFileExistsAction::class))->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(CheckFileExistsAction::class);
=======
        it('has execute method', function () {
            $reflection = new ReflectionClass(CheckFileExistsAction::class);
            expect($reflection->hasMethod('execute'))->toBeTrue();
        });

        it('extends BaseS3Action', function () {
            $reflection = new ReflectionClass(CheckFileExistsAction::class);
            expect($reflection->isSubclassOf(BaseS3Action::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(CheckFileExistsAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });

    describe('BaseS3Action', function () {
<<<<<<< HEAD
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
=======
        it('is abstract', function () {
            $reflection = new ReflectionClass(BaseS3Action::class);
            expect($reflection->isAbstract())->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(BaseS3Action::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(BaseS3Action::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
        });

        it('has s3Client property', function () {
            $reflection = new ReflectionClass(BaseS3Action::class);
            expect($reflection->hasProperty('s3Client'))->toBeTrue();
        });

        it('has bucketName property', function () {
            $reflection = new ReflectionClass(BaseS3Action::class);
            expect($reflection->hasProperty('bucketName'))->toBeTrue();
        });

        it('has logger property', function () {
            $reflection = new ReflectionClass(BaseS3Action::class);
            expect($reflection->hasProperty('logger'))->toBeTrue();
>>>>>>> provtv/dev
        });
    });

    describe('GetCloudFrontSignedUrlAction', function () {
<<<<<<< HEAD
        it('can be instantiated', function (): void {
=======
        it('can be instantiated', function () {
>>>>>>> provtv/dev
            $action = new GetCloudFrontSignedUrlAction;
            expect($action)->toBeInstanceOf(GetCloudFrontSignedUrlAction::class);
        });

<<<<<<< HEAD
        it('has execute method', function (): void {
            expect((new ReflectionClass(GetCloudFrontSignedUrlAction::class))->hasMethod('execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function (): void {
            assertMediaUsesQueueableAction(GetCloudFrontSignedUrlAction::class);
        });

        it('uses strict types', function (): void {
            assertMediaDeclaresStrictTypes(GetCloudFrontSignedUrlAction::class);
=======
        it('has execute method', function () {
            $action = new GetCloudFrontSignedUrlAction;
            expect(method_exists($action, 'execute'))->toBeTrue();
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetCloudFrontSignedUrlAction::class)))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(GetCloudFrontSignedUrlAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
>>>>>>> provtv/dev
        });
    });
});
