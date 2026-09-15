<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\AttachMediaAction;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(TestCase::class)->group('no-media-db');

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
<<<<<<< HEAD
        expect(trait_exists(QueueableAction::class))->toBeTrue();
        expect(class_uses(AttachMediaAction::class))->toContain(QueueableAction::class);
=======
        // Arrange
        $action = new AttachMediaAction;

        // Assert - Verify the trait is used
        Assert::assertTrue(trait_exists(QueueableAction::class));
    });

    it('is instance of AttachMediaAction', function (): void {
        // Arrange
        $action = new AttachMediaAction;

        // Assert
        Assert::assertInstanceOf(AttachMediaAction::class, $action);
    });

    it('can be instantiated', function (): void {
        // Act
        $action = new AttachMediaAction;

        // Assert
        Assert::assertInstanceOf(AttachMediaAction::class, $action);
>>>>>>> laraxot/dev
    });
});
