<?php

namespace App\Http\Controllers\Site\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Post $post)
    {
        return response()->json($post->comments);
    }

    public function store(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->user_name = $request->name;
        $comment->body = $request->body;
        $comment->commentable()->associate(Post::find($request->post_id));
        $comment->save();
        return response()->json([
            'title' => 'Комментарий успешно добавлен',
            'data'  => $comment
        ]);
    }
}
