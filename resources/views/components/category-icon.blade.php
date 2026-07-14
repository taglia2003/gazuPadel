@props(['icon', 'label', 'href' => '#'])

<a class="gz-cat" href="{{ $href }}">
    <div class="gz-cat-circle"><x-dynamic-component :component="'icons.' . $icon" /></div>
    <span>{{ $label }}</span>
</a>
