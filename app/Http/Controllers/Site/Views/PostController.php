<?php

namespace App\Http\Controllers\Site\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('site.posts.list');
    }

    public function store(PostRequest $request)
    {
        
    }

    public function update()
    {

    }

    public function show(Post $post)
    {
        return view('site.posts.details', [
            'post' => $post
        ]);
    }
}
