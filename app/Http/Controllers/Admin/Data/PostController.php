<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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
        $post->post_id = $request->post_id;
        $post->save();

        return response()->json($post);
    }

    public function update(Post $post)
    {
        $input = Input::get('params');
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->published = $input['published'];
        $post->save();

        return response()->json($post);
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function upload(Request $request)
    {
        dd($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $path  = '/images/admin/posts/';
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);

            return response()->json([
                'location' => $path . $name
            ]);
        }
        return false;
    }
}
