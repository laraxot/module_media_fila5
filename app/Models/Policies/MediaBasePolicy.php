<?php

declare(strict_types=1);

namespace Modules\Media\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
=======
>>>>>>> 9b998103 (.)

abstract class MediaBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $_ability): ?bool
    {
<<<<<<< HEAD
        $xotData = XotData::make();
=======
>>>>>>> 9b998103 (.)
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }
}
