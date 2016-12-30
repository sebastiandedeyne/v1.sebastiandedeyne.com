@extends('_layouts.master')

@section('body_classes', 'bg:red')

@section('content')
<section class="v-error">
    <h1 class="v-error__title">
        Whoops!
    </h1>
    <p class="v-error__message">
        A wild {{ $status }} error appeared.
    </p>
    <a href="/" class="btn">
        Go home
    </a>
</section>
@endsection
