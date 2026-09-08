<?php

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 9b998103 (.)
use Modules\Media\Models\Media;

/**
 * Media Factory
 *
 * Factory for creating Media model instances for testing and seeding.
 *
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Media>
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
        /** @var string $fileName */
        $fileName = $this->faker->word();
        /** @var string $extension */
        $extension = $this->faker->randomElement(['jpg', 'png', 'pdf', 'doc']);

        return [
            'model_type' => 'App\\Models\\User',
            'model_id' => $this->faker->numberBetween(1, 100),
            'uuid' => $this->faker->uuid(),
            'collection_name' => $this->faker->randomElement(['default', 'avatars', 'documents']),
=======
        $extensions = ['jpg', 'png', 'pdf', 'doc'];
        $collections = ['default', 'avatars', 'documents'];

        /** @var lowercase-string&non-falsy-string $fileName */
        $fileName = 'file'.(string) random_int(1000, 9999);

        /** @var lowercase-string&non-falsy-string $extension */
        $extension = $extensions[array_rand($extensions)];

        /** @var string $collectionName */
        $collectionName = $collections[array_rand($collections)];

        return [
            'model_type' => 'Modules\\User\\Models\\User',
            'model_id' => (string) random_int(1, 100),
            'uuid' => (string) Str::uuid(),
            'collection_name' => $collectionName,
>>>>>>> 9b998103 (.)
            'name' => $fileName,
            'file_name' => $fileName.'.'.$extension,
            'mime_type' => $this->getMimeTypeFromExtension($extension),
            'disk' => 'public',
            'conversions_disk' => 'public',
<<<<<<< HEAD
            'size' => $this->faker->numberBetween(1024, 10485760), // 1KB to 10MB
=======
            'size' => random_int(1024, 10485760),
>>>>>>> 9b998103 (.)
            'manipulations' => [],
            'custom_properties' => [],
            'generated_conversions' => [],
            'responsive_images' => [],
<<<<<<< HEAD
            'order_column' => $this->faker->numberBetween(1, 100),
            'directory' => $this->faker->randomElement(['uploads', 'documents', 'images']),
            'path' => '/storage/'.$fileName.'.'.$extension,
            'width' => $this->faker->optional()->numberBetween(100, 1920),
            'height' => $this->faker->optional()->numberBetween(100, 1080),
            'type' => $extension,
            'ext' => $extension,
=======
            'order_column' => random_int(1, 100),
>>>>>>> 9b998103 (.)
        ];
    }

    /**
     * Create an image media.
     */
    public function image(): static
    {
<<<<<<< HEAD
        $extension = (string) $this->faker->randomElement(['jpg', 'png', 'gif']);
        $fileName = (string) $this->faker->word();
=======
        $extensions = ['jpg', 'png', 'gif'];
        $extension = $extensions[array_rand($extensions)];
        $fileName = 'file'.(string) random_int(1000, 9999);
>>>>>>> 9b998103 (.)

        return $this->state(fn (array $_attributes): array => [
            'mime_type' => $this->getMimeTypeFromExtension($extension),
            'file_name' => $fileName.'.'.$extension,
<<<<<<< HEAD
            'type' => $extension,
            'ext' => $extension,
            'width' => $this->faker->numberBetween(100, 1920),
            'height' => $this->faker->numberBetween(100, 1080),
=======
            'name' => $fileName,
>>>>>>> 9b998103 (.)
        ]);
    }

    /**
     * Create a document media.
     */
    public function document(): static
    {
<<<<<<< HEAD
        $extension = (string) $this->faker->randomElement(['pdf', 'doc', 'docx']);
        $fileName = (string) $this->faker->word();
=======
        $extensions = ['pdf', 'doc', 'docx'];
        $extension = $extensions[array_rand($extensions)];
        $fileName = 'file'.(string) random_int(1000, 9999);
>>>>>>> 9b998103 (.)

        return $this->state(fn (array $_attributes): array => [
            'mime_type' => $this->getMimeTypeFromExtension($extension),
            'file_name' => $fileName.'.'.$extension,
<<<<<<< HEAD
            'type' => $extension,
            'ext' => $extension,
            'width' => null,
            'height' => null,
=======
            'name' => $fileName,
>>>>>>> 9b998103 (.)
        ]);
    }

    /**
     * Get MIME type from file extension.
     */
    private function getMimeTypeFromExtension(string $extension): string
    {
        return match ($extension) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            default => 'application/octet-stream',
        };
    }
}
