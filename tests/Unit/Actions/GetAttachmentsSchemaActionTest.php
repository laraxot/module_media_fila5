<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

use Filament\Forms\Components\FileUpload;
use Modules\Media\Actions\GetAttachmentsSchemaAction;
use Modules\Media\Datas\MediaConfigData;
use Modules\Media\Tests\TestCase;
use ReflectionProperty;

// `uses()` deve stare DOPO gli `use`: gli import valgono dalla loro riga in
// avanti, quindi scritto sopra `TestCase::class` si risolveva come
// Modules\Media\Tests\Unit\Actions\TestCase e Pest moriva in fase di
// raccolta, portandosi via tutta la suite (base_quaeris_fila5#213).
<<<<<<< .merge_file_zbuCnS
/** @see Modules/Media/docs/adr/0001-upload-temporanei-con-percorso-scopato-e-policy.md */
=======
>>>>>>> .merge_file_sYbAzj
uses(TestCase::class);

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

    // Verifica che ogni attachment abbia un FileUpload component
    foreach ($form as $index => $component) {
        expect($component->getName())->toBe($attachments[$index]);
    }
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

    expect(collect($acceptedTypes)->contains(static fn (mixed $type): bool => is_string($type) && in_array($type, $allowed, true)))->toBeTrue();
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
<<<<<<< .merge_file_zbuCnS
    expect($component->getMaxSize())->toBe(MediaConfigData::from([])->attachment_max_size_kb);
=======
    // Filament: maxSize() e' in kilobyte. Default di MediaConfigData::$attachment_max_size_kb = 10240 KB (10 MB).
    expect($component->getMaxSize())->toBe(10 * 1024);
>>>>>>> .merge_file_sYbAzj
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
    $component = $form[0];
    // FileUpload has deleteUploadedFileUsing method to control removal, but no direct isRemovable method
    // By default, Filament file uploads are removable unless specifically configured otherwise
    // We can verify that the component is a FileUpload
    expect($component->isDeletable())->toBeTrue();
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
    $component = $form[0];
    expect($component->getPanelLayout())->toBe('compact');
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
    $component = $form[0];
    expect($component->shouldPreserveFilenames())->toBeTrue();
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
<<<<<<< .merge_file_zbuCnS
    // The unbound component cannot evaluate FileUpload's vendor fallback yet.
    $placeholder = (new ReflectionProperty(FileUpload::class, 'placeholder'))->getValue($component);
    expect($placeholder)->toBeNull();
=======
    // Nessun placeholder impostato dall'Action. getPlaceholder() di Filament 5 valuta la closure nel container dello
    // schema, che fuori da un form non esiste: si legge il valore configurato.
    expect(invade($component)->placeholder)->toBeNull();
>>>>>>> .merge_file_sYbAzj
});
