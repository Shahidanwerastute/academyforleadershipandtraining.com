<?phpnamespace App\Http\Controllers;use Illuminate\Foundation\Bus\DispatchesJobs;use Illuminate\Routing\Controller as BaseController;use Illuminate\Foundation\Validation\ValidatesRequests;use Illuminate\Foundation\Auth\Access\AuthorizesRequests;use Carbon\Carbon, Route, DB, Request;class Controller extends BaseController{    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;    public function __construct()    {        $this->data['date'] = Carbon::now();        $this->data['route-paramters'] = Route::current()            ->parameters();    }		public function active(Request $request)	{		$record = DB::table(request()->table)->where('id', request()->id)		->update([			request()->field => request()->status		]);	}}