<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all()->where('user_id', auth()->id());
        $categories = Category::all();

        return view("admin.posts.index", compact("posts", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validati = $request->validated();
        $user = Auth::user();
        $newPost = new Post();
        if ($request->img) {
            $img_path = Storage::disk("public")->put('/uploads', $request['img']);
            $validati["img"] = $img_path;
        }
        $newPost->user_id = $user->id;
        $newPost->fill($validati);
        $newPost->save();
        if ($newPost->categories) {
            $newPost->categories()->attach($request->categories);
        }

        // return redirect()->route("admin.posts.show", $newPost->id);
        return redirect()->route("admin.posts.index",);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (Auth::user()->cannot('view', $post)) {
            abort(403, "Non hai i permessi per visualizzare questo post");
        }
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (Auth::user()->cannot('update', $post)) {
            abort(403, "Non hai i permessi per modificare questo post");
        }
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403, "Non hai i permessi per modificare questo post");
        }
        $validati = $request->validated();
        $post->updated_at = now();
        if ($request->img) {
            $img_path = Storage::disk("public")->put('/uploads', $request['img']);
            $validati["img"] = $img_path;
        } else {
            $validati["img"] = null;
        }
        $post->update($validati);
        return redirect()->route("admin.posts.show", $post->id);
        if ($post->categories) {
            $post->categories()->sync($request->categories->id);
        }
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
