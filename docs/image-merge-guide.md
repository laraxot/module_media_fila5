# Media - Guida Merge Immagini

**Data Creazione**: 2025-01-18  
**Status**: Documentazione Completa  
**Versione**: 1.0.0

## 📋 Panoramica

Il modulo Media fornisce l'action `Merge` per unire immagini multiple in un'unica immagine. Questa guida documenta l'uso completo per unire grafici JpGraph verticalmente.

---

## 🎯 Architettura Merge

### Classe Merge

**File**: `Modules/Media/app/Actions/Image/Merge.php`

```php
namespace Modules\Media\Actions\Image;

use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager as InterventionImageManager;

class Merge
{
    /**
     * Unisce due immagini in una sola.
     * 
     * NOTA: Questo metodo unisce solo 2 immagini.
     * Per unire più immagini, usa execute() che itera su array.
     * 
     * @param  string  $path1  Percorso assoluto prima immagine
     * @param  string  $path2  Percorso assoluto seconda immagine
     * @param  string  $outputPath  Percorso assoluto output
     * @return bool Successo operazione
     */
    public function handle(string $path1, string $path2, string $outputPath): bool
    {
        // Intervention Image v3: richiede DriverInterface
        $manager = new InterventionImageManager(new GdDriver);

        // Carica le immagini
        $image1 = $manager->read($path1);
        $image2 = $manager->read($path2);

        // Inserisce image2 sopra image1 (centrato)
        // place() posiziona image2 su image1 mantenendo dimensioni image1
        $image1->place($image2, 'center');

        // Salva il risultato
        $image1->save($outputPath);

        return true;
    }
    
    /**
     * Unisce array di immagini verticalmente.
     * 
     * Questo metodo itera su $filenames e unisce tutte le immagini
     * verticalmente in un'unica immagine.
     * 
     * @param  array<int, string>  $filenames  Array di percorsi relativi (es: 'chart/123-0.png')
     * @param  string  $outputFilename  Nome file output relativo (es: 'chart/123.png')
     * @return bool Successo operazione
     */
    public function execute(array $filenames, string $outputFilename): bool
    {
        if (empty($filenames)) {
            return false;
        }
        
        // Se c'è solo un'immagine, copiala
        if (count($filenames) === 1) {
            $sourcePath = public_path($filenames[0]);
            $outputPath = public_path($outputFilename);
            File::ensureDirectoryExists(dirname($outputPath));
            File::copy($sourcePath, $outputPath);
            return true;
        }
        
        // Converti percorsi relativi in assoluti
        $absolutePaths = array_map(function($filename) {
            return public_path($filename);
        }, $filenames);
        
        // Verifica che tutte le immagini esistano
        foreach ($absolutePaths as $path) {
            if (!File::exists($path)) {
                logger()->error('Immagine non trovata per merge', ['path' => $path]);
                return false;
            }
        }
        
        // Unisci progressivamente: prima con seconda, risultato con terza, ecc.
        $manager = new InterventionImageManager(new GdDriver);
        $result = $manager->read($absolutePaths[0]);
        
        // Calcola dimensioni totali (larghezza max, altezza somma)
        $totalWidth = 0;
        $totalHeight = 0;
        $images = [];
        
        foreach ($absolutePaths as $path) {
            $img = $manager->read($path);
            $images[] = $img;
            $totalWidth = max($totalWidth, $img->width());
            $totalHeight += $img->height();
        }
        
        // Crea canvas finale
        $final = $manager->create($totalWidth, $totalHeight);
        
        // Posiziona ogni immagine verticalmente
        $yOffset = 0;
        foreach ($images as $img) {
            // Centra orizzontalmente
            $xOffset = ($totalWidth - $img->width()) / 2;
            $final->place($img, 'top-left', $xOffset, $yOffset);
            $yOffset += $img->height();
        }
        
        // Salva risultato
        $outputPath = public_path($outputFilename);
        File::ensureDirectoryExists(dirname($outputPath));
        $final->save($outputPath);
        
        return File::exists($outputPath);
    }
}
```

---

## 📊 Parte 1: Uso Base

### 1.1 Unire Due Immagini

```php
use Modules\Media\Actions\Image\Merge;

$merge = app(Merge::class);

// Percorsi assoluti
$path1 = public_path('chart/123-0.png');
$path2 = public_path('chart/123-1.png');
$output = public_path('chart/123.png');

$success = $merge->handle($path1, $path2, $output);
```

### 1.2 Unire Array di Immagini

```php
use Modules\Media\Actions\Image\Merge;

$merge = app(Merge::class);

// Percorsi relativi (da public/)
$filenames = [
    'chart/123-0.png',
    'chart/123-1.png',
    'chart/123-2.png',
];
$output = 'chart/123.png';

$success = $merge->execute($filenames, $output);
```

---

## 🔧 Parte 2: Integrazione con Grafici

### 2.1 Workflow Completo

```php
// 1. Genera grafici multipli
$filenames = [];
foreach ($datas as $k => $data) {
    $graph = app($actionClass)->execute($answersData);
    $filename = 'chart/'.$questionChart->id.'-'.$k.'.png';
    $file_path = public_path($filename);
    $graph->Stroke($file_path);
    $filenames[] = $filename;
}

// 2. Unisci tutti i grafici
if (count($filenames) > 1) {
    $fileName = 'chart/'.$questionChart->id.'.png';
    app(Merge::class)->execute($filenames, $fileName);
} else {
    $fileName = $filenames[0];
}

// 3. Salva percorso
$questionChart->img_src = $fileName;
$questionChart->save();
```

---

## ⚠️ Parte 3: Limitazioni e Best Practices

### 3.1 Limitazioni

1. **Memory**: Unire molte immagini grandi può consumare molta memoria
2. **Dimensioni**: Le immagini vengono unite mantenendo la larghezza massima
3. **Formato**: Supporta solo formati supportati da Intervention Image (PNG, JPEG, GIF)

### 3.2 Best Practices

1. **Verifica Esistenza**: Sempre verificare che le immagini esistano prima del merge
2. **Cleanup**: Eliminare immagini temporanee dopo il merge
3. **Error Handling**: Gestire eccezioni durante il merge
4. **Logging**: Loggare errori per debug

```php
// Esempio completo con error handling
try {
    $merge = app(Merge::class);
    
    // Verifica immagini
    foreach ($filenames as $filename) {
        $path = public_path($filename);
        if (!File::exists($path)) {
            throw new Exception("Immagine non trovata: {$filename}");
        }
    }
    
    // Esegui merge
    $success = $merge->execute($filenames, $outputFilename);
    
    if (!$success) {
        throw new Exception("Merge fallito");
    }
    
    // Cleanup immagini temporanee (opzionale)
    foreach ($filenames as $filename) {
        if ($filename !== $outputFilename) {
            File::delete(public_path($filename));
        }
    }
    
} catch (\Throwable $e) {
    logger()->error('Errore merge immagini', [
        'exception' => $e->getMessage(),
        'filenames' => $filenames,
        'output' => $outputFilename,
    ]);
    throw $e;
}
```

---

## 📚 Riferimenti

- [Intervention Image Documentation](https://image.intervention.io/)
- [Chart PDF Integration Guide](../Chart/docs/pdf-integration-complete-guide.md)
- [Quaeris PDF Generation Guide](../Quaeris/docs/pdf-generation-guide.md)

---

**Filosofia**: Il Merge action segue il principio DRY - un'unica implementazione riutilizzabile per unire immagini in contesti diversi (grafici, gallerie, report).

