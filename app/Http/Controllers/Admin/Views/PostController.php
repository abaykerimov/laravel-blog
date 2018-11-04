<?php

namespace App\Http\Controllers\Admin\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.list');
    }

    public function show()
    {
        return view('admin.posts.details');
    }
}
