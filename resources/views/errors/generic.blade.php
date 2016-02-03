@extends('layouts.master')

@section('body_classes', 'error404')

@section('content')
<section class="v-404">
    <h1>Whoops!</h1>
    <p class="mb:1">A wild 404 error appeared.</p>
    <a href="/" title="Home"><i class="fa fa-long-arrow-left"></i></a>
</section>
@endsection
