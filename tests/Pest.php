<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Models\Media;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

>>>>>>> laraxot/dev
/*
 * Bootstrap Pest — modulo Media.
 *
 * Questo file NON viene caricato. `Pest\Bootstrappers\BootFiles` legge `Pest.php`,
 * `Helpers.php` ed `Expectations.php` da un solo percorso per run — quello della root —
 * quindi ogni funzione dichiarata qui è codice morto e i test che la chiamano falliscono
 * con `Call to undefined function`. È successo davvero: 23 test di Media, 2026-08-19.
 *
 * Regole, non negoziabili:
 * - zero funzioni libere qui dentro (`grep -c '^function ' ` deve dare 0);
 * - helper condivisi: metodi statici su `Modules\Xot\Tests\XotBasePest` (autoload PSR-4,
 *   niente `require_once`);
 * - helper di dominio Media: metodi statici su `Modules\Media\Tests\TestCase`;
 * - ogni file di test dichiara `uses(\Modules\Media\Tests\TestCase::class)` in testa —
 *   un `uses()->in(...)` scritto qui non verrebbe applicato;
 * - `pest()->extend(TestCase::class)->in(...)` e' la forma consigliata (il divieto
 *   storico per `method.internalClass` e' decaduto con pest-plugin-phpstan, story
 *   XOT-5.41); vincolo XOR con gli `uses()` per-file (`TestCaseAlreadyInUse`):
 *   migrare per directory, non mescolare;
 * - vietata la cartella `tests/Support/` (ADR-002).
 */
<<<<<<< HEAD
=======
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
{
    $content = mediaReflectionSource(new ReflectionClass($class));
    Assert::assertStringContainsString('declare(strict_types=1);', $content);
}
>>>>>>> laraxot/dev
