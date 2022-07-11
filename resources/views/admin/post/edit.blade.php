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
              {{-- qui copio quello che ho scritto in create ma ci vuole una condizione aggiuntiva --}}
              <div class="mb-3">
                @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}"
                @if (!$errors->any() && $post->tags->contains($tag->id))
                    checked
                @elseif($errors->any() && in_array($tag->id, old('tags',[])) )
                    checked
                @endif
                >
                <label class="mr-3" for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
                @endforeach
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection



