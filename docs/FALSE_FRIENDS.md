```
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev

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
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
