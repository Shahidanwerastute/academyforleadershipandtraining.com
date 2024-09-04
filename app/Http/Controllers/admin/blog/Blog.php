<?phpnamespace App\Http\Controllers\admin\blog;use Illuminate\Http\Request;use App\Http\Controllers\admin\Controller;use App\Blog as BlogModel;use App\Role;use App\Category;use App\Survey;use App\Review;use App\Mail\Email;use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;class Blog extends Controller{    public function __construct()    {        parent::__construct();    }    public function index(Request $request)    {        return View::make('admin.blog.index')->with('data', $this->data);    }    public function listing(Request $request)    {        if ($request->isMethod('post'))        {            $jtStartIndex = $_REQUEST['jtStartIndex'];            $jtPageSize = $_REQUEST['jtPageSize'];            $query = BlogModel::query();            if (!empty($request->name))            {                $query->where('title', 'like', '%' . $request->name . '%');            }            if (!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined")            {                $jtSorting = explode(' ', $_REQUEST['jtSorting']);                $query = $query->orderBy($jtSorting[0], $jtSorting[1]);            }            $query->orderBy('created_at', 'DESC');            $dataCount = $query->count();            $query->limit($jtPageSize)->offset($jtStartIndex);            $data = $query->get();            $this->response['Result'] = "OK";            $this->response['TotalRecordCount'] = $dataCount;            $this->response['Records'] = $data;            return json_encode($this->response);        }    }    public function update(Request $request)    {        if ($request->isMethod('post'))        {            $attributes = array(                'title' => 'Title',                'description_top' => 'Top Description',            );            $validator = Validator::make($request->all() , [				'title' => 'bail|required',				'description_top' => 'bail|required',			], [], $attributes);            if ($validator->passes())            {                $record = BlogModel::where('id', $request->id)                    ->first();                $record->title = $request->title;                $record->description_top = $request->description_top;                $record->description_bottom = $request->description_bottom;                $record->save();                $this->response['Result'] = "OK";                return json_encode($this->response);            }        }        $this->response['Result'] = "ERROR";        $this->response['Message'] = $validator->errors()            ->all();        return json_encode($this->response);    }    public function create(Request $request)    {        if ($request->isMethod('post'))        {             $attributes = array(                'title' => 'Title',                'description_top' => 'Top Description',                'image_top' => 'Top Image',            );            $validator = Validator::make($request->all() , [				'title' => 'bail|required',				'description_top' => 'bail|required',				//'image_top' => 'bail|required',			], [], $attributes);            if ($validator->passes())            {                $record = new BlogModel();                $record->title = $request->title;				$record->description_top = $request->description_top;				$record->description_bottom = $request->description_bottom;                $record->image_top = $request->image_top;                $record->image_bottom = $request->image_bottom;                $record->meta_title = $request->meta_title;                $record->meta_description = $request->meta_description;                $record->save();                $this->response['Result'] = "OK";                $this->response['Record'] = $record;                return json_encode($this->response);            }        }        $this->response['Result'] = "ERROR";        $this->response['Message'] = set_error_delimeter($validator->errors()            ->all());        return json_encode($this->response);    }    public function delete(Request $request)    {        if ($request->isMethod('post'))        {            $record = BlogModel::where('id', $request->id)                ->first();            if ($record->delete())            {                $this->response['Result'] = "OK";                return json_encode($this->response);            }        }    }		public function review_write(Request $request)    {		if ($request->isMethod('post')) 		{			$attributes = array(				'name' => "Name",				'email' => "Email",				'website' => "Website",				'comment' => "Comment",				'blog_id' => "Blog ID",			);				$validator = Validator::make($request->all(), [				'name' => 'bail|required',				'email' => 'bail|required',				//'website' => 'bail|required',				'comment' => 'bail|required',				'blog_id' => 'bail|required|numeric',			], [], $attributes);			if ($validator->fails()) 			{					return response()->json([					'success'=>false,					'message'=> $validator->errors()->first('rating'),					'error'=> $validator->errors()				]);			} 			else 			{				$this->data['review'] = new Review([					'name' => $request->name,					'email' => $request->email,					'comment' => $request->comment,					'website' => $request->website,					'blog_id' => $request->blog_id,					'notify' => ($request->notify ? 1 : 0)				]);				$this->data['review']->save();				/*Email*/				/* $this->data['subject'] = trans('language.review_product_review')." | ".config('app.name');				$this->data['view'] = 'store.themes.alammari.emails.review';				Mail::to(explode(",", config('settings.config_review_email')))->send(new Email($this->data)); */				return response()->json([					'success'=>true,					'reset'=>1,					'message'=> 'Thanks for your valuable feedback.'				]);			}		}    }}