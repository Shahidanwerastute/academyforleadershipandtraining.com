<?phpnamespace App;use Illuminate\Database\Eloquent\Model;use DB;class Blog extends Model{	protected $table = 'blog';		protected $primaryKey = 'id';		public $timestamps = true;		protected $fillable = array('title', 'description_top', 'description_bottom', 'image_top', 'image_bottom', 'meta_title', 'meta_description');}?>