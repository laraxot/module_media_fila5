<?php

declare(strict_types=1);

namespace Modules\Media\Enums;

<<<<<<< HEAD
use Modules\Xot\Traits\EnumTrait;
=======
>>>>>>> 7605234 (.)
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Facades\Lang;

enum AttachmentTypeEnum: string implements HasLabel
{
<<<<<<< HEAD
    use EnumTrait;

=======
>>>>>>> 7605234 (.)
    case IMAGE = 'image';
    case VIDEO = 'video';
    case DOCUMENT = 'document';
    case MANUAL = 'manual';

    /**
     * @return array<string, string>
     */
    /**
     * @return array<string, string>
     */
    public static function getTypeNoteDescriptionsByValues(): array
    {
        /** @var array<string, string> $descriptions */
        $descriptions = [];

        foreach (self::cases() as $case) {
            $note = $case->getTypeNote();
            if ($note !== null) {
                $descriptions[$case->value] = $note;
            }
        }

        return $descriptions;
    }

    /* Method Modules\Media\Enums\AttachmentTypeEnum::operationCases() never returns null so it can be removed from the return type
     * public static function operationCases(): ?array
     * {
     * $originalCases = self::cases();
     * array_pop($originalCases);
     *
     * return $originalCases;
     * }
     */

    public function getTypeNote(): ?string
    {
        $translationKey = sprintf('media::attachments.type_notes.%s', $this->value);
        if (Lang::has($translationKey)) {
            return trans($translationKey);
        }

        return null;
    }

<<<<<<< HEAD
    
=======
    public function getLabel(): string
    {
        return trans('media::attachments.types.'.$this->value);
    }
>>>>>>> 7605234 (.)

    // private static function translateBaseUniquePath(): string
    // {
    //    return 'media::attachments.types';
    // }
}
