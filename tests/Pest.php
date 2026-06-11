<?php

declare(strict_types=1);

use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Models\Media;

/*
 * Bootstrap Pest — modulo Media.
 * Ogni file test dichiara uses(\Modules\Media\Tests\TestCase::class).
 * Vietato pest()->extend() e pest()->uses() qui (PHPStan method.internalClass).
 */

/**
 * @param array<string, mixed> $attributes
 */
function createMedia(array $attributes = []): Media
{
    return MediaFactory::new()->createOne($attributes);
}

/**
 * @param array<string, mixed> $attributes
 */
function makeMedia(array $attributes = []): Media
{
    return MediaFactory::new()->makeOne($attributes);
}
