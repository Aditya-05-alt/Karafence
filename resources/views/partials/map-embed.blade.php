@php
    $mapSrc = 'https://maps.google.com/maps?q=' . urlencode($query ?? '') . '&z=15&output=embed';
@endphp
<iframe
    allowfullscreen
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"
    title="{{ $title ?? 'Location map' }}"
    src="{{ $mapSrc }}"
    class="{{ $class ?? 'w-full h-full border-0' }}"
    style="border:0"
></iframe>
