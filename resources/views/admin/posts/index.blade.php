@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card">
                            <div class="card-header">{{ $post->name }}</div>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $post->category ? $post->category->name : 'senza categoria' }}
                            </h6>
                            <div class="card-body">{{ $post->description }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
