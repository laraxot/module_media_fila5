<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'format' => ['label' => 'format'],
        'codec_video' => ['label' => 'codec_video'],
        'codec_audio' => ['label' => 'codec_audio'],
        'media' => [
            'file_name' => ['label' => 'media.file_name'],
        ],
        'preset' => ['label' => 'preset'],
        'bitrate' => ['label' => 'bitrate'],
        'width' => ['label' => 'width'],
        'height' => ['label' => 'height'],
        'threads' => ['label' => 'threads'],
        'speed' => ['label' => 'speed'],
        'percentage' => ['label' => 'percentage'],
        'remaining' => ['label' => 'remaining'],
        'rate' => ['label' => 'rate'],
        'execution_time' => ['label' => 'execution_time'],
    ],
    'actions' => [
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'convert' => ['label' => 'convert', 'icon' => 'convert', 'tooltip' => 'convert'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
    ],
];
