<?php

declare(strict_types=1);

namespace Modules\Media\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
=======
use Modules\Xot\Datas\XotData;
>>>>>>> provtv/dev

abstract class MediaBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $_ability): ?bool
    {
<<<<<<< HEAD
=======
        $xotData = XotData::make();
>>>>>>> provtv/dev
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }
}
