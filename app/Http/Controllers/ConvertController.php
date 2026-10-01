<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ConvertController extends Controller
{
    /**
     * Show the profile for the given user.
     */
    public function __invoke(string|int $_id): View
    {
        /** @var view-string $view */
        $view = 'media::convert';
        return view($view, []);
    }
}
