<?php

declare(strict_types=1);

// Media translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Media/docs/wiki — domain i18n only.
// File: lang/de/media_convert.php
return [
    'navigation' => [
        'label' => 'media convert',
        'group' => 'media convert',
        'icon' => 'media convert',
        'sort' => '20',
    ],
    'fields' => [
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
];
