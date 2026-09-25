<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Actions\AttachMediaAction;
use Spatie\QueueableAction\QueueableAction;

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
        // Arrange
        $action = new AttachMediaAction;

<<<<<<< .merge_file_zJe9hY
        expect(class_uses_recursive($action))->toContain(QueueableAction::class);
=======
        // Assert - Verify the trait is used
        expect(trait_exists(QueueableAction::class))->toBeTrue();
>>>>>>> .merge_file_tFdcTp
    });

    it('is instance of AttachMediaAction', function (): void {
        // Arrange
        $action = new AttachMediaAction;

        // Assert
<<<<<<< .merge_file_zJe9hY
        expect(method_exists($action, 'execute'))->toBeTrue();
    });

=======
        expect($action)->toBeInstanceOf(AttachMediaAction::class);
    });

    it('can be instantiated', function (): void {
        // Act
        $action = new AttachMediaAction;

        // Assert
        expect($action)->not()->toBeNull();
    });
>>>>>>> .merge_file_tFdcTp
});
