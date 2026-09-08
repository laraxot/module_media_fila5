<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Media\Filament\Actions\Table;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Forms\Components\Radio;
use Modules\Xot\Filament\Actions\XotBaseAction;

class ConvertAction extends XotBaseAction
=======
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;

class ConvertAction extends Action
>>>>>>> 4e14511d (.)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip('convert')
            ->openUrlInNewTab()
            ->icon('media-convert')
            ->schema([
                Radio::make('format')
                    ->options([
                        'webm01' => 'webm01',
                        'webm02' => 'webm02',
                    ])
                    ->inline()
                    ->inlineLabel(false),
            ])
<<<<<<< HEAD
            ->action(static function (): void {
                throw new \RuntimeException('Removed debug dddx');
            });
=======
            ->action(dddx(...));
>>>>>>> 4e14511d (.)

        // ->requiresConfirmation()
    }
}
