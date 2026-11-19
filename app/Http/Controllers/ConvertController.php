<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ConvertController extends BaseController
{
    /**
     * Show the conversion page for the given media.
     */
    public function __invoke(string|int $mediaId): View
    {
<<<<<<< HEAD
        return app(Factory::class)->make('media::convert');
=======
        /** @var view-string $convertView */
        $convertView = 'media::convert';

        return app(Factory::class)->make($convertView);
>>>>>>> laraxot/dev
    }
}
