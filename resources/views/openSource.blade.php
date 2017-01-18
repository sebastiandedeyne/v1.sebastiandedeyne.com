@extends('_layouts.master')

@section('title', 'Open Source — Sebastian De Deyne')
@section('meta', '')

@section('content')
<div class="container">
    <div class="row">
        @foreach($projects as $project)
            <a href="{{ $project->url }}" class="card column column--half">
                <h2 class="card__title">{{ $project->name }}</h2>
                <p class="card__text">{{ $project->description }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection