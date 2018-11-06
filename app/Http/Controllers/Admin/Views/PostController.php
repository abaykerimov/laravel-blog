<?php

namespace App\Http\Controllers\Admin\Views;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.list');
    }

    public function show(Post $post)
    {
        return view('admin.posts.details', [
            'post' => $post
        ]);
    }
}
