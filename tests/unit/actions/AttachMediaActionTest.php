<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Unit\Actions;

<<<<<<< HEAD
uses(\Modules\Media\Tests\TestCase::class);

use Modules\Media\Actions\AttachMediaAction;
use Spatie\QueueableAction\QueueableAction;

=======
use Modules\Media\Actions\AttachMediaAction;
use Modules\Media\Tests\TestCase;
use Spatie\QueueableAction\QueueableAction;

uses(TestCase::class);

>>>>>>> laraxot/dev
describe('AttachMediaAction', function () {
    it('uses QueueableAction trait', function (): void {
        // Arrange
        $action = new AttachMediaAction;

        expect(class_uses_recursive($action))->toContain(QueueableAction::class);
    });

});
