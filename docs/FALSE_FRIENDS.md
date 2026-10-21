---
title: "FALSE FRIENDS"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "FALSE FRIENDS"
issues: []
discussions: []
<<<<<<< .merge_file_4QhAzc
=======
status: draft
>>>>>>> .merge_file_VVaVS6
---

```

### Error 2: Inline SVG Misuse
```blade
{{-- ❌ FALSE FRIEND - Invalid placement --}}
<div class="map-marker" style="background-image:url({{ asset('img/markers.svg') }})"></div>
```

### Error 2: Correct Approach
```blade
{{-- ✅ CORRECT - Standard approach --}}
@svg('map-marker.svg', ['class' => 'map-marker'])
```
---
title: "FALSE FRIENDS"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "FALSE FRIENDS"
issues: []
discussions: []
