<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Coupon extends Model
{
	protected $table = 'coupon';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $fillable = array('code', 'start_date', 'end_date', 'percentage');
}
?>