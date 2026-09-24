<?php

declare(strict_types=1);
<<<<<<< .merge_file_BlTN2o

=======
<<<<<<< .merge_file_RIBPJW
=======
<<<<<<< .merge_file_vgdpL2

=======
<<<<<<< .merge_file_KZtSLH

=======
<<<<<<< .merge_file_KXISO2

=======
>>>>>>> .merge_file_rVV42X
<<<<<<< .merge_file_vUfi5G
=======

>>>>>>> .merge_file_xwUL4j
<<<<<<< .merge_file_RIBPJW
=======
>>>>>>> .merge_file_4s4Tj2
>>>>>>> .merge_file_ZDwEYe
>>>>>>> .merge_file_of4hHY
>>>>>>> .merge_file_rVV42X
>>>>>>> .merge_file_aeY7nC
use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Modulo Media',
    'siteDescription' => 'Modulo Media',
    'lang' => 'it',

    'collections' => [
        'posts' => [
            'path' => fn ($page): string => $page->lang.'/posts/'.Str::slug($page->getFilename()),
        ],
        'docs' => [
            'path' => fn ($page): string => $page->lang.'/docs/'.Str::slug($page->getFilename()),
        ],
    ],

    // Algolia DocSearch credentials
    'docsearchApiKey' => env('DOCSEARCH_KEY'),
    'docsearchIndexName' => env('DOCSEARCH_INDEX'),

    // navigation menu
    'navigation' => require_once (__DIR__.'/navigation.php'),

    // helpers
    'isActive' => fn ($page, $path) => Str::endsWith(trimPath($page->getPath()), trimPath($path)),
    'isItemActive' => fn ($page, $item) => Str::endsWith(trimPath($page->getPath()), trimPath($item->getPath())),
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(fn ($child): bool => trimPath($page->getPath()) === trimPath($child));
        }
    },
    'url' => function ($page, $path) {
        if (Str::startsWith($path, 'http')) {
            return $path;
        }

        // return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
        return url('/'.$page->lang.'/'.trimPath($path));
    },

    'children' => fn ($page, $docs): array =>
        // return $docs->where('parent_id', $page->);
        [],
];
