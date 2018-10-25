<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Route;

class AuthenticateIsAdmin {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (auth()->check() and (!auth()->user()->isAdmin()))
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
                if (!auth()->user()->isAdmin()) {
                    return redirect()->route('home');
                }
				return redirect()->route('admin.posts.list');
			}
		}

        return $next($request);
	}

}
