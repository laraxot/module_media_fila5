<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;
use function Safe\class_uses;
use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

uses(\Modules\Media\Tests\TestCase::class);

describe('AttachMediaAction', function (): void {
    it('uses QueueableAction trait', function (): void {
        Assert::assertTrue(trait_exists(QueueableAction::class));
        Assert::assertContains(
            QueueableAction::class,
            class_uses(AttachMediaAction::class)
        );
    });

    it('is instance of AttachMediaAction', function (): void {
        $action = new AttachMediaAction;

        Assert::assertInstanceOf(AttachMediaAction::class, $action);
    });

    it('has execute method', function (): void {
        $reflection = new \ReflectionClass(AttachMediaAction::class);

        Assert::assertTrue($reflection->hasMethod('execute'));
    });
});
