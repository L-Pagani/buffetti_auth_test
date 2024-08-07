<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();
        $personalPosts = Post::where('user_id', $user->id)->get();
        return view('admin.dashboard', compact('user', 'posts', 'personalPosts'));
    }
}
