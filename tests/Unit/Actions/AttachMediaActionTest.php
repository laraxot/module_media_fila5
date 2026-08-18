<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Modules\Media\Actions\AttachMediaAction;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
use Modules\Media\Tests\TestCase;
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
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
>>>>>>> laraxot/dev
    });
});
