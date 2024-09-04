<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class CourseDate extends Model
{
	use SoftDeletes;
	
	protected $table = 'course_date';
	
	protected $primaryKey = 'id';
	
	public $timestamps = true;
	
	protected $fillable = array('start_date', 'end_date', 'active', 'course_id');
}
?>