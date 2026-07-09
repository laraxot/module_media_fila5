<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\S3;

use Aws\Exception\AwsException;
use Modules\Media\Actions\Diagnostic\Support\CreateFilesystemS3ClientAction;
use Spatie\QueueableAction\QueueableAction;

use function Safe\json_decode;
use function Safe\json_encode;

class CheckBucketPolicyAction
{
    use QueueableAction;

    public function __construct(
        private readonly CreateFilesystemS3ClientAction $s3ClientFactory,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function execute(): array
    {
        try {
            $s3 = $this->s3ClientFactory->execute();
            $policy = $s3->getBucketPolicy(['Bucket' => $this->s3ClientFactory->bucket()]);

            return [
                'title' => '📜 Bucket Policy',
                'status' => 'info',
                'data' => [
                    'Policy Exists' => '✅ Yes',
                    'Policy' => json_encode(json_decode((string) $policy['Policy']), JSON_PRETTY_PRINT),
                ],
            ];
        } catch (AwsException $exception) {
            if (($exception->getAwsErrorCode() ?? '') === 'NoSuchBucketPolicy') {
                return [
                    'title' => '📜 Bucket Policy',
                    'status' => 'info',
                    'data' => [
                        'Policy Exists' => 'ℹ️ No (This is usually OK)',
                    ],
                ];
            }

            return [
                'title' => '📜 Bucket Policy',
                'status' => 'error',
                'data' => [
                    'Error' => $exception->getAwsErrorCode() ?? 'UnknownError',
                    'Message' => $exception->getMessage(),
                ],
            ];
        }
    }
}
