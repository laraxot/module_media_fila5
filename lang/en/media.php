<?php

declare(strict_types=1);

return [
    'pages' => 'Pages',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Media',
        'plural' => 'Media',
        'group' => [
            'name' => 'System',
            'description' => 'Multimedia file management',
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
            'label' => 'Collection',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'filename' => [
            'label' => 'Filename',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'mime_type' => [
            'label' => 'Type',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'human_readable_size' => [
            'label' => 'Size',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permissions',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Updated at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'First Name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Last Name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'select_all' => [
            'name' => 'Select All',
            'message' => '',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'creator' => [
            'name' => 'Creator',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'uploaded_at' => [
            'label' => 'Uploaded at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        'name' => 'Name',
        'guard_name' => 'Guard',
        'collection_name' => 'Collection',
        'filename' => 'Filename',
        'mime_type' => 'Type',
        'human_readable_size' => 'Size',
        'permissions' => 'Permissions',
        'updated_at' => 'Updated at',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'select_all' => [
            'name' => 'Select All',
            'message' => '',
        ],
        'creator' => [
            'name' => 'Creator',
        ],
        'uploaded_at' => 'Uploaded at',
>>>>>>> 4e14511d (.)
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Select an XLS or CSV file to upload',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Areas at',
            'columns' => [
                'name' => 'Area name',
                'parent_name' => 'Parent area name',
            ],
        ],
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4e14511d (.)
];
