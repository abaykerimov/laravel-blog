<?php

namespace App\Http\Controllers\Site\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostRequest::all();
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
