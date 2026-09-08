<?php

declare(strict_types=1);

return [
    'pages' => 'Seiten',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Medien',
        'plural' => 'Medien',
        'group' => [
            'name' => 'System',
            'description' => 'Multimedia-Dateiverwaltung',
        ],
        'label' => 'media',
        'sort' => '20',
        'icon' => 'media-main-animated',
    ],
    'fields' => [
<<<<<<< HEAD
        'name' => [
            'label' => 'Name',
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
            'label' => 'Sammlung',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'filename' => [
            'label' => 'Dateiname',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'mime_type' => [
            'label' => 'Typ',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'human_readable_size' => [
            'label' => 'Größe',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Berechtigungen',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aktualisiert am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'Vorname',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Nachname',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'select_all' => [
            'name' => 'Alle auswählen',
            'message' => '',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'creator' => [
            'name' => 'Ersteller',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'uploaded_at' => [
            'label' => 'Hochgeladen am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        'name' => 'Name',
        'guard_name' => 'Guard',
        'collection_name' => 'Sammlung',
        'filename' => 'Dateiname',
        'mime_type' => 'Typ',
        'human_readable_size' => 'Größe',
        'permissions' => 'Berechtigungen',
        'updated_at' => 'Aktualisiert am',
        'first_name' => 'Vorname',
        'last_name' => 'Nachname',
        'select_all' => [
            'name' => 'Alle auswählen',
            'message' => '',
        ],
        'creator' => [
            'name' => 'Ersteller',
        ],
        'uploaded_at' => 'Hochgeladen am',
>>>>>>> 4e14511d (.)
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Wählen Sie eine XLS- oder CSV-Datei zum Hochladen aus',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Bereiche am',
            'columns' => [
                'name' => 'Bereichsname',
                'parent_name' => 'Übergeordneter Bereichsname',
            ],
        ],
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4e14511d (.)
];
