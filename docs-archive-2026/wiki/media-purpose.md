# Media — Scopo (Nota Second Brain 2026-10-06)

## Funzione
`Media` = gestione asset multimediali (upload, conversione, storage, embedding) nel modulo Fila5. Non è un modulo di correzione: è il dominio "media".

- Namespace: `Modules\Media\`
- Provider: `XotBaseServiceProvider`, `$name = 'Media'` richiesto.
- Logica in `Actions/`, dati in `Datas/`.
- Stato PHPStan: 1 errore rilevato (non corretto per istruzione): `ConvertController` estende `App\Http\Controllers\Controller` (classe sconosciuta) → `app/Http/Controllers/ConvertController.php`.

## Errore PHPStan (documentato, non corretto)
`class.notFound` su `ConvertController` — riferimento a controller root mancante; richiede allineamento provider/migrazione controller o rimozione riferimento.
