<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function index()
    {
        $parents = Post::whereNull('post_id')->with('children')->get();
        return response()->json($parents);
    }

    public function store(PostRequest $request)
    {

    }

    public function update(Post $post)
    {
        dd(Input::get('post'));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }
}
