@extends('_layouts.master')

@section('body_classes', 'bg:red')

@section('content')
<section class="error">
    <h1 class="error__title">
        Whoops!
    </h1>
    <p class="error__message">
        A wild {{ $status }} error appeared.
    </p>
    <a href="/" class="btn">
        Go home
    </a>
</section>
@endsection
