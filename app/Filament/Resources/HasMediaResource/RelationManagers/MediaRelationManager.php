<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\HasMediaResource\RelationManagers;

<<<<<<< HEAD
use Modules\Media\Filament\Resources\HasMediaResource\Actions\AddAttachmentAction;
use Modules\Media\Filament\Resources\MediaResource;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Modules\Xot\Filament\Actions\XotBaseActionGroup;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Modules\Media\Filament\Resources\HasMediaResource\Actions\AddAttachmentAction;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> 4e14511d (.)
use Override;

class MediaRelationManager extends XotBaseRelationManager
{
<<<<<<< HEAD
    /**
     * Il namespace annida questo RelationManager sotto `HasMediaResource`, ma quella
     * classe non esiste: c'e' solo la cartella con Schemas/Tables/Actions. Senza una
     * dichiarazione esplicita `getResource()` deriverebbe `…\HasMediaResource` e
     * fallirebbe al primo mount. Si punta alla Resource reale del modulo.
     *
     * @var class-string<XotBaseResource>
     */
    protected static string $resource = MediaResource::class;

=======
>>>>>>> 4e14511d (.)
    protected static string $relationship = 'media';

    protected static ?string $inverseRelationship = 'model';

    /**
<<<<<<< HEAD
     * @return array<string, XotBaseAction|XotBaseActionGroup>
=======
     * @return array<string, Action|ActionGroup>
>>>>>>> 4e14511d (.)
     */
    #[Override]
    public function getTableHeaderActions(): array
    {
        return [
            'add_attachment' => AddAttachmentAction::make(),
        ];
    }
}
