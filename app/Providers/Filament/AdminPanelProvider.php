<?php

declare(strict_types=1);

namespace Modules\Media\Providers\Filament;

use Filament\Panel;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
use Override;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Media';
<<<<<<< HEAD

    #[Override]
=======
<<<<<<< HEAD

    #[Override]
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    public function panel(Panel $panel): Panel
    {
        return parent::panel($panel);
    }
}
