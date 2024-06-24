@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Modifica post
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Titolo</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrizione</label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $post->description }}</textarea>
                                </div>
                              
                                <button type="submit" class="btn btn-primary">Salva</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection