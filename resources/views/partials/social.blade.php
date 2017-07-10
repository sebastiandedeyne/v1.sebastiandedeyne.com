@foreach([
    ['sebdedeyne', 'twitter', 'Twitter', 'https://twitter.com/sebdedeyne'],
    ['sebastiandedeyne', 'github', 'GitHub', 'https://github.com/sebastiandedeyne'],
    ['sebastiandedeyne@gmail.com', 'email', 'E-mail', 'mailto:sebastiandedeyne@gmail.com'],
] as [$name, $icon, $title, $url])
    <a class="button -faded" href="{{ $url }}" target="sebdd">
        <span class="button__icon">
            <span class="icon" title="{{ $title }}">
                {{ svg($icon) }}
            </span>
        </span>
        {{ $name }}
    </a>
@endforeach
