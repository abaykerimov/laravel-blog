<?php

namespace App\Http\Controllers\Site\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(PostRequest $request)
    {
        
    }

    public function update()
    {

    }

    public function show(PostRequest $post)
    {
        return view('site.posts.details');
    }
}
