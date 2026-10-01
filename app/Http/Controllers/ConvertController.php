<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ConvertController extends Controller
{
    /**
     * Show the conversion page for the given media.
     */
    public function __invoke(string|int $mediaId): View
    {
        return view('media::convert', ['id' => $mediaId]);
    }
}
