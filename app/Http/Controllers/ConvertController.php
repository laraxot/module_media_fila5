<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ConvertController extends Controller
{
    /**
     * Show the profile for the given user.
     */
    public function __invoke(string|int $_id): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'media::convert';
        $view_params = [];

        return view($view, $view_params);
=======
use Illuminate\Contracts\View\View;

class ConvertController extends BaseController
{
    /**
     * Show the conversion page for the given media.
     */
    public function __invoke(string|int $mediaId): View
    {
        /** @var view-string $view */
        $view = 'media::convert';
        return view($view, []);

>>>>>>> laraxot/dev
    }
}
