<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Image;

use Illuminate\Support\Facades\File;
<<<<<<< HEAD
use Intervention\Image\Alignment;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager as InterventionImageManager;
use Intervention\Image\Interfaces\ImageInterface;
=======
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager as InterventionImageManager;
>>>>>>> 4e14511d (.)
use Spatie\QueueableAction\QueueableAction;

class Merge
{
    use QueueableAction;

    /**
     * Unisce due immagini in una sola.
     *
     * @param  string  $path1  Percorso assoluto della prima immagine
     * @param  string  $path2  Percorso assoluto della seconda immagine
     * @param  string  $outputPath  Percorso assoluto di salvataggio
     */
    public function handle(string $path1, string $path2, string $outputPath): bool
    {
<<<<<<< HEAD
        $manager = new InterventionImageManager(new GdDriver());

        $image1 = $manager->decodePath($path1);
        $image2 = $manager->decodePath($path2);

        $width = max($image1->width(), $image2->width());
        $height = $image1->height() + $image2->height();

        $canvas = $manager->createImage($width, $height);
        $canvas->insert($image1, 0, 0, Alignment::TOP_LEFT);
        $canvas->insert($image2, 0, $image1->height(), Alignment::TOP_LEFT);

        File::ensureDirectoryExists(dirname($outputPath));
        $canvas->save($outputPath);
=======
        // Intervention Image v3: il costruttore richiede un DriverInterface
        $manager = new InterventionImageManager(new GdDriver);

        // Carica le immagini
        $image1 = $manager->read($path1);
        $image2 = $manager->read($path2);

        // Inserisce image2 sopra image1 (centrato) - v3 usa place()
        $image1->place($image2, 'center');

        // Salva il risultato
        File::ensureDirectoryExists(dirname($outputPath));
        $image1->save($outputPath);
>>>>>>> 4e14511d (.)

        return File::exists($outputPath);
    }

    /**
     * Unisce array di immagini verticalmente.
     *
     * Questo metodo unisce tutte le immagini in $filenames verticalmente
     * in un'unica immagine, mantenendo la larghezza massima e sommando le altezze.
     *
<<<<<<< HEAD
     * @param  list<string>  $filenames  Array di percorsi relativi (es: 'chart/123-0.png')
=======
     * @param  array<int, string>  $filenames  Array di percorsi relativi (es: 'chart/123-0.png')
>>>>>>> 4e14511d (.)
     * @param  string  $outputFilename  Nome file output relativo (es: 'chart/123.png')
     * @return bool Successo operazione
     */
    public function execute(array $filenames, string $outputFilename): bool
    {
<<<<<<< HEAD
        if ($filenames === []) {
            return false;
        }

        if (count($filenames) === 1) {
            $sourcePath = public_path($filenames[0]);
            $outputPath = public_path($outputFilename);
            if (! File::exists($sourcePath)) {
=======
        if (empty($filenames)) {
            return false;
        }

        // Se c'è solo un'immagine, copiala
        if (count($filenames) === 1) {
            $sourcePath = public_path($filenames[0]);
            $outputPath = public_path($outputFilename);
            if (!File::exists($sourcePath)) {
>>>>>>> 4e14511d (.)
                return false;
            }
            File::ensureDirectoryExists(dirname($outputPath));
            File::copy($sourcePath, $outputPath);
<<<<<<< HEAD

            return File::exists($outputPath);
        }

=======
            return File::exists($outputPath);
        }

        // Converti percorsi relativi in assoluti
>>>>>>> 4e14511d (.)
        $absolutePaths = array_map(static function (string $filename): string {
            return public_path($filename);
        }, $filenames);

<<<<<<< HEAD
        foreach ($absolutePaths as $path) {
            if (! File::exists($path)) {
=======
        // Verifica che tutte le immagini esistano
        foreach ($absolutePaths as $path) {
            if (!File::exists($path)) {
>>>>>>> 4e14511d (.)
                logger()->error('Immagine non trovata per merge', ['path' => $path]);

                return false;
            }
        }

<<<<<<< HEAD
        $manager = new InterventionImageManager(new GdDriver());

        /** @var list<ImageInterface> $images */
=======
        // Intervention Image v3
        $manager = new InterventionImageManager(new GdDriver);

        // Carica tutte le immagini e calcola dimensioni totali
>>>>>>> 4e14511d (.)
        $images = [];
        $totalWidth = 0;
        $totalHeight = 0;

        foreach ($absolutePaths as $path) {
<<<<<<< HEAD
            $img = $manager->decodePath($path);
=======
            $img = $manager->read($path);
>>>>>>> 4e14511d (.)
            $images[] = $img;
            $totalWidth = max($totalWidth, $img->width());
            $totalHeight += $img->height();
        }

<<<<<<< HEAD
        $final = $manager->createImage($totalWidth, $totalHeight);

        $yOffset = 0;
        foreach ($images as $img) {
            $xOffset = (int) (($totalWidth - $img->width()) / 2);
            $final->insert($img, $xOffset, $yOffset, Alignment::TOP_LEFT);
            $yOffset += $img->height();
        }

=======
        // Crea canvas finale con dimensioni calcolate
        $final = $manager->create($totalWidth, $totalHeight);

        // Posiziona ogni immagine verticalmente, centrata orizzontalmente
        $yOffset = 0;
        foreach ($images as $img) {
            // Calcola offset X per centrare orizzontalmente
            $xOffset = (int) (($totalWidth - $img->width()) / 2);
            // Posiziona immagine
            $final->place($img, 'top-left', $xOffset, $yOffset);
            // Incrementa offset Y per prossima immagine
            $yOffset += $img->height();
        }

        // Salva risultato
>>>>>>> 4e14511d (.)
        $outputPath = public_path($outputFilename);
        File::ensureDirectoryExists(dirname($outputPath));
        $final->save($outputPath);

        return File::exists($outputPath);
    }
}
