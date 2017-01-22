@extends('_layouts.master')

@section('content')
<section class="error">
    <h1 class="error__title">
        {{ $title }}
    </h1>
    <p class="error__message">
        {{ $message }}
    </p>
    <a href="{{ url('/') }}" class="button">
        Go home
    </a>
</section>
@endsection
