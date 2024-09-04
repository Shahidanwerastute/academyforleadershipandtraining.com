<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class CouponCourse extends Model
{
	protected $table = 'coupon_course';
	
	protected $primaryKey = 'id';
	
	public $timestamps = true;
	
	protected $fillable = array('coupon_id', 'course_id');
}
?>