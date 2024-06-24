@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                {{ $post->name }}

                                <h6 class="card-subtitle my-1 text-muted">
                                    {{ $post->category ? $post->category->name : 'senza categoria' }}
                                </h6>

                            </div>
                            <div class="card-body">{{ $post->description }}</div>
                           
                         <a class="btn btn-primary w-50 m-2" href="{{ route('admin.posts.show', $post->id) }}">Dettagli</a>
                        

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
