@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1> <a class="btn btn-primary  " href=""> EDIT DA COLLEGARE </a>
    <p>{{ $post->text }}</p>
    <a class="btn btn-secondary mt-5" href="{{ route('admin.posts.index') }}"> << INDIETRO </a>
</div>
@endsection
