<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Media\Models\TemporaryUpload;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Owner migration TemporaryUpload.
 *
 * tableCreate da storico 2023_01_01_000000; tableUpdate idempotente per DB già migrati.
 *
 * @see bashscripts/docs/prompts/09-migrations-forward-only.md
 */
return new class extends XotBaseMigration
{
    protected ?string $model_class = TemporaryUpload::class;

    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->string('session_id');
            $table->uuid('user_id')->nullable();
            $table->string('file_name');
            $table->integer('file_size')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('status')->default('uploading');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
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

            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
        });
    }
};
