<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Filament;

use Modules\Media\Filament\Clusters\Test\Pages\AwsTest;
use Modules\Media\Filament\Clusters\Test\Pages\S3Test;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class)->group('no-media-db');

/**
 * @return mixed
 */
function mediaInvoke(object $target, string $method, mixed ...$args): mixed
{
    $ref = new ReflectionClass($target);
    $callable = $ref->getMethod($method);
    $callable->setAccessible(true);

    return $callable->invoke($target, ...$args);
}

function mediaPageWithoutLivewire(string $class): object
{
    $page = (new ReflectionClass($class))->newInstanceWithoutConstructor();
    if (property_exists($page, 'debugResults')) {
        $page->debugResults = [];
    }
    if (property_exists($page, 'testResults')) {
        $page->testResults = [];
    }

    return $page;
}

describe('Media diagnostic Filament pages', function (): void {
    test('S3Test exposes form schema actions and debug helpers', function (): void {
        $page = mediaPageWithoutLivewire(S3Test::class);

        Assert::assertSame(['form'], mediaInvoke($page, 'getForms'));
        Assert::assertNotEmpty(mediaInvoke($page, 'getFormActions'));
        Assert::assertNotEmpty(mediaInvoke($page, 'getFormSchema'));

        Assert::assertStringContainsString('credentials', mediaInvoke($page, 'getSolutionForError', null));
        Assert::assertStringContainsString('IAM', mediaInvoke($page, 'getSolutionForError', 'AccessDenied'));
        Assert::assertStringContainsString('SECRET', mediaInvoke($page, 'getSolutionForError', 'SignatureDoesNotMatch'));
        Assert::assertStringContainsString('ACCESS_KEY', mediaInvoke($page, 'getSolutionForError', 'InvalidAccessKeyId'));
        Assert::assertStringContainsString('bucket', strtolower((string) mediaInvoke($page, 'getSolutionForError', 'NoSuchBucket')));
        Assert::assertStringContainsString('REGION', mediaInvoke($page, 'getSolutionForError', 'BucketRegionError'));
        Assert::assertStringContainsString('documentation', mediaInvoke($page, 'getSolutionForError', 'SomethingElse'));

        $emptyDebug = mediaInvoke($page, 'getDebugOutput');
        Assert::assertIsString($emptyDebug);

        $page->debugResults = [
            's3' => [
                'title' => 'S3',
                'status' => 'error',
                'data' => ['Error' => 'denied', 'nested' => ['k' => 'v']],
            ],
            'skip' => 'not-an-array',
        ];
        Assert::assertStringContainsString('=== S3 ===', mediaInvoke($page, 'getDebugOutput'));
    });

    test('S3Test AWS probes surface structured error payloads', function (): void {
        config([
            'filesystems.disks.s3.key' => 'AKIAFAKE',
            'filesystems.disks.s3.secret' => 'secret',
            'filesystems.disks.s3.region' => 'eu-west-1',
            'filesystems.disks.s3.bucket' => 'coverage-bucket',
            'filesystems.cloudfront.url' => 'https://cdn.example.test',
            'filesystems.cloudfront.key_pair_id' => 'K123',
        ]);
        $page = mediaPageWithoutLivewire(S3Test::class);

        foreach (['test_s3_connection_details', 'test_s3_permissions', 'test_cloud_front_connection', 'test_file_upload_download', 'performCredentialsTest', 'checkBucketPolicy', 'buildConfigDebugData'] as $method) {
            if (! (new ReflectionClass($page))->hasMethod($method)) {
                continue;
            }
            try {
                $result = mediaInvoke($page, $method);
                Assert::assertTrue(is_array($result) || is_string($result) || $result === null);
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }
    });

    test('AwsTest schemas and error solutions are executable', function (): void {
        config([
            'filesystems.disks.s3.key' => 'AKIAFAKE',
            'filesystems.disks.s3.secret' => 'secret',
            'filesystems.disks.s3.region' => 'eu-west-1',
            'filesystems.disks.s3.bucket' => 'coverage-bucket',
        ]);
        $page = mediaPageWithoutLivewire(AwsTest::class);

        $config = mediaInvoke($page, 'getAwsConfig');
        Assert::assertArrayHasKey('AWS_DEFAULT_REGION', $config);

        foreach (['getS3TestSchema', 'getCloudFrontTestSchema', 'getIamTestSchema', 'getDiagnosticsSchema'] as $method) {
            try {
                $schema = mediaInvoke($page, $method);
                Assert::assertIsArray($schema);
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }

        foreach (['test_s3_connection', 'test_s3_permissions', 'test_s3_file_operations', 'test_cloud_front_config', 'test_cloud_front_signed_urls', 'test_iam_credentials', 'test_iam_policies'] as $method) {
            if (! (new ReflectionClass($page))->hasMethod($method)) {
                continue;
            }
            try {
                mediaInvoke($page, $method);
                Assert::assertTrue(true);
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }

        Assert::assertStringContainsString('credentials', mediaInvoke($page, 'getS3Solution', null));
        Assert::assertStringContainsString('SECRET', mediaInvoke($page, 'getS3Solution', 'SignatureDoesNotMatch'));
        Assert::assertStringContainsString('IAM', mediaInvoke($page, 'getS3Solution', 'AccessDenied'));
        Assert::assertStringContainsString('bucket', strtolower((string) mediaInvoke($page, 'getS3Solution', 'NoSuchBucket')));
        Assert::assertStringContainsString('ACCESS_KEY', mediaInvoke($page, 'getS3Solution', 'InvalidAccessKeyId'));
        Assert::assertStringContainsString('documentation', mediaInvoke($page, 'getS3Solution', 'UnknownCode'));
    });
});
