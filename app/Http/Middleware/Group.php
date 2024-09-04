<?php
namespace App\Http\Middleware;
use Closure, Route, Auth;
use App\Group as GroupModel;
use Spatie\Permission\Models\Role;
class Group
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if (!$request->session()->has('group_id') && Auth::user()->hasRole('administrator') && !$request->ajax()) {
			$group = GroupModel::all();
			if($group->count() > 0) {
				$request->session()->put('group_id', $group[0]->id);
				return redirect(route('admin-dashboard'));
			} elseif (!Route::is('admin-group')) {
				return redirect(route('admin-group'));
			}
		} else if(!$request->session()->has('group_id') && !Auth::user()->hasRole('administrator') && !$request->ajax()) {
			$request->session()->put('group_id', Auth::user()->group_id);
			return redirect(route('admin-dashboard'));
		}
        return $next($request);
    }
}
