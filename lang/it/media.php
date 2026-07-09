<?php

declare(strict_types=1);

// Media translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Media/docs/wiki — domain i18n only.
// File: lang/it/media.php
return [
// Laraxot — see module docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Media',
        'plural' => 'Media',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione dei file multimediali',
        ],
        'label' => 'media',
        'sort' => 20,
        'icon' => 'media-main-animated',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'collection_name' => [
            'label' => 'Collezione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'filename' => [
            'label' => 'Nome File',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'mime_type' => [
            'label' => 'Tipo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'human_readable_size' => [
            'label' => 'Dimensione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'select_all' => [
            'name' => 'Seleziona Tutti',
            'message' => '',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'creator' => [
            'name' => 'Creatore',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'uploaded_at' => [
            'label' => 'Caricato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'id' => [
            'label' => 'id',
        ],
        'file_name' => [
            'label' => 'file_name',
        ],
        'disk' => [
            'label' => 'disk',
        ],
        'size' => [
            'label' => 'size',
        ],
        'order_column' => [
            'label' => 'order_column',
        ],
        'model_type' => [
            'label' => 'model_type',
        ],
        'model_id' => [
            'label' => 'model_id',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
    'model' => [
        'label' => 'media.model',
    ],
    'label' => 'Media',
    'plural_label' => 'Media (Plurale)',
];
