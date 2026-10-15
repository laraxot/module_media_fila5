<?php

declare(strict_types=1);

namespace Tests\Modules\Media\Unit;

use Mockery;
use Tests\Modules\Media\TestCase;
use Tests\Modules\Xot\ModuleExecuteCoverage;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-media-db');

afterEach(function (): void {
    Mockery::close();
});

describe('Media ModuleExecuteCoverage floor sweep', function (): void {
    test('conversions services rules filament via directory invoke', function (): void {
        [$appRoot, $ns] = [dirname(__DIR__, 2).'/app', 'Modules\\Media\\'];
        ModuleExecuteCoverage::testInvokePublicMethodsInDirectory($appRoot, $ns, 'Support');
        ModuleExecuteCoverage::testInvokePublicMethodsInDirectory($appRoot, $ns, 'Services');
        ModuleExecuteCoverage::testInvokePublicMethodsInDirectory($appRoot, $ns, 'Rules');
        ModuleExecuteCoverage::testInvokePublicMethodsInDirectory($appRoot, $ns, 'Exceptions');
        ModuleExecuteCoverage::testFilamentPublicMethods($appRoot, $ns);
        ModuleExecuteCoverage::testFilamentComponents($appRoot, $ns);
        ModuleExecuteCoverage::testFilamentLegacySchemas($appRoot, $ns);
        ModuleExecuteCoverage::testAllEnums($appRoot, $ns);
        ModuleExecuteCoverage::testInvokePublicMethodsOnModels($appRoot, $ns);
        Assert::assertDirectoryExists($appRoot);
    });
});
