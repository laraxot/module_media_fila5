<?php

declare(strict_types=1);

use Filament\Forms\Components\FileUpload;
use Modules\Media\Actions\GetAttachmentsSchemaAction;
use PHPUnit\Framework\Assert;

test('get attachments schema returns file upload components', function (): void {
    $action = new GetAttachmentsSchemaAction;

    $schema = $action->execute(['invoice', 'contract']);

    Assert::assertCount(2, $schema);
    Assert::assertInstanceOf(FileUpload::class, $schema[0]);
    Assert::assertInstanceOf(FileUpload::class, $schema[1]);
    Assert::assertSame('invoice', $schema[0]->getName());
    Assert::assertSame('contract', $schema[1]->getName());
});

test('get attachments schema applies expected upload defaults', function (): void {
    $action = new GetAttachmentsSchemaAction;

    $schema = $action->execute(['invoice']);
    $component = $schema[0];

    Assert::assertSame('temp', $component->getDirectory());
    Assert::assertSame('attachments', $component->getDiskName());
    Assert::assertTrue($component->isRequired());
    Assert::assertFalse($component->isMultiple());
    Assert::assertTrue($component->isPreviewable());
    Assert::assertTrue($component->isDownloadable());
    Assert::assertFalse($component->isReorderable());
    Assert::assertSame('public', $component->getVisibility());
    Assert::assertIsArray($component->getAcceptedFileTypes());
    Assert::assertNotEmpty($component->getAcceptedFileTypes());
});
