<?php

declare(strict_types=1);

// Media translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Media/docs/wiki — domain i18n only.
// File: lang/it/temporary_upload.php
return [
    'navigation' => [
        'label' => 'temporary upload',
        'group' => 'temporary upload',
        'icon' => 'temporary upload',
        'sort' => 96,
    ],
    'label' => 'Temporary Upload',
    'plural_label' => 'Temporary Upload (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Temporary Upload',
        ],
        'edit' => [
            'label' => 'Modifica Temporary Upload',
        ],
        'delete' => [
            'label' => 'Elimina Temporary Upload',
        ],
    ],
];
