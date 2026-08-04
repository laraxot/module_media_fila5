<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaCollection;
use Modules\Media\Tests\TestCase;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

pest()->uses(TestCase::class)->in('Feature', 'Unit');

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

expect()->extend('toBeMedia', fn () => $this->toBeInstanceOf(Media::class));

expect()->extend('toBeMediaCollection', fn () => $this->toBeInstanceOf(MediaCollection::class));

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

function createMedia(array $attributes = []): Media
{
    return Media::factory()->create($attributes);
}

function makeMedia(array $attributes = []): Media
{
    return Media::factory()->make($attributes);
}

function createMediaCollection(array $attributes = []): MediaCollection
{
    return MediaCollection::factory()->create($attributes);
}

function makeMediaCollection(array $attributes = []): MediaCollection
{
    return MediaCollection::factory()->make($attributes);
=======
use Illuminate\Support\Facades\DB;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Models\Media;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

/*
 * Bootstrap Pest — modulo Media.
 * Ogni file test dichiara uses(\Modules\Media\Tests\TestCase::class).
 * Vietato pest()->extend() e pest()->uses() qui (PHPStan method.internalClass).
 */

/**
 * @param  array<string, mixed>  $where
 */
function assertMediaTableHas(string $table, array $where, string $connection = 'media'): void
{
    $query = DB::connection($connection)->table($table);

    foreach ($where as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertTrue($query->exists());
}

/**
 * @param  array<string, mixed>  $where
 */
function assertMediaTableMissing(string $table, array $where, string $connection = 'media'): void
{
    $query = DB::connection($connection)->table($table);

    foreach ($where as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertFalse($query->exists());
}

/**
 * @template T of object
 *
 * @param  ReflectionClass<T>  $reflection
 */
function assertMediaReflectionFilename(ReflectionClass $reflection): string
{
    $filename = $reflection->getFileName();
    Assert::assertNotFalse($filename);

    return $filename;
}

/**
 * @template T of object
 *
 * @param  ReflectionClass<T>  $reflection
 */
function mediaReflectionSource(ReflectionClass $reflection): string
{
    return file_get_contents(assertMediaReflectionFilename($reflection));
}

/**
 * @param  list<string>  $haystack
 */
function assertMediaListContains(string $needle, array $haystack): void
{
    Assert::assertTrue(in_array($needle, $haystack, true));
}

/**
 * @param  array<string, mixed>  $attributes
 */
function createMedia(array $attributes = []): Media
{
    return MediaFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function makeMedia(array $attributes = []): Media
{
    return MediaFactory::new()->makeOne($attributes);
}

/**
 * Colonne tabella media per test (list tipizzata per PHPStan).
 *
 * @return array<int, string>
 */
function mediaTableColumns(): array
{
    $columns = \Illuminate\Support\Facades\Schema::getColumnListing('media');

    return array_values(array_filter(
        $columns,
        static fn (mixed $column): bool => is_string($column) && '' !== $column,
    ));
}

/**
 * @param  array<string, mixed>  $payload
 * @param  array<int, string>  $columns
 * @return array<string, mixed>
 */
function mediaPayloadSet(array $payload, array $columns, string $column, mixed $value): array
{
    if (in_array($column, $columns, true)) {
        $payload[$column] = $value;
    }

    return $payload;
}

/**
 * @param  class-string  $class
 */
function assertMediaUsesQueueableAction(string $class): void
{
    assertMediaListContains(
        'Spatie\QueueableAction\QueueableAction',
        (new ReflectionClass($class))->getTraitNames(),
    );
}

/**
 * @param  class-string  $class
 */
function assertMediaDeclaresStrictTypes(string $class): void
{
    $content = mediaReflectionSource(new ReflectionClass($class));
    Assert::assertStringContainsString('declare(strict_types=1);', $content);
>>>>>>> be7d0c3 (.)
}
