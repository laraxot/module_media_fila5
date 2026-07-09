<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\S3;

use Aws\Exception\AwsException;
use Modules\Media\Actions\Diagnostic\Support\CreateFilesystemS3ClientAction;
use Modules\Media\Actions\Diagnostic\Support\ResolveAwsS3ErrorSolutionAction;
use Spatie\QueueableAction\QueueableAction;

class TestConnectionDetailsAction
{
    use QueueableAction;

    public function __construct(
        private readonly CreateFilesystemS3ClientAction $s3ClientFactory,
        private readonly ResolveAwsS3ErrorSolutionAction $resolveError,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function execute(): array
    {
        try {
            $s3 = $this->s3ClientFactory->execute();
            $bucket = $this->s3ClientFactory->bucket();

            $s3->headBucket(['Bucket' => $bucket]);

            $location = $s3->getBucketLocation(['Bucket' => $bucket]);
            $bucketRegion = $location['LocationConstraint'] ?: 'us-east-1';
            $regionMatch = $bucketRegion === config('filesystems.disks.s3.region');

            return [
                'title' => '☁️ S3 Connection',
                'status' => 'success',
                'data' => [
                    'Bucket Accessible' => '✅ Yes',
                    'Bucket Region' => $bucketRegion,
                    'Config Region' => config('filesystems.disks.s3.region'),
                    'Region Match' => $regionMatch ? '✅ Yes' : '⚠️ No - This might cause issues',
                ],
            ];
        } catch (AwsException $exception) {
            return [
                'title' => '☁️ S3 Connection',
                'status' => 'error',
                'data' => [
                    'Bucket Accessible' => '❌ No',
                    'Error Code' => $exception->getAwsErrorCode() ?? 'UnknownError',
                    'Message' => $exception->getMessage(),
                    'Solution' => $this->resolveError->execute($exception->getAwsErrorCode()),
                ],
            ];
        }
    }
}
