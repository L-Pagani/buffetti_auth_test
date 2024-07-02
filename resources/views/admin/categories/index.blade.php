@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="text-center my-2">Lista categorie</h1>
            <div class="col-md-3 my-5">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold fs-5">{{ $category->name }}</span>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-5 mx-3">X</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
