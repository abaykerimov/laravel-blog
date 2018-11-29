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
        return response()->json();
    }

    public function store(CommentRequest $request)
    {

    }
}
