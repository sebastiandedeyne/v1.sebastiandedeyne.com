@extends('layouts.master')

@section('body_classes', 'bg:red')

@section('content')
<section class="col:white ta:c mt:3 mb:1">
    <h1 class="fs:27 fw:bold lh:100 mb:1/2">
        Whoops!
    </h1>
    <p class="mb:1">
        A wild {{ $status }} error appeared.
    </p>
    <a href="/" title="Home" class="btn fs:20">
        <i class="fa fa-long-arrow-left"></i>
    </a>
</section>
@endsection
