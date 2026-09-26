<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Filament;

<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR
=======
<<<<<<< .merge_file_aBslOO
=======
<<<<<<< .merge_file_hkUCD6
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======
>>>>>>> laraxot/dev
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR
=======
<<<<<<< .merge_file_aBslOO
=======
=======
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
>>>>>>> .merge_file_zng4Ut
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======
>>>>>>> laraxot/dev
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Modules\Media\Filament\Resources\MediaConvertResource\Schemas\MediaConvertForm;
use Modules\Media\Filament\Resources\MediaConvertResource\Tables\MediaConvertsTable;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

/*
 * Contratto dello schema Filament di MediaConvert: quali chiavi espone il form e
 * quali colonne/azioni la tabella. Nessuna query: i filtri della tabella
 * (`getTableFilters()`, che fa `MediaConvert::distinct()`) restano fuori di
 * proposito, sono l'unico punto che tocca il database.
 */

uses(TestCase::class)->group('no-media-db');

test('the form exposes one component per conversion parameter', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR
    $schema = (new MediaConvertForm())->getFormSchema();
=======
<<<<<<< .merge_file_aBslOO
    $schema = (new MediaConvertForm())->getFormSchema();
=======
<<<<<<< .merge_file_hkUCD6
    $schema = (new MediaConvertForm())->getFormSchema();
=======
    $schema = (new MediaConvertForm)->getFormSchema();
>>>>>>> .merge_file_zng4Ut
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======
    $schema = (new MediaConvertForm())->getFormSchema();
>>>>>>> laraxot/dev

    Assert::assertSame(
        ['format', 'codec_video', 'codec_audio', 'preset', 'bitrate', 'width', 'height', 'threads', 'speed'],
        array_keys($schema),
    );

    // le chiavi dell'array e i nomi dei componenti non devono divergere
    foreach ($schema as $key => $component) {
        Assert::assertInstanceOf(Field::class, $component);
        Assert::assertSame($key, $component->getName());
    }
});

test('codec and preset are radio choices, sizes are text inputs', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR
    $schema = (new MediaConvertForm())->getFormSchema();
=======
<<<<<<< .merge_file_aBslOO
    $schema = (new MediaConvertForm())->getFormSchema();
=======
<<<<<<< .merge_file_hkUCD6
    $schema = (new MediaConvertForm())->getFormSchema();
=======
    $schema = (new MediaConvertForm)->getFormSchema();
>>>>>>> .merge_file_zng4Ut
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======
    $schema = (new MediaConvertForm())->getFormSchema();
>>>>>>> laraxot/dev

    foreach (['format', 'codec_video', 'codec_audio', 'preset'] as $key) {
        Assert::assertInstanceOf(Radio::class, $schema[$key]);
    }

    foreach (['bitrate', 'width', 'height', 'threads', 'speed'] as $key) {
        Assert::assertInstanceOf(TextInput::class, $schema[$key]);
    }
});

test('the video codec offers both vp9 and vp8', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR
    $codec = (new MediaConvertForm())->getFormSchema()['codec_video'];
=======
<<<<<<< .merge_file_aBslOO
    $codec = (new MediaConvertForm())->getFormSchema()['codec_video'];
=======
<<<<<<< .merge_file_hkUCD6
    $codec = (new MediaConvertForm())->getFormSchema()['codec_video'];
=======
    $codec = (new MediaConvertForm)->getFormSchema()['codec_video'];
>>>>>>> .merge_file_zng4Ut
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======
    $codec = (new MediaConvertForm())->getFormSchema()['codec_video'];
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(Radio::class, $codec);

    Assert::assertSame(
        ['libvpx-vp9' => 'libvpx-vp9', 'libvpx-vp8' => 'libvpx-vp8'],
        $codec->getOptions(),
    );
});

test('the table lists the identifier and both timestamps', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR
    $columns = (new MediaConvertsTable())->getTableColumns();
=======
<<<<<<< .merge_file_aBslOO
    $columns = (new MediaConvertsTable())->getTableColumns();
=======
<<<<<<< .merge_file_hkUCD6
    $columns = (new MediaConvertsTable())->getTableColumns();
=======
    $columns = (new MediaConvertsTable)->getTableColumns();
>>>>>>> .merge_file_zng4Ut
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======
    $columns = (new MediaConvertsTable())->getTableColumns();
>>>>>>> laraxot/dev

    Assert::assertSame(['id', 'created_at', 'updated_at'], array_keys($columns));

    foreach ($columns as $key => $column) {
        Assert::assertInstanceOf(TextColumn::class, $column);
        Assert::assertSame($key, $column->getName());
    }
});

<<<<<<< HEAD
<<<<<<< .merge_file_vvEZnR

test('the table exposes bulk actions keyed by name', function (): void {
    $bulk = (new MediaConvertsTable())->getTableBulkActions();
=======
<<<<<<< .merge_file_aBslOO

test('the table exposes bulk actions keyed by name', function (): void {
    $bulk = (new MediaConvertsTable())->getTableBulkActions();
=======
<<<<<<< .merge_file_hkUCD6

test('the table exposes bulk actions keyed by name', function (): void {
    $bulk = (new MediaConvertsTable())->getTableBulkActions();
=======
test('the table exposes bulk actions keyed by name', function (): void {
    $bulk = (new MediaConvertsTable)->getTableBulkActions();
>>>>>>> .merge_file_zng4Ut
>>>>>>> .merge_file_rIt51B
>>>>>>> .merge_file_EfQOzv
=======

test('the table exposes bulk actions keyed by name', function (): void {
    $bulk = (new MediaConvertsTable())->getTableBulkActions();
>>>>>>> laraxot/dev

    Assert::assertNotSame([], $bulk);
    Assert::assertArrayHasKey('delete', $bulk);
    Assert::assertInstanceOf(DeleteBulkAction::class, $bulk['delete']);

    foreach ($bulk as $key => $action) {
        Assert::assertIsString($key);
        Assert::assertInstanceOf(BulkAction::class, $action);
        Assert::assertSame($key, $action->getName());
    }
});
