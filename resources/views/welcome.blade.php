@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light h-100 rounded-3">

        <div class="container py-5">
            <div class="logo-container">
                <img class=" post-logo"
                    src="https://elizawilliamson.com/wp-content/uploads/2020/03/Post_Danmark_Post_boxes_in_F%C3%A5borg_Denmark-scaled.jpg"
                    alt="post-img">
            </div>
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold">
                    Post-Maker 2024!
                </h1>
            </div>
            @guest
                <p class="col-md-8 fs-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum, non deleniti. Et
                    praesentium, beatae magnam asperiores amet commodi quo officiis totam labore earum dolorem quam molestias,
                    libero magni eos perferendis?Quos nulla placeat fugit eius aliquid aut adipisci voluptatem nihil, impedit
                    facere ea, consectetur quisquam sequi suscipit culpa aspernatur tempore reprehenderit distinctio, aperiam
                    cumque atque. Itaque sunt voluptatum quibusdam. Alias.
                </p>
            @else
                <div class="col-12 text-center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary ">Vai alla tua Dashboard</a>
                </div>
            @endguest
        </div>
    </div>
@endsection
<style scoped lang="scss">

</style>
