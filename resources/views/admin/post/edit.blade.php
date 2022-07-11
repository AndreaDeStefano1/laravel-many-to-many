@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <h1 class="text-center my-5">Update Post</h1>
        <form action ="{{ route('admin.posts.update', $post) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo Post</label>

                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"  value='{{ old('title', $post->title) }}' >
                  @error('title')
                   <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="text" class="form-label">Testo del Post</label>
                <input type="text" class="form-control @error('text') is-invalid @enderror" name="text" id="text"  value='{{ old('text', $post->text) }}'>
                  @error('text')
                   <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection



