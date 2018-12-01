<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 12.11.2018
 * Time: 20:59
 */

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function store(AuthRequest $request)
    {
        if (auth()->attempt(['username' => $request->username, 'password' => $request->password], (bool)$request->remember)) {
            return response()->json([
                'errors' => false,
                'location' => url()->route('admin.posts.index')
            ]);
        }

        return response()->json([
            'errors' => true
        ]);
    }
}