<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Path;

use Modules\Media\Models\Media;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GenerateTemporaryUploadPathAction
{
    use QueueableAction;

    public function getPath(Media $media): string
    {
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
    }

    protected function getBasePath(Media $media): string
    {
        Assert::string($id = $media->getKey());
        $key = md5($media->uuid.$id);

        return "tmp/{$key}";
    }
}
