@props(['icon', 'label', 'href' => '#'])

<a class="gz-cat" href="{{ $href }}">
    <div class="gz-cat-circle"><i class="ti {{ $icon }}"></i></div>
    <span>{{ $label }}</span>
</a>
