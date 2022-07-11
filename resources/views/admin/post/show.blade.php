@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $post->title }}</h1> <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post) }}"> EDIT </a>
    </div>
    <h5>Tags:</h5>
    @if ($post->tags)
        @foreach ($post->tags as $tag)
        <span class="badge badge-success">{{ $tag->name }}</span>
        @endforeach
    @endif
    <h4 class="mt-5">Corpo del post:</h4>
    <p>{{ $post->text }}</p>
    <a class="btn btn-secondary mt-3" href="{{ route('admin.posts.index') }}"> << INDIETRO </a>
</div>
@endsection
