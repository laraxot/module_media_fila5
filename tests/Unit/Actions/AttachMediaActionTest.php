<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
use function Safe\class_uses;

uses(TestCase::class)->group('no-media-db');
=======
uses(\Modules\Media\Tests\TestCase::class);
>>>>>>> 1098966f (.)

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
        expect(trait_exists(QueueableAction::class))->toBeTrue();
        expect(class_uses(AttachMediaAction::class))->toContain(QueueableAction::class);
    });
});
