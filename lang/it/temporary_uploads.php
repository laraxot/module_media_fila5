<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'folder' => ['label' => 'folder'],
        'file_name' => ['label' => 'file_name'],
        'mime_type' => ['label' => 'mime_type'],
        'file_size' => ['label' => 'file_size'],
        'status' => ['label' => 'status'],
    ],
    'actions' => [
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
    ],
];
