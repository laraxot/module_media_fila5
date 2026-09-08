<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

<<<<<<< HEAD
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
=======
use Illuminate\Contracts\Validation\Rule;
>>>>>>> 4e14511d (.)
use Illuminate\Http\UploadedFile;

use function in_array;

<<<<<<< HEAD
class FileExtensionRule implements ValidationRule
{
    /** @var list<string> */
    protected array $validExtensions = [];

    /**
     * @param  list<string>  $validExtensions
     */
    public function __construct(array $validExtensions = [])
    {
        $this->validExtensions = array_values(array_map(
            /**
             * @return lowercase-string
             */
            static fn (string $ext): string => mb_strtolower($ext),
            $validExtensions
        ));
    }

    public function validate(string $_attribute, mixed $value, Closure $fail): void
    {
        if (! $value instanceof UploadedFile) {
            $fail($this->message());

            return;
        }

        if (! in_array(mb_strtolower($value->getClientOriginalExtension()), $this->validExtensions, strict: false)) {
            $fail($this->message());
        }
    }

    public function message(): string
    {
        $message = trans('media::validation.mime', [
            'mimes' => implode(', ', $this->validExtensions),
        ]);

        if (is_string($message)) {
            return $message;
        }

        $parts = [];
        foreach ($message as $part) {
            if (is_string($part)) {
                $parts[] = $part;
            }
        }

        return implode(' ', $parts);
=======
class FileExtensionRule implements Rule
{
    protected array $validExtensions = [];

    /**
     * @param  array<int, string>  $validExtensions
     */
    public function __construct(array $validExtensions = [])
    {
        $this->validExtensions = array_map(
            /**
             * @param  mixed  $ext
             * @return lowercase-string
             */
            static fn ($ext): string => mb_strtolower((string) $ext),
            $validExtensions
        );
    }

    /**
     * @param  string  $attribute  The attribute being validated (not used in this rule)
     * @param  mixed  $value  The uploaded file to validate
     */
    public function passes($attribute, $value): bool
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
>>>>>>> 4e14511d (.)
    }
}
