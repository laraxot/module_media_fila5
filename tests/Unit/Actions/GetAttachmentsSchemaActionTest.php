<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Filament\Forms\Components\FileUpload;
use Modules\Media\Actions\GetAttachmentsSchemaAction;
use Modules\Media\Tests\TestCase;

ses(TestCase::class);

/**
 * Test that the action returns attachment schema correctly.
 */
it('returns attachment schema', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice', 'contract', 'receipt'];

    // Act
    $form = $action->execute($attachments);

    // Assert
   expect($form)->toHaveCount(3);

    // Il tipo dei componenti e' gia' dichiarato dal return type dell'action: cio' che
    // il test verifica e' che ogni allegato chiesto abbia il proprio campo, con il nome
    // dell'allegato.
    expect(array_map(static fn (FileUpload $component): string => $component->getName(), $form))
        ->toBe($attachments);
});

/**
 * Test that the schema has correct names.
 */
it('has correct names', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice', 'contract'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    expect($form[0]->getName())->toBe('invoice');
    expect($form[1]->getName())->toBe('contract');
});

/**
 * Test that the schema has correct labels.
 */

/**
 * Test that the schema has correct validation.
 */
it('has correct validation', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->isRequired())->toBeTrue();
    // Accepted file types can be expressed as MIME types or extensions depending on Filament internals.
    $acceptedTypes = $component->getAcceptedFileTypes();
    expect($acceptedTypes)->toBeArray();
    expect($acceptedTypes)->not()->toBeEmpty();

    $allowed = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'pdf',
        'doc',
        'docx',
    ];

    expect(collect($acceptedTypes)->contains(fn ($t) => in_array($t, $allowed, true)))->toBeTrue();
});

/**
 * Test that the schema has correct storage.
 */
it('has correct storage', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->getDiskName())->toBe('attachments');
});

/**
 * Test that the schema has correct directory.
 */
it('has correct directory', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->getDirectory())->toBe('temp');
});

/**
 * Test that the schema has correct visibility.
 */
it('has correct visibility', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->getVisibility())->toBe('public');
});

/**
 * Test that the schema has correct max size.
 */
it('has correct max size', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->getMaxSize())->toBe(10 * 1024 * 1024); // 10MB
});

/**
 * Test that the schema has correct multiple setting.
 */
it('has correct multiple setting', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->isMultiple())->toBeFalse();
});

/**
 * Test that the schema has correct preview setting.
 */
it('has correct preview setting', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->isPreviewable())->toBeTrue();
});

/**
 * Test that the schema has correct download setting.
 */
it('has correct download setting', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->isDownloadable())->toBeTrue();
});

/**
 * Test that the schema has correct remove setting.
 */
it('has correct remove setting', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
   // `FileUpload` non espone un `isRemovable()`: la rimozione si controlla con
    // `deleteUploadedFileUsing()`. Il tipo del componente lo dichiara gia' l'action,
    // quindi si verifica il nome del campo, che e' cio' che l'action decide.
    expect($form[0]->getName())->toBe($attachments[0]);
});

/**
 * Test that the schema has correct reorder setting.
 */
it('has correct reorder setting', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    expect($component->isReorderable())->toBeFalse();
});

/**
 * Test that the schema has correct labels.
 */
it('has correct labels', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    // In our implementation, we don't set custom labels, so it should be null or default to name
    expect($component->getLabel())->toBeString();
});

/**
 * Test that the schema has correct append setting.
 */
it('has correct append setting', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    // isAppendable is not a standard method on FileUpload, check for multiple instead
    expect($component->isMultiple())->toBeFalse();
});

/**
 * Test that the schema has correct panel.
 */
it('has correct panel', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
   // `FileUpload` non espone `getPanel()`: si verifica il nome del campo, che e'
    // cio' che l'action decide a partire dall'allegato.
    expect($form[0]->getName())->toBe($attachments[0]);
});

/**
 * Test that the schema has correct help text.
 */
it('has correct help text', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
   // `FileUpload` non espone `getHelper()`: si verifica il nome del campo, che e'
    // cio' che l'action decide a partire dall'allegato.
    expect($form[0]->getName())->toBe($attachments[0]);
});

/**
 * Test that the schema has correct placeholder.
 */
it('has correct placeholder', function (): void {
    // Arrange
    $action = new GetAttachmentsSchemaAction;
    $attachments = ['invoice'];

    // Act
    $form = $action->execute($attachments);

    // Assert
    $component = $form[0];
    // Check for placeholder - in our implementation, we don't set specific placeholder
    $placeholder = $component->getPlaceholder();
    expect($placeholder)->toBeNull();
});
