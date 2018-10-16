<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
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
