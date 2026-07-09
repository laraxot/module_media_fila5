<?php

declare(strict_types=1);

// Media translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Media/docs/wiki — domain i18n only.
// File: lang/en/icon_media.php
return [
    'fields' => [
        'change-state' => [
            'label' => 'Change state',
            'placeholder' => 'Select new state',
            'help' => 'Modify the current state of the element',
            'description' => 'Action to change the state',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'state' => [
            'label' => 'State',
            'placeholder' => 'Select a state',
            'help' => 'Current state of the element',
            'description' => 'Current system state',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter a message',
            'help' => 'Informative message for the user',
            'description' => 'Message text',
            'helper_text' => '',
            'tooltip' => '',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
];
