<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('post_id')->get();
        return response()->json($posts);
    }

    public function store(Post $request)
    {

    }

    public function update()
    {

    }

    public function show(Post $post)
    {
        return view('site.posts.details');
    }
}
