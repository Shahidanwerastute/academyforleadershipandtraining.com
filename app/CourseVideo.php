<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class CourseVideo extends Model
{
	protected $table = 'course_video';
	
	protected $primaryKey = 'id';
	
	public $timestamps = true;
	
	protected $fillable = array('embed_url', 'course_id');
}
?>