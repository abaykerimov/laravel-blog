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
        $post = new Post();
        $post->title = $request->title;
        $post->save();

        return response()->json($post);
    }

    public function update(Post $post)
    {
        dd(Input::get('params'));
        $input = Input::get('params');
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->save();

        return response()->json($post);
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }
}
