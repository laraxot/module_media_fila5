<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Modules\Media\Models\Media;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

final class GetTemporaryUploadPathAction
{
    use QueueableAction;

    public function execute(Media $media): string
    {
        $id = (string) $media->id;
        $uuid = (string) $media->uuid;

        return $this->getBasePath($media).'/'.md5($id.$uuid.'original').'/';
    }

    private function getBasePath(Media $media): string
    {
        $id = $media->getKey();
        Assert::scalar($id);
        $uuid = (string) ($media->uuid ?? '');
        $key = md5($uuid.(string) $id);

        return "tmp/{$key}";
    }
}
