@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <h1 class="text-center my-5">ADD POST</h1>
        <form action ="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Titolo post</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"  value='{{ old('title') }}' >
                @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Corpo del post</label>
              <input type="text" class="form-control @error('text') is-invalid @enderror" name="text" id="text"  value='{{ old('text') }}'>
                @error('text')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}" @if (in_array($tag->id, old('tags',[]))) checked @endif>
                <label class="mr-3" for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
                @endforeach
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
