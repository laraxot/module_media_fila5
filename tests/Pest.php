<?php

declare(strict_types=1);

<<<<<<< .merge_file_Fboosw
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Media\Database\Factories\MediaFactory;
=======
>>>>>>> .merge_file_TljFI7
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
<<<<<<< .merge_file_Fboosw
    $columns = Schema::getColumnListing('media');

    return array_values(array_filter(
        $columns,
        static fn (mixed $column): bool => is_string($column) && $column !== '',
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

function mediaIntegerish(mixed $value): int
{
    Webmozart\Assert\Assert::integerish($value);

    return (int) $value;
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
=======
    return MediaCollection::factory()->create($attributes);
}

function makeMediaCollection(array $attributes = []): MediaCollection
>>>>>>> .merge_file_TljFI7
{
    return MediaCollection::factory()->make($attributes);
}
