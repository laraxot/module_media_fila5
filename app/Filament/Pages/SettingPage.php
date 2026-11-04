<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Pages;

use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Modules\Media\Actions\Upload\GetEffectiveUploadLimitAction;
use Filament\Forms\Components\Toggle;
=======
>>>>>>> f75ac2f819e974b258caacf2f2627553246f20d5
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
            'enabled' => Toggle::make('enabled')->default(true)->required(),
            'attachment_max_size_kb' => TextInput::make('attachment_max_size_kb')
                ->numeric()
                ->integer()
                ->minValue(1)
<<<<<<< HEAD
                // Upper bound = what PHP and Livewire really accept in this web request: a larger value is advertised but fails with a 422.
                ->maxValue(fn (): int => intdiv(app(GetEffectiveUploadLimitAction::class)->execute(), 1024))
                ->required(),
            // A typo here silently blocks every upload, so each tag must look like `type/subtype` or `type/*`.
            'attachment_mime_types' => TagsInput::make('attachment_mime_types')
                ->nestedRecursiveRules(['regex:#^[a-z0-9.+-]+/([a-z0-9.+-]+|\*)$#i'])
=======
                ->required(),
            'attachment_mime_types' => TagsInput::make('attachment_mime_types')
>>>>>>> f75ac2f819e974b258caacf2f2627553246f20d5
                ->required(),
        ];
    }
}
