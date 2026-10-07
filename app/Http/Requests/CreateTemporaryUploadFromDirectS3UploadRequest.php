<?php

declare(strict_types=1);

namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Lang;
>>>>>>> laraxot/dev
use Modules\Media\Models\Media;
use Webmozart\Assert\Assert;

// phpmd: LongClassName — nome esplicito per upload diretto S3
class CreateTemporaryUploadFromDirectS3UploadRequest extends FormRequest
{
    /**
     * @return array<string>
     *
     * @psalm-return array{uuid: string, key: 'required', bucket: 'required', name: 'required', content_type: 'required', size: 'required'}
     */
    public function rules(): array
    {
        return [
            'uuid' => "unique:{$this->getDatabaseConnection()}{$this->getMediaTableName()}",
            'key' => 'required',
            'bucket' => 'required',
            'name' => 'required',
            'content_type' => 'required',
            'size' => 'required',
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, string|array<string, string>>
=======
     * @return array<string, string>
>>>>>>> laraxot/dev
     */
    public function messages(): array
    {
        return [
<<<<<<< HEAD
            'uuid.unique' => trans('medialibrary-pro::upload_request.uuid_not_unique'),
=======
            'uuid.unique' => Lang::string('medialibrary-pro::upload_request.uuid_not_unique'),
>>>>>>> laraxot/dev
        ];
    }

    protected function getDatabaseConnection(): string
    {
        $mediaModel = $this->resolveMediaModel();

        if ($mediaModel->getConnectionName() === 'default') {
            return '';
        }

        return "{$mediaModel->getConnectionName()}.";
    }

    protected function getMediaTableName(): string
    {
        return $this->resolveMediaModel()->getTable();
    }

    private function resolveMediaModel(): Media
    {
        $mediaModelClass = config('media-library.media_model');
        Assert::string($mediaModelClass);
        Assert::subclassOf($mediaModelClass, Media::class);

<<<<<<< HEAD
        return new $mediaModelClass();
=======
        return new $mediaModelClass;
>>>>>>> laraxot/dev
    }
}
