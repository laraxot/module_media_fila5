<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

/** @phpstan-ignore-next-line method.nonObject, function.void (Pest uses()->group() chain: pest-plugin-phpstan extension is disabled in root phpstan.neon, so PHPStan does not know uses() returns a bindable TestCase call) */
uses(TestCase::class)->group('no-media-db');

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
        expect(trait_exists(QueueableAction::class))->toBeTrue();
        expect(class_uses(AttachMediaAction::class))->toContain(QueueableAction::class);
    });
});
