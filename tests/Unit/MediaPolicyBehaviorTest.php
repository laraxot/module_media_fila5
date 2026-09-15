<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit;

use Mockery;
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Models\Policies\MediaConvertPolicy;
use Modules\Media\Models\Policies\MediaPolicy;
use Modules\Media\Models\Policies\TemporaryUploadPolicy;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-media-db');

/**
 * @param  list<string>  $permissions
 * @param  list<string>  $roles
 * @return Mockery\MockInterface&UserContract
 */
function mediaBehaviorUser(array $permissions = [], array $roles = []): UserContract
{
    /** @var Mockery\MockInterface&UserContract $user */
    $user = Mockery::mock(UserContract::class);
    TestCase::mockExpectation($user, 'hasPermissionTo')
        ->andReturnUsing(static fn (string $permission): bool => in_array($permission, $permissions, true));
    TestCase::mockExpectation($user, 'hasRole')
        ->andReturnUsing(static function (array|string $richiesti) use ($roles): bool {
            /** @var list<string> $normalizzati */
            $normalizzati = is_array($richiesti) ? $richiesti : [$richiesti];

            return array_intersect($normalizzati, $roles) !== [];
        });

    return $user;
}

afterEach(function (): void {
    Mockery::close();
});

test('MediaBasePolicy before concede super-admin e passa oltre altrimenti', function (): void {
<<<<<<< HEAD
    $policy = new MediaPolicy;
=======
    $policy = new MediaPolicy();
>>>>>>> laraxot/dev
    $super = mediaBehaviorUser(roles: ['super-admin']);
    Assert::assertTrue($policy->before($super, 'viewAny'));

    $normal = mediaBehaviorUser(['media.viewAny']);
    Assert::assertNull($policy->before($normal, 'viewAny'));
    Assert::assertTrue($policy->viewAny($normal));
});

test('MediaPolicy deny/allow su permessi CRUD media', function (): void {
<<<<<<< HEAD
    $policy = new MediaPolicy;
    $media = new Media;
=======
    $policy = new MediaPolicy();
    $media = new Media();
>>>>>>> laraxot/dev
    $denied = mediaBehaviorUser();
    $allowed = mediaBehaviorUser([
        'media.viewAny', 'media.view', 'media.create', 'media.update',
        'media.delete', 'media.restore', 'media.forceDelete',
    ]);

    Assert::assertFalse($policy->viewAny($denied));
    Assert::assertFalse($policy->view($denied, $media));
    Assert::assertFalse($policy->create($denied));
    Assert::assertFalse($policy->update($denied, $media));
    Assert::assertFalse($policy->delete($denied, $media));
    Assert::assertFalse($policy->restore($denied, $media));
    Assert::assertFalse($policy->forceDelete($denied, $media));

    Assert::assertTrue($policy->viewAny($allowed));
    Assert::assertTrue($policy->view($allowed, $media));
    Assert::assertTrue($policy->create($allowed));
    Assert::assertTrue($policy->update($allowed, $media));
    Assert::assertTrue($policy->delete($allowed, $media));
    Assert::assertTrue($policy->restore($allowed, $media));
    Assert::assertTrue($policy->forceDelete($allowed, $media));
});

test('TemporaryUploadPolicy legato a permessi temporary_upload.*', function (): void {
<<<<<<< HEAD
    $policy = new TemporaryUploadPolicy;
    $upload = new TemporaryUpload;
=======
    $policy = new TemporaryUploadPolicy();
    $upload = new TemporaryUpload();
>>>>>>> laraxot/dev
    $allowed = mediaBehaviorUser(['temporary_upload.viewAny', 'temporary_upload.view', 'temporary_upload.create']);

    Assert::assertFalse($policy->viewAny(mediaBehaviorUser()));
    Assert::assertTrue($policy->viewAny($allowed));
    Assert::assertTrue($policy->view($allowed, $upload));
    Assert::assertTrue($policy->create($allowed));
});

test('MediaConvertPolicy legato a permessi media_convert.*', function (): void {
<<<<<<< HEAD
    $policy = new MediaConvertPolicy;
    $convert = new MediaConvert;
=======
    $policy = new MediaConvertPolicy();
    $convert = new MediaConvert();
>>>>>>> laraxot/dev
    $allowed = mediaBehaviorUser(['media_convert.viewAny', 'media_convert.update']);

    Assert::assertFalse($policy->viewAny(mediaBehaviorUser()));
    Assert::assertTrue($policy->viewAny($allowed));
    Assert::assertTrue($policy->update($allowed, $convert));
});
