<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\Aws;

use Aws\Exception\AwsException;
use Modules\Media\Actions\Diagnostic\Support\CreateFilesystemS3ClientAction;
use Modules\Media\Actions\Diagnostic\Support\ResolveAwsS3ErrorSolutionAction;
use Spatie\QueueableAction\QueueableAction;

class TestS3PermissionsAction
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

            $s3->listObjectsV2(['Bucket' => $bucket, 'MaxKeys' => 1]);

            return [
                'status' => 'success',
                'message' => 'S3 permissions verified successfully',
                'details' => [
                    'ListObjects' => 'OK',
                    'Bucket' => $bucket,
                ],
            ];
        } catch (AwsException $exception) {
            $errorCode = $exception->getAwsErrorCode() ?? 'UnknownError';

            return [
                'status' => 'error',
                'message' => 'S3 permissions error: '.$errorCode,
                'details' => [
                    'Error' => $exception->getMessage(),
                    'Solution' => $this->resolveError->execute($errorCode),
                ],
            ];
        }
    }
}
