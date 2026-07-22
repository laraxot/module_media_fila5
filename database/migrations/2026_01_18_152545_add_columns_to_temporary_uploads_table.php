<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void
        {
            if (! $this->hasColumn('user_id')) {
                $table->uuid('user_id')->nullable();
            }
            if (! $this->hasColumn('file_name')) {
                $table->string('file_name')->nullable();
            }
            if (! $this->hasColumn('file_size')) {
                $table->integer('file_size')->nullable();
            }
            if (! $this->hasColumn('mime_type')) {
                $table->string('mime_type')->nullable();
            }
            if (! $this->hasColumn('status')) {
                $table->string('status')->default('uploading');
            }
        });
    }
};