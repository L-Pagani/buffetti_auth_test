
@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ $post->name }}
                            <h6 class="card-subtitle my-1 text-muted">
                                {{ $post->category ? $post->category->name : 'senza categoria' }}
                            </h6>
                        </div>
                        <div class="card-body">{{ $post->description }}</div>
                        <div class="card-body">{{ $post->user->name }}</div>
                        <div class="card-body">{{ $post->created_at->format('d/m/Y/ H:i:s') }}</div>
                        <a class="btn btn-primary w-50 m-2" href="{{route('admin.posts.index')}}">torna alla lista</a>
                        
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-50 m-2">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection