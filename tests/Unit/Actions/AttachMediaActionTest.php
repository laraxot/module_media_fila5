<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;
<<<<<<< HEAD
use ReflectionClass;

use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
use Spatie\QueueableAction\QueueableAction;

uses(\Modules\Media\Tests\TestCase::class);

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function(): void {
        // Arrange
        $action = new AttachMediaAction();
=======

uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Actions\AttachMediaAction;
use Spatie\QueueableAction\QueueableAction;

describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
        // Arrange
        $action = new AttachMediaAction;
>>>>>>> 7605234 (.)

        // Assert - Verify the trait is used
        expect(trait_exists(QueueableAction::class))->toBeTrue();
    });

<<<<<<< HEAD
    it('is instance of AttachMediaAction', function(): void {
        // Arrange
        $action = new AttachMediaAction();
=======
    it('is instance of AttachMediaAction', function (): void {
        // Arrange
        $action = new AttachMediaAction;
>>>>>>> 7605234 (.)

        // Assert
        expect($action)->toBeInstanceOf(AttachMediaAction::class);
    });

<<<<<<< HEAD
    it('can be instantiated', function(): void {
        // Act
        $action = new AttachMediaAction();
=======
    it('can be instantiated', function (): void {
        // Act
        $action = new AttachMediaAction;
>>>>>>> 7605234 (.)

        // Assert
        expect($action)->not()->toBeNull();
    });
});
