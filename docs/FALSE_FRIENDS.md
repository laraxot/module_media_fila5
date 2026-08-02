<<<<<<< .merge_file_raahZ0
=======
# False Friends – Media Module

| Concept | Misconception | Correction |
|---------|---------------|------------|
| **SVG Location** | `resources/img/markers/` is acceptable | Must be `resources/svg/` only - CDN references forbidden |
| **Asset Versioning** | Hardcoded CDN URLs like `unpkg.com` are okay | Must use internal versioned assets from `resources/svg/` |
| **Inline SVG** | Inline SVG in Blade is required for customization | Must use Blade `@svg()` helper or Vite raw imports |
| **SVG Size** | Width/height only matter visually | Must define maintainable `viewBox` and explicit `width`/`height` |
| **Icon Templates** | `L.Icon.Default` works for all cases | Must use custom SVG icons following `map-marker-custom-asset.md` |

## Examples of Errors

### Error 1: Improper Asset Path
```javascript
// ❌ FALSE FRIEND - CDN dependency
const iconUrl = 'https://unpkg.com/leaflet@1.9.4/dist/marker-icon.png';
>>>>>>> .merge_file_QSaXzc
```
