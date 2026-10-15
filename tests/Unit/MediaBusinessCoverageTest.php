<?php

declare(strict_types=1);

namespace Tests\Modules\Media\Unit;

use Mockery;
use Tests\Modules\Media\TestCase;
use Tests\Modules\Xot\ModuleBusinessCoverage;

uses(TestCase::class)->group('no-media-db');

afterEach(function (): void {
    Mockery::close();
});

/**
 * @return array{string, string} radice `app/` del modulo e namespace corrispondente
 */
/** @return list{string, string} */
function mediaBusinessContext(): array
{
    return [dirname(__DIR__, 2).'/app', 'Modules\\Media\\'];
}

describe('Media business coverage', function (): void {
    test('all policies execute authorization methods', function (): void {
        [$appRoot, $ns] = mediaBusinessContext();
        ModuleBusinessCoverage::testAllPolicies($appRoot, $ns);
    });

    test('all models expose table and fillable', function (): void {
        [$appRoot, $ns] = mediaBusinessContext();
        ModuleBusinessCoverage::testAllModels($appRoot, $ns);
    });

    test('all actions are resolvable', function (): void {
        [$appRoot, $ns] = mediaBusinessContext();
        ModuleBusinessCoverage::testAllActions($appRoot, $ns);
    });

    test('all datas are loadable', function (): void {
        [$appRoot, $ns] = mediaBusinessContext();
        ModuleBusinessCoverage::testAllDatas($appRoot, $ns);
    });
});
