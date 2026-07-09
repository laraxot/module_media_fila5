<?php

declare(strict_types=1);

// Media translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Media/docs/wiki — domain i18n only.
// File: lang/it/aws_test.php
return [
    'navigation' => [
        'group' => 'Media',
    ],
    'label' => 'Aws Test',
    'plural_label' => 'Aws Test (Plurale)',
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
            'label' => 'Crea Aws Test',
        ],
        'edit' => [
            'label' => 'Modifica Aws Test',
        ],
        'delete' => [
            'label' => 'Elimina Aws Test',
        ],
    ],
];
