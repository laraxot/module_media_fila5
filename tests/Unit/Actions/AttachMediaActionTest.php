<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(TestCase::class);

describe('AttachMediaAction', function () {
    // Prima c'erano tre test per lo stesso fatto e nessuno lo verificava:
    // `trait_exists()` guarda il vendor, non l'action; `toBeInstanceOf` e
    // `not()->toBeNull()` su `new AttachMediaAction()` sono veri per costruzione.
    it('uses QueueableAction trait', function (): void {
        expect(class_uses(AttachMediaAction::class))
            ->toHaveKey(QueueableAction::class);
    });
});
