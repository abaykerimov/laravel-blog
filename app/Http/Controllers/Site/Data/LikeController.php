<?php

namespace App\Http\Controllers\Site\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(LikeRequest $request)
    {
        $like = new Like();
        $like->user_ip = request()->ip();
        $like->likeable()->associate(Post::find($request->post_id));
        $like->save();
        return response()->json($like);
    }

    public function check(Post $post)
    {
        $likes = $post->likes()->where('user_ip', request()->ip())->first();
        return response()->json((bool)$likes);
    }
}
