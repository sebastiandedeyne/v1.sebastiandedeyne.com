@extends('_layouts.master')

@section('content')
<section class="error">
    <h1 class="error__title">
        Whoops!
    </h1>
    <p class="error__message">
        A wild {{ $status }} error appeared.
    </p>
    <a href="{{ url('/') }}" class="button">
        Go home
    </a>
</section>
@endsection
