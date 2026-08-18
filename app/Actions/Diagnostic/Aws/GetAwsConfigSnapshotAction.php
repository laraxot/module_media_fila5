<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\Aws;

<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> laraxot/dev

class GetAwsConfigSnapshotAction
{
    use QueueableAction;

    private const KEY_PREVIEW_LENGTH = 8;

    /**
     * @return array<string, mixed>
     */
    public function execute(): array
    {
<<<<<<< HEAD
        $key = config('filesystems.disks.s3.key', '');
        Assert::string($key);

        return [
            'AWS_ACCESS_KEY_ID' => substr($key, 0, self::KEY_PREVIEW_LENGTH).'...',
=======
        return [
            'AWS_ACCESS_KEY_ID' => substr(SafeStringCastAction::cast(config('filesystems.disks.s3.key', '')), 0, self::KEY_PREVIEW_LENGTH).'...',
>>>>>>> laraxot/dev
            'AWS_DEFAULT_REGION' => config('filesystems.disks.s3.region'),
            'AWS_BUCKET' => config('filesystems.disks.s3.bucket'),
            'CLOUDFRONT_URL' => config('filesystems.cloudfront.url'),
            'CLOUDFRONT_KEY_PAIR_ID' => config('filesystems.cloudfront.key_pair_id'),
        ];
    }
}
