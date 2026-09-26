<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Rules;

use Closure;
use Illuminate\Http\UploadedFile;
use Modules\Media\Rules\FileExtensionRule;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-media-db');

/**
 * Raccoglie i messaggi passati alla closure `$fail` di una ValidationRule.
 *
 * @param  list<string>  $collected
 */
function fileExtensionRuleFailCollector(array &$collected): Closure
{
    return static function (string $message) use (&$collected): void {
        $collected[] = $message;
    };
}

describe('FileExtensionRule', function (): void {
    it('lowercases the extensions given to the constructor', function (): void {
        $rule = new FileExtensionRule(['PDF', 'Jpg']);

        Assert::assertStringContainsString('pdf', $rule->message());
        Assert::assertStringContainsString('jpg', $rule->message());
    });

    it('fails when the value is not an uploaded file', function (): void {
        $rule = new FileExtensionRule(['pdf']);
        $collected = [];

        $rule->validate('attachment', 'not-a-file', fileExtensionRuleFailCollector($collected));

        Assert::assertCount(1, $collected);
    });

    it('passes when the extension is allowed, ignoring case', function (): void {
        $rule = new FileExtensionRule(['pdf']);
        $collected = [];

        $rule->validate('attachment', UploadedFile::fake()->create('contratto.PDF'), fileExtensionRuleFailCollector($collected));

        Assert::assertSame([], $collected);
    });

    it('fails when the extension is not allowed', function (): void {
        $rule = new FileExtensionRule(['pdf']);
        $collected = [];

        $rule->validate('attachment', UploadedFile::fake()->create('malware.exe'), fileExtensionRuleFailCollector($collected));

        Assert::assertCount(1, $collected);
    });

    it('lists the allowed extensions in the message', function (): void {
        $rule = new FileExtensionRule(['pdf', 'doc']);

        $message = $rule->message();

        Assert::assertStringContainsString('pdf', $message);
        Assert::assertStringContainsString('doc', $message);
    });

    it('builds a message even when no extension is allowed', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_KON7kc
        $rule = new FileExtensionRule();
=======
<<<<<<< .merge_file_greIVf
        $rule = new FileExtensionRule();
=======
<<<<<<< .merge_file_jSBKtL
        $rule = new FileExtensionRule();
=======
        $rule = new FileExtensionRule;
>>>>>>> .merge_file_I3bcez
>>>>>>> .merge_file_gNuEa3
>>>>>>> .merge_file_KK4fNr
=======
        $rule = new FileExtensionRule();
>>>>>>> laraxot/dev

        Assert::assertNotSame('', $rule->message());
    });
});
