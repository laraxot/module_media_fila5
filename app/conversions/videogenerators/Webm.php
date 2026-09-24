<?php

declare(strict_types=1);

namespace Modules\Media\Conversions\VideoGenerators;

use Illuminate\Support\Collection;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Conversions\ImageGenerators\ImageGenerator;

class Webm extends ImageGenerator
{
    public function convert(string $file, ?Conversion $conversion = null): string
    {
        $pathToImageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.webmXXX';
<<<<<<< .merge_file_z6rs8O
=======
<<<<<<< .merge_file_nDHcUc
=======
<<<<<<< .merge_file_WX2DKp
=======
<<<<<<< .merge_file_MC8IFQ
>>>>>>> .merge_file_b7zzKU
        dddx([
            'file' => $file,
            '$pathToImageFile' => ${$pathToImageFile},
            'conversion' => $conversion,
        ]);
<<<<<<< .merge_file_z6rs8O
=======
=======
>>>>>>> .merge_file_1POwKB
>>>>>>> .merge_file_6rjT59
>>>>>>> .merge_file_rembkY
>>>>>>> .merge_file_b7zzKU

        /*
         * $image = imagecreatefromwebp($file);
         *
         * imagepng($image, $pathToImageFile, 9);
         *
         * imagedestroy($image);
         */
        return $pathToImageFile;
    }

    public function requirementsAreInstalled(): bool
    {
        /*
         * if (! function_exists('imagecreatefromwebp')) {
         * return false;
         * }
         *
         * if (! function_exists('imagepng')) {
         * return false;
         * }
         *
         * if (! function_exists('imagedestroy')) {
         * return false;
         * }
         */
        return true;
    }

    /**
     * @return Collection<int, string>
     */
    public function supportedExtensions(): Collection
    {
        return collect([
            // 'webm',
            // 'mov',
            'mp4',
        ]);
    }

    /**
     * @return Collection<int, string>
     */
    public function supportedMimeTypes(): Collection
    {
        return collect([
            // 'video/webm',
            'video/mpeg',
            'video/mp4',
            // 'video/quicktime'
        ]);
    }
}
