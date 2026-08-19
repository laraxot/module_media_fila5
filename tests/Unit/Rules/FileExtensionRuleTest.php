<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Rules;

use Illuminate\Http\UploadedFile;
use Modules\Media\Rules\FileExtensionRule;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

/*
 * Regola di validazione sull'estensione del file caricato. Lavora su UploadedFile
 * in memoria: nessun disco reale, nessun database.
 */

uses(TestCase::class);

test('an allowed extension passes', function (): void {
    $rule = new FileExtensionRule(['pdf', 'docx']);

    Assert::assertTrue($rule->passes('allegato', UploadedFile::fake()->create('fattura.pdf')));
});

test('the comparison ignores case on both sides', function (): void {
    $rule = new FileExtensionRule(['PDF']);

    Assert::assertTrue($rule->passes('allegato', UploadedFile::fake()->create('fattura.PdF')));
});

test('an extension outside the list is rejected', function (): void {
    $rule = new FileExtensionRule(['pdf']);

    Assert::assertFalse($rule->passes('allegato', UploadedFile::fake()->create('foto.jpg')));
});

test('an empty allow list rejects everything', function (): void {
    $rule = new FileExtensionRule;

    Assert::assertFalse($rule->passes('allegato', UploadedFile::fake()->create('fattura.pdf')));
});

test('a value that is not an uploaded file is rejected without inspecting it', function (): void {
    $rule = new FileExtensionRule(['pdf']);

    Assert::assertFalse($rule->passes('allegato', 'fattura.pdf'));
    Assert::assertFalse($rule->passes('allegato', null));
    Assert::assertFalse($rule->passes('allegato', 42));
});

test('the message lists the accepted extensions in lowercase', function (): void {
    $message = (new FileExtensionRule(['PDF', 'DocX']))->message();

    Assert::assertIsString($message);
    Assert::assertStringContainsString('pdf, docx', $message);
});
