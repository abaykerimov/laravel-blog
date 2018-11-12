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
    public function index()
    {
        return view('admin.auth.login');
    }
}