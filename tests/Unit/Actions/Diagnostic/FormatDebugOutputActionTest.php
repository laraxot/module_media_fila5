<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions\Diagnostic;

use Modules\Media\Actions\Diagnostic\S3\FormatDebugOutputAction;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

/*
 * Formattazione del report diagnostico S3: e' pura manipolazione di stringhe,
 * non tocca ne' rete ne' database.
 */

uses(TestCase::class)->group('no-media-db');

test('empty results fall back to the given message', function (): void {
<<<<<<< HEAD
    $output = (new FormatDebugOutputAction)->execute([], 'nessun risultato');
=======
    $output = (new FormatDebugOutputAction())->execute([], 'nessun risultato');
>>>>>>> laraxot/dev

    Assert::assertSame('nessun risultato', $output);
});

test('a well formed result renders title, status and data lines', function (): void {
<<<<<<< HEAD
    $output = (new FormatDebugOutputAction)->execute([
=======
    $output = (new FormatDebugOutputAction())->execute([
>>>>>>> laraxot/dev
        'bucket' => [
            'title' => 'Bucket',
            'status' => 'ok',
            'data' => [
                'region' => 'eu-west-1',
                'objects' => 12,
            ],
        ],
    ], 'nessun risultato');

    $lines = explode("\n", $output);

    Assert::assertSame('=== Bucket ===', $lines[0]);
    Assert::assertSame('Status: ok', $lines[1]);
    Assert::assertSame('', $lines[2]);
    Assert::assertSame('region: eu-west-1', $lines[3]);
    Assert::assertSame('objects: 12', $lines[4]);
    Assert::assertSame(str_repeat('-', 50), $lines[6]);
});

test('nested array values are rendered as pretty printed json', function (): void {
<<<<<<< HEAD
    $output = (new FormatDebugOutputAction)->execute([
=======
    $output = (new FormatDebugOutputAction())->execute([
>>>>>>> laraxot/dev
        'policy' => [
            'title' => 'Policy',
            'status' => 'ko',
            'data' => ['statements' => ['Allow', 'Deny']],
        ],
    ], 'nessun risultato');

    Assert::assertStringContainsString('statements: [', $output);
    Assert::assertStringContainsString('"Allow"', $output);
    Assert::assertStringContainsString('"Deny"', $output);
});

test('entries that are not arrays or lack the required keys are skipped', function (): void {
<<<<<<< HEAD
    $output = (new FormatDebugOutputAction)->execute([
=======
    $output = (new FormatDebugOutputAction())->execute([
>>>>>>> laraxot/dev
        'scalare' => 'non e un array',
        'incompleto' => ['title' => 'Solo il titolo'],
    ], 'nessun risultato');

    Assert::assertSame('', $output);
});

test('several results are separated by their own rule line', function (): void {
    $result = static fn (string $title): array => [
        'title' => $title,
        'status' => 'ok',
        'data' => ['k' => 'v'],
    ];

<<<<<<< HEAD
    $output = (new FormatDebugOutputAction)->execute([
=======
    $output = (new FormatDebugOutputAction())->execute([
>>>>>>> laraxot/dev
        'primo' => $result('Primo'),
        'secondo' => $result('Secondo'),
    ], 'nessun risultato');

    Assert::assertSame(2, substr_count($output, str_repeat('-', 50)));
    Assert::assertStringContainsString('=== Primo ===', $output);
    Assert::assertStringContainsString('=== Secondo ===', $output);
});
