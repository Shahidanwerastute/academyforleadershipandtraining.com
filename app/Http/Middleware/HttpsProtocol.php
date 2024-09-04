<?php
namespace App\Http\Middleware;
use Closure, Route;
class HttpsProtocol {
    public function handle($request, Closure $next)
    {
		if (!$request->secure()) {
			$currentPath = Route::getFacadeRoot()->current()->uri();
			return redirect()->secure($currentPath);
		}
		return $next($request); 
    }
}
?>