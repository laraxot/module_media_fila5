<?php

declare(strict_types=1);

return [
    'name' => 'Media',
    'description' => 'Modulo per la gestione dei file multimediali e documenti',
<<<<<<< .merge_file_5gwMju
    'icon' => 'media-icon',
=======
    'icon' => 'heroicon-o-photo',
>>>>>>> .merge_file_7pmHxk
    'navigation' => [
        'enabled' => true,
        'sort' => 60,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Media\\Providers\\MediaServiceProvider',
    ],
];
