<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $parents = Post::whereNull('post_id')->get();

        $data = [];
        $parents->each(function ($parent) {
            $children = $parent->children;
            $data[] = [
                'parent' => $parent,
            ];
        });
        return response()->json($parents);
    }

    public function store(PostRequest $request)
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
