@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="card-body">
                        <p>User-name: {{ $user->name }}</p>
                        <p>User-email: {{ $user->email }}</p>
                        <p>Number of posts: {{ $posts->count() }}</p>
                        <p>Your posts: {{ $personalPosts->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
