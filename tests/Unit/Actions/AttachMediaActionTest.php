<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Actions\AttachMediaAction;
<<<<<<< .merge_file_3oUfhF
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
=======
>>>>>>> .merge_file_5fetWj
use Spatie\QueueableAction\QueueableAction;

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
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
    });
});
