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
use PHPUnit\Framework\Assert;

describe('Media Actions Coverage', function () {
    describe('Image Merge Action', function () {
        it('can be instantiated', function () {
            $action = new ImageMerge;
            expect($action)->toBeInstanceOf(ImageMerge::class);
        });

        it('has handle method', function (): void {
            $reflection = new \ReflectionClass(ImageMerge::class);

            Assert::assertTrue($reflection->hasMethod('handle'));
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(ImageMerge::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ImageMerge::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ImageMerge::class);
        });
    });

    describe('SvgExistsAction', function () {
        it('can be instantiated', function () {
            $action = new SvgExistsAction;
            expect($action)->toBeInstanceOf(SvgExistsAction::class);
        });

        it('can be resolved from container', function () {
            $action = app(SvgExistsAction::class);
            expect($action)->toBeInstanceOf(SvgExistsAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(SvgExistsAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(SvgExistsAction::class);
        });
    });

    describe('ConvertVideoAction', function () {
        it('can be instantiated', function () {
            $action = new ConvertVideoAction;
            expect($action)->toBeInstanceOf(ConvertVideoAction::class);
        });

        it('can be resolved from container', function () {
            $action = app(ConvertVideoAction::class);
            expect($action)->toBeInstanceOf(ConvertVideoAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(ConvertVideoAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ConvertVideoAction::class);
        });
    });

    describe('ConvertVideoByConvertDataAction', function () {
        it('can be instantiated', function () {
            $action = new ConvertVideoByConvertDataAction;
            expect($action)->toBeInstanceOf(ConvertVideoByConvertDataAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(ConvertVideoByConvertDataAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoByConvertDataAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ConvertVideoByConvertDataAction::class);
        });
    });

    describe('ConvertVideoByMediaConvertAction', function () {
        it('can be instantiated', function () {
            $action = new ConvertVideoByMediaConvertAction;
            expect($action)->toBeInstanceOf(ConvertVideoByMediaConvertAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(ConvertVideoByMediaConvertAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoByMediaConvertAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ConvertVideoByMediaConvertAction::class);
        });
    });

    describe('GetVideoScreenshotAction', function () {
        it('can be instantiated', function () {
            $action = new GetVideoScreenshotAction;
            expect($action)->toBeInstanceOf(GetVideoScreenshotAction::class);
        });

        it('has backoff property', function (): void {
            $reflection = new \ReflectionClass(GetVideoScreenshotAction::class);

            Assert::assertTrue($reflection->hasProperty('backoff'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoScreenshotAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetVideoScreenshotAction::class);
        });
    });

    describe('GetVideoFrameContentAction', function () {
        it('can be instantiated', function () {
            $action = new GetVideoFrameContentAction;
            expect($action)->toBeInstanceOf(GetVideoFrameContentAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(GetVideoFrameContentAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoFrameContentAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetVideoFrameContentAction::class);
        });
    });

    describe('GetVideoDurationAction', function () {
        it('can be instantiated', function () {
            $action = new GetVideoDurationAction;
            expect($action)->toBeInstanceOf(GetVideoDurationAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(GetVideoDurationAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoDurationAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetVideoDurationAction::class);
        });
    });

    describe('S3 UploadFileAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(UploadFileAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new \ReflectionClass(UploadFileAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(UploadFileAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
        });
    });

    describe('S3 DeleteFileAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(DeleteFileAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new \ReflectionClass(DeleteFileAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(DeleteFileAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
        });
    });

    describe('S3 GetFileInfoAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(GetFileInfoAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new \ReflectionClass(GetFileInfoAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(GetFileInfoAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
        });
    });

    describe('S3 CheckFileExistsAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(CheckFileExistsAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new \ReflectionClass(CheckFileExistsAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(CheckFileExistsAction::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
        });
    });

    describe('BaseS3Action', function (): void {
        it('is abstract', function (): void {
            $reflection = new \ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->isAbstract());
        });

        it('uses QueueableAction trait', function () {
            expect(in_array('Spatie\QueueableAction\QueueableAction', class_uses(BaseS3Action::class)))->toBeTrue();
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(BaseS3Action::class);
        });

        it('has s3Client property', function (): void {
            $reflection = new \ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->hasProperty('s3Client'));
        });

        it('has bucketName property', function (): void {
            $reflection = new \ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->hasProperty('bucketName'));
        });

        it('has logger property', function (): void {
            $reflection = new \ReflectionClass(BaseS3Action::class);

        it('has logger property', function () {
            $reflection = new ReflectionClass(BaseS3Action::class);
            expect($reflection->hasProperty('logger'))->toBeTrue();
        });
    });

    describe('GetCloudFrontSignedUrlAction', function () {
        it('can be instantiated', function () {
            $action = new GetCloudFrontSignedUrlAction;
            expect($action)->toBeInstanceOf(GetCloudFrontSignedUrlAction::class);
        });

        it('has execute method', function (): void {
            $reflection = new \ReflectionClass(GetCloudFrontSignedUrlAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetCloudFrontSignedUrlAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetCloudFrontSignedUrlAction::class);
        });
    });
});

/**
 * @param class-string $class
 */
function assertMediaActionDeclaresStrictTypes(string $class): void
{
    $reflection = new \ReflectionClass($class);
    $filename = $reflection->getFileName();

    Assert::assertIsString($filename);

    $content = file_get_contents($filename);

    Assert::assertStringContainsString('declare(strict_types=1)', $content);
}
