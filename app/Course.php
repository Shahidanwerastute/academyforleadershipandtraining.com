<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Course extends Model
{
	protected $table = 'course';
	
	protected $primaryKey = 'id';
	
	public $timestamps = true;
	
	protected $fillable = array('title', 'day', 'price', 'description', 'short_info', 'outline', 'instructor_ids', 'image', 'can_register', 'icon', 'display_order');

	public function durations() {
		return $this->hasMany('App\CourseDate')->where('active', 1)->orderBy('created_at', 'DESC');
	}

	public function videos() {
		return $this->hasMany('App\CourseVideo')->orderBy('created_at', 'DESC');
	}
}
?>