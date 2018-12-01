<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 12.11.2018
 * Time: 20:59
 */

namespace App\Http\Controllers\Admin\Views;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function forgot()
    {
        return view('admin.auth.passwords.email');
    }

    public function reset()
    {
        return view('admin.auth.passwords.reset');
    }
}