<?php

namespace App\Http\Controllers\Site\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('post_id')->where('published', true)->get();
        return response()->json($posts);
    }

    public function store(PostRequest $request)
    {
        
    }

    public function update()
    {

    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function search()
    {

    }
}
