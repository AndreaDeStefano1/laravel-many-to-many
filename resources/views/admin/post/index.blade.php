@extends('layouts.app')


@section('content')

    <div class="container">
        @if(session('confirm'))
        <div class="alert alert-success" role="alert">
            {{ session('confirm') }} <strong>{{ session('titolo') }}</strong>
        </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Opzioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">MOSTRA</a>
                            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
                            <form onsubmit="return confirm('Sei sicuro di voler eliminare {{ $post->title }}')" class="d-inline" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
