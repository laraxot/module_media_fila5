<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> be7d0c3 (.)
use Spatie\QueueableAction\QueueableAction;

uses(TestCase::class);

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
        // Arrange
<<<<<<< HEAD
        $action = new AttachMediaAction;

        // Assert - Verify the trait is used
        Assert::assertTrue(trait_exists(QueueableAction::class));
=======
        $action = new AttachMediaAction();

        // Assert - Verify the trait is used
        expect(trait_exists(QueueableAction::class))->toBeTrue();
>>>>>>> be7d0c3 (.)
    });

    it('is instance of AttachMediaAction', function (): void {
        // Arrange
<<<<<<< HEAD
        $action = new AttachMediaAction;

        // Assert
        Assert::assertInstanceOf(AttachMediaAction::class, $action);
=======
        $action = new AttachMediaAction();

        // Assert
        expect($action)->toBeInstanceOf(AttachMediaAction::class);
>>>>>>> be7d0c3 (.)
    });

    it('can be instantiated', function (): void {
        // Act
<<<<<<< HEAD
        $action = new AttachMediaAction;

        // Assert
        Assert::assertInstanceOf(AttachMediaAction::class, $action);
=======
        $action = new AttachMediaAction();

        // Assert
        expect($action)->not()->toBeNull();
>>>>>>> be7d0c3 (.)
    });
});
