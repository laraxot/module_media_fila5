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
use ReflectionClass;

use function Safe\class_uses;
use function Safe\file_get_contents;

describe('Media Actions Coverage', function (): void {
    describe('Image Merge Action', function (): void {
        it('can be instantiated', function (): void {
            $action = new ImageMerge;

            Assert::assertInstanceOf(ImageMerge::class, $action);
        });

        it('has handle method', function (): void {
            $reflection = new ReflectionClass(ImageMerge::class);

            Assert::assertTrue($reflection->hasMethod('handle'));
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(ImageMerge::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ImageMerge::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ImageMerge::class);
        });
    });

    describe('SvgExistsAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new SvgExistsAction;

            Assert::assertInstanceOf(SvgExistsAction::class, $action);
        });

        it('can be resolved from container', function (): void {
            $action = app(SvgExistsAction::class);

            Assert::assertInstanceOf(SvgExistsAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(SvgExistsAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(SvgExistsAction::class);
        });
    });

    describe('ConvertVideoAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new ConvertVideoAction;

            Assert::assertInstanceOf(ConvertVideoAction::class, $action);
        });

        it('can be resolved from container', function (): void {
            $action = app(ConvertVideoAction::class);

            Assert::assertInstanceOf(ConvertVideoAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(ConvertVideoAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ConvertVideoAction::class);
        });
    });

    describe('ConvertVideoByConvertDataAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new ConvertVideoByConvertDataAction;

            Assert::assertInstanceOf(ConvertVideoByConvertDataAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(ConvertVideoByConvertDataAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoByConvertDataAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ConvertVideoByConvertDataAction::class);
        });
    });

    describe('ConvertVideoByMediaConvertAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new ConvertVideoByMediaConvertAction;

            Assert::assertInstanceOf(ConvertVideoByMediaConvertAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(ConvertVideoByMediaConvertAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(ConvertVideoByMediaConvertAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(ConvertVideoByMediaConvertAction::class);
        });
    });

    describe('GetVideoScreenshotAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new GetVideoScreenshotAction;

            Assert::assertInstanceOf(GetVideoScreenshotAction::class, $action);
        });

        it('has backoff property', function (): void {
            $reflection = new ReflectionClass(GetVideoScreenshotAction::class);

            Assert::assertTrue($reflection->hasProperty('backoff'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoScreenshotAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetVideoScreenshotAction::class);
        });
    });

    describe('GetVideoFrameContentAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new GetVideoFrameContentAction;

            Assert::assertInstanceOf(GetVideoFrameContentAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(GetVideoFrameContentAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(GetVideoFrameContentAction::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetVideoFrameContentAction::class);
        });
    });

    describe('GetVideoDurationAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new GetVideoDurationAction;

            Assert::assertInstanceOf(GetVideoDurationAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(GetVideoDurationAction::class);

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
            $reflection = new ReflectionClass(UploadFileAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new ReflectionClass(UploadFileAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(UploadFileAction::class);
        });
    });

    describe('S3 DeleteFileAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new ReflectionClass(DeleteFileAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new ReflectionClass(DeleteFileAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(DeleteFileAction::class);
        });
    });

    describe('S3 GetFileInfoAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new ReflectionClass(GetFileInfoAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new ReflectionClass(GetFileInfoAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(GetFileInfoAction::class);
        });
    });

    describe('S3 CheckFileExistsAction', function (): void {
        it('has execute method', function (): void {
            $reflection = new ReflectionClass(CheckFileExistsAction::class);

            Assert::assertTrue($reflection->hasMethod('execute'));
        });

        it('extends BaseS3Action', function (): void {
            $reflection = new ReflectionClass(CheckFileExistsAction::class);

            Assert::assertTrue($reflection->isSubclassOf(BaseS3Action::class));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(CheckFileExistsAction::class);
        });
    });

    describe('BaseS3Action', function (): void {
        it('is abstract', function (): void {
            $reflection = new ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->isAbstract());
        });

        it('uses QueueableAction trait', function (): void {
            Assert::assertTrue(in_array('Spatie\QueueableAction\QueueableAction', class_uses(BaseS3Action::class), true));
        });

        it('uses strict types', function (): void {
            assertMediaActionDeclaresStrictTypes(BaseS3Action::class);
        });

        it('has s3Client property', function (): void {
            $reflection = new ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->hasProperty('s3Client'));
        });

        it('has bucketName property', function (): void {
            $reflection = new ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->hasProperty('bucketName'));
        });

        it('has logger property', function (): void {
            $reflection = new ReflectionClass(BaseS3Action::class);

            Assert::assertTrue($reflection->hasProperty('logger'));
        });
    });

    describe('GetCloudFrontSignedUrlAction', function (): void {
        it('can be instantiated', function (): void {
            $action = new GetCloudFrontSignedUrlAction;

            Assert::assertInstanceOf(GetCloudFrontSignedUrlAction::class, $action);
        });

        it('has execute method', function (): void {
            $reflection = new ReflectionClass(GetCloudFrontSignedUrlAction::class);

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
    $reflection = new ReflectionClass($class);
    $filename = $reflection->getFileName();

    Assert::assertIsString($filename);

    $content = file_get_contents($filename);

    Assert::assertStringContainsString('declare(strict_types=1)', $content);
}
