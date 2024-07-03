@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3> {{ $post->name }}</h3>
                            <h6 class="card-subtitle my-1 text-muted">
                                @if ($post->categories->count() > 0)
                                    Categorie:
                                    @foreach ($post->categories as $category)
                                        {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @else
                                    {{ ' Nessuna categoria' }}
                                @endif
                            </h6>
                        </div>
                        <div class="card-body post-content">{{ $post->description }}</div>
                        @if ($post->created_at == $post->updated_at)
                            <div class="card-body">Creato il: {{ $post->created_at->format('d/m/Y') }} alle
                                {{ $post->created_at->format('H:i:s') }}</div>
                        @else
                            <div class="card-body">Aggiornato il {{ $post->updated_at->format('d/m/Y') }} alle
                                {{ $post->updated_at->format('H:i:s') }} </div>
                        @endif
                        @if ($post->img)
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->name }}"
                                    class="img-fluid">
                            </div>
                        @endif
                        <a class="btn btn-primary w-50 m-2" href="{{ route('admin.posts.index') }}">torna alla lista</a>
                        <a class="btn btn-warning w-50 m-2" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
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

<style scoped lang="scss">
    .post-content {
        min-height: 100px;
        width: 80%;
        margin: 10px auto;
        box-shadow: 0px 5px 1px 2px rgb(0 0 0 / 15%);
        background-color: #f1efec91;
        border-radius: 10px;
        font-family: 'Times New Roman', Times, serif
    }
</style>
