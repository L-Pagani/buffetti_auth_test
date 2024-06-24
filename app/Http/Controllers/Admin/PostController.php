<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validati = $request->validated();
        $user = Auth::user();
        $newPost = new Post();
        $newPost->user_id = $user->id;
        $newPost->fill($validati);
        $newPost->save();

        // return redirect()->route("admin.posts.show", $newPost->id);
        return redirect()->route("admin.posts.index",);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $validati = $request->validated();
        $post->updated_at = now();
        $post->update($validati);
        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("admin.posts.index");
    }
}
