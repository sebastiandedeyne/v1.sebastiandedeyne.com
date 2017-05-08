@foreach([
    ['@sebdedeyne', 'twitter', 'https://twitter.com/sebdedeyne'],
    ['@sebastiandedeyne', 'github', 'https://github.com/sebastiandedeyne'],
    ['sebastiandedeyne@gmail.com', 'email', 'mailto:sebastiandedeyne@gmail.com'],
] as [$name, $icon, $url])
    <a class="button -faded" href="{{ $url }}" target="sebdd">
        <span class="button__icon">
            <span class="icon -{{ $icon }} -small"></span>
        </span>
        {{ $name }}
    </a>
@endforeach
