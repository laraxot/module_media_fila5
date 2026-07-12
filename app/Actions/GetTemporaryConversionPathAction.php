<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Modules\Media\Models\Media;
use Spatie\QueueableAction\QueueableAction;

final class GetTemporaryConversionPathAction
{
    use QueueableAction;

    public function execute(Media $media): string
    {
        $id = (string) $media->id;
        $uuid = (string) $media->uuid;

        return $this->getBasePath($media).'/'.md5($id.$uuid.'conversion');
    }

    private function getBasePath(Media $media): string
    {
        $id = (string) $media->getKey();
        $uuid = (string) ($media->uuid ?? '');
        $key = md5($uuid.$id);

        return "tmp/{$key}";
    }
}
