<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

use function in_array;

class FileExtensionRule implements Rule
{
    /** @var list<string> */
    protected array $validExtensions = [];

    /**
     * @param  array<int, string>  $validExtensions
     */
    public function __construct(array $validExtensions = [])
    {
        $normalizedExtensions = array_map(
            /**
             * @param  mixed  $ext
             * @return lowercase-string
             */
            static fn ($ext): string => mb_strtolower((string) $ext),
            $validExtensions,
        );

        $this->validExtensions = array_values($normalizedExtensions);
    }

    /**
     * @param  mixed  $attribute  The attribute being validated (not used in this rule)
     * @param  mixed  $value  The uploaded file to validate
     */
    public function passes(mixed $attribute, mixed $value): bool
    {
        if (! $value instanceof UploadedFile) {
            return false;
        }

        return in_array(mb_strtolower($value->getClientOriginalExtension()), $this->validExtensions, strict: false);
    }

    public function message(): array|string
    {
        return trans('media::validation.mime', [
            'mimes' => implode(', ', $this->validExtensions),
        ]);
    }
}
