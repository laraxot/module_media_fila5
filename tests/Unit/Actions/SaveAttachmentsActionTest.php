<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Media\Tests\TestCase $this */
    Storage::fake('attachments');
});

test('save attachments action can be instantiated', function (): void {
    $action = new SaveAttachmentsAction;
    Assert::assertInstanceOf(SaveAttachmentsAction::class, $action);
});

test('save attachments action exposes execute method', function (): void {
    $action = new SaveAttachmentsAction;
    Assert::assertContains('execute', get_class_methods($action));
});
