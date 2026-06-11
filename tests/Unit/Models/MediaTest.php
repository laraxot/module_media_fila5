<?php

declare(strict_types=1);

use Modules\Media\Models\Media;
use Modules\Media\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('media model can be instantiated', function (): void {
    $media = new Media;

    Assert::assertInstanceOf(Media::class, $media);
});

test('media model exposes expected helper relations and methods', function (): void {
    $media = new Media;

    $methods = get_class_methods($media);
    Assert::assertContains('mediaConverts', $methods);
    Assert::assertContains('temporaryUpload', $methods);
    Assert::assertContains('creator', $methods);
});

test('media model casts expected json attributes', function (): void {
    $media = new Media;

    $casts = $media->getCasts();

    Assert::assertArrayHasKey('manipulations', $casts);
    Assert::assertArrayHasKey('custom_properties', $casts);
    Assert::assertArrayHasKey('generated_conversions', $casts);
    Assert::assertArrayHasKey('responsive_images', $casts);
});
