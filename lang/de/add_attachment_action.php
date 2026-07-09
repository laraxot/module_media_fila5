<?php

declare(strict_types=1);

// Media translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Media/docs/wiki — domain i18n only.
// File: lang/de/add_attachment_action.php
return [
    'title' => 'Anhänge',
    'label' => 'Anhang hochladen',
    'fields' => [
        'file' => [
            'label' => 'Datei',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'file_hint' => [
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name_hint' => [
            'label' => 'Dateiname',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
];
