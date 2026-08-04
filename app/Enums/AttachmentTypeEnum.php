<?php

declare(strict_types=1);

namespace Modules\Media\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Facades\Lang;

enum AttachmentTypeEnum: string implements HasLabel
{
    case IMAGE = 'image';
    case VIDEO = 'video';
    case DOCUMENT = 'document';
    case MANUAL = 'manual';

    /**
<<<<<<< HEAD
     * @return array<string, string|null>
     */
    public static function getTypeNoteDescriptionsByValues(): array
    {
        $result = [];
        foreach (self::cases() as $case) {
            $result[$case->value] = $case->getTypeNote();
        }

        return $result;
=======
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
>>>>>>> be7d0c3 (.)
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

    public function getLabel(): string
    {
        return trans('media::attachments.types.'.$this->value);
    }

    // private static function translateBaseUniquePath(): string
    // {
    //    return 'media::attachments.types';
    // }
}
