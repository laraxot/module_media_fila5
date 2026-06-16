<?php

declare(strict_types=1);
use Modules\Media\Models\BaseModel;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('TemporaryUpload Model', function (): void {
    it('extends BaseModel', function (): void {
        Assert::assertInstanceOf(BaseModel::class, new TemporaryUpload);
    });

    it('uses HasXotFactory trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

        Assert::assertTrue(in_array('Modules\Xot\Models\Traits\HasXotFactory', $traits, true));
    });

    it('uses InteractsWithMedia trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

        Assert::assertTrue(in_array('Spatie\MediaLibrary\InteractsWithMedia', $traits, true));
    });

    it('uses MassPrunable trait', function (): void {
        $traits = class_uses_recursive(TemporaryUpload::class);

        Assert::assertTrue(in_array('Illuminate\Database\Eloquent\MassPrunable', $traits, true));
    });

    it('has media connection', function (): void {
        Assert::assertSame('media', (new TemporaryUpload)->getConnectionName());
    });

    it('has empty guarded array', function (): void {
        Assert::assertSame([], (new TemporaryUpload)->getGuarded());
    });

    it('exposes expected static and instance methods', function (): void {
        $methods = get_class_methods(TemporaryUpload::class);

        Assert::assertContains('findByMediaUuid', $methods);
        Assert::assertContains('findByMediaUuidInCurrentSession', $methods);
        Assert::assertContains('createForFile', $methods);
        Assert::assertContains('createForRemoteFile', $methods);
        Assert::assertContains('registerMediaConversions', $methods);
        Assert::assertContains('moveMedia', $methods);
    });

    it('has static disk property', function (): void {
        $reflection = new ReflectionClass(TemporaryUpload::class);

        Assert::assertTrue($reflection->hasProperty('disk'));
    });

    it('has static manipulatePreview property', function (): void {
        $reflection = new ReflectionClass(TemporaryUpload::class);

        Assert::assertTrue($reflection->hasProperty('manipulatePreview'));
    });
});
