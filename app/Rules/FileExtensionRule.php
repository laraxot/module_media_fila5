<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;
use Illuminate\Translation\PotentiallyTranslatedString;

use function in_array;

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

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute  The attribute being validated (not used in this rule)
     * @param  mixed  $value  The uploaded file to validate
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value instanceof UploadedFile) {
            $fail($this->message());

            return;
        }

        if (! in_array(mb_strtolower($value->getClientOriginalExtension()), $this->validExtensions, true)) {
            $fail($this->message());
        }
    }

    /**
     * Messaggio di errore, con l'elenco delle estensioni ammesse.
     *
     * `trans()` dichiara `array|string`: restituisce un array solo quando la chiave
     * punta a un gruppo di traduzioni. Qui la chiave e' una stringa singola, quindi
     * l'array e' una lang file rotta e il fallback e' la chiave, non stringa vuota:
     * un messaggio vuoto passerebbe la validazione senza dire niente all'utente.
     */
    public function message(): string
    {
        $message = trans('media::validation.mime', [
            'mimes' => implode(', ', $this->validExtensions),
        ]);

        return is_string($message) ? $message : 'media::validation.mime';
    }
}
