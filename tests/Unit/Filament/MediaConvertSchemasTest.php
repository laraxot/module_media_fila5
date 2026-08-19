<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Filament;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Mockery;
use Mockery\MockInterface;
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

uses(TestCase::class);

/**
 * @return array<int, Action>
 */
function mediaConvertTableRecordActions(): array
{
    /** @var HasTable&MockInterface $livewire */
    $livewire = Mockery::mock(HasTable::class);
    $table = Table::make($livewire);

    /** @var array<int, Action> $actions */
    $actions = array_values((new MediaConvertsTable)->table($table)->getRecordActions());

    return $actions;
}

afterEach(function (): void {
    Mockery::close();
});

test('the form exposes one component per conversion parameter', function (): void {
    $schema = MediaConvertForm::getFormSchema();

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
    $schema = MediaConvertForm::getFormSchema();

    foreach (['format', 'codec_video', 'codec_audio', 'preset'] as $key) {
        Assert::assertInstanceOf(Radio::class, $schema[$key]);
    }

    foreach (['bitrate', 'width', 'height', 'threads', 'speed'] as $key) {
        Assert::assertInstanceOf(TextInput::class, $schema[$key]);
    }
});

test('the video codec offers both vp9 and vp8', function (): void {
    $codec = MediaConvertForm::getFormSchema()['codec_video'];
    Assert::assertInstanceOf(Radio::class, $codec);

    Assert::assertSame(
        ['libvpx-vp9' => 'libvpx-vp9', 'libvpx-vp8' => 'libvpx-vp8'],
        $codec->getOptions(),
    );
});

test('the table lists the identifier and both timestamps', function (): void {
    $columns = (new MediaConvertsTable)->getTableColumns();

    Assert::assertSame(['id', 'created_at', 'updated_at'], array_keys($columns));

    foreach ($columns as $key => $column) {
        Assert::assertInstanceOf(TextColumn::class, $column);
        Assert::assertSame($key, $column->getName());
    }
});

test('the table offers view, edit and convert row actions', function (): void {
    $actions = mediaConvertTableRecordActions();

    Assert::assertCount(3, $actions);
    Assert::assertInstanceOf(ViewAction::class, $actions[0]);
    Assert::assertInstanceOf(EditAction::class, $actions[1]);
    Assert::assertInstanceOf(Action::class, $actions[2]);
    Assert::assertSame('convert', $actions[2]->getName());
});

test('the table exposes bulk actions keyed by name', function (): void {
    $bulk = (new MediaConvertsTable)->getTableBulkActions();

    Assert::assertNotSame([], $bulk);
    foreach ($bulk as $key => $action) {
        Assert::assertIsString($key);
        Assert::assertSame($key, $action->getName());
    }
});
