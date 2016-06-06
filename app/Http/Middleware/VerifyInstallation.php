<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class VerifyInstallation
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// Get current uri
		$route = $request->route()->getName();
		// Verify if admin user exists
		$admin = User::where('type', 'admin')->first();
		if(!$admin && ($route != 'install' && $route != 'makeInstall')) {
			return redirect()->route('install');
		} elseif($admin && ($route == 'install' || $route == 'makeInstall')) {
			return redirect()->route('home');
		}

		return $next($request);
	}
}
