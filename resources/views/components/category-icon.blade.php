@props(['icon', 'label', 'href' => '#'])

<a class="gz-cat" href="{{ $href }}">
    <div class="gz-cat-circle">
        @switch($icon)
            @case('shorts')
                <x-icons.shorts />
                @break
            @case('cap')
                <x-icons.cap />
                @break
            @default
                <i class="ti {{ $icon }}"></i>
        @endswitch
    </div>
    <span>{{ $label }}</span>
</a>
