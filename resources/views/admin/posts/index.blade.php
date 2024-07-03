@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <h2 class="text-center"> {{ $post->name }}</h2>
                            </div>
                            <div class="card-body post-content">
                                {{ $post->updated_at }}
                                <a class="btn btn-primary w-50 m-2" href="{{ route('admin.posts.show', $post->id) }}">Apri</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
