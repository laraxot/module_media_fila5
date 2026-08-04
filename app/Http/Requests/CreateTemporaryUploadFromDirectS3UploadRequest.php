<?php

declare(strict_types=1);

namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Models\Media;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
=======
// phpmd: LongClassName — nome esplicito per upload diretto S3
>>>>>>> be7d0c3 (.)
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
     * @return array<string, string>
=======
     * @return array<string, string|array<string, string>>
>>>>>>> be7d0c3 (.)
     */
    public function messages(): array
    {
        return [
            'uuid.unique' => trans('medialibrary-pro::upload_request.uuid_not_unique'),
        ];
    }

    protected function getDatabaseConnection(): string
    {
<<<<<<< HEAD
        $mediaModel = $this->newMediaModel();
=======
        $mediaModel = $this->resolveMediaModel();
>>>>>>> be7d0c3 (.)

        if ($mediaModel->getConnectionName() === 'default') {
            return '';
        }

        return "{$mediaModel->getConnectionName()}.";
    }

    protected function getMediaTableName(): string
    {
<<<<<<< HEAD
        return $this->newMediaModel()->getTable();
    }

    protected function newMediaModel(): Media
    {
        $mediaModelClass = config('media-library.media_model');
        Assert::isAOf($mediaModelClass, Media::class);

        return new $mediaModelClass;
=======
        return $this->resolveMediaModel()->getTable();
    }

    private function resolveMediaModel(): Media
    {
        $mediaModelClass = config('media-library.media_model');
        Assert::string($mediaModelClass);
        Assert::subclassOf($mediaModelClass, Media::class);

        return new $mediaModelClass();
>>>>>>> be7d0c3 (.)
    }
}
