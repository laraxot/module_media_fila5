<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Pages;

use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
<<<<<<< .merge_file_YMAtHS
=======
use Modules\Media\Actions\Upload\GetEffectiveUploadLimitAction;
>>>>>>> .merge_file_3QfdAb
use Modules\Media\Datas\MediaConfigData;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Media (`config/{tenant}/media.php`), solo super-admin: dimensione massima e tipi accettati degli allegati delle Resource.
 *
 * @see MediaConfigData
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, TagsInput|TextInput>
     */
    protected function getFormSchema(): array
    {
        return [
            'attachment_max_size_kb' => TextInput::make('attachment_max_size_kb')
                ->numeric()
                ->integer()
                ->minValue(1)
<<<<<<< .merge_file_YMAtHS
                ->required(),
            'attachment_mime_types' => TagsInput::make('attachment_mime_types')
=======
                // Upper bound = what PHP and Livewire really accept in this web request: a larger value is advertised but fails with a 422.
                ->maxValue(fn (): int => intdiv(app(GetEffectiveUploadLimitAction::class)->execute(), 1024))
                ->required(),
            // A typo here silently blocks every upload, so each tag must look like `type/subtype` or `type/*`.
            'attachment_mime_types' => TagsInput::make('attachment_mime_types')
                ->nestedRecursiveRules(['regex:#^[a-z0-9.+-]+/([a-z0-9.+-]+|\*)$#i'])
>>>>>>> .merge_file_3QfdAb
                ->required(),
        ];
    }
}
