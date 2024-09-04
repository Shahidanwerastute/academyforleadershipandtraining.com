<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Payment extends Model
{
	protected $table = 'payment';
	
	protected $primaryKey = 'id';
	
	public $timestamps = true;
	
	protected $fillable = array('name', 'title', 'email', 'phone', 'mobile', 'address', 'organization', 'comment', 'price', 'status', 'payment_type', 'transaction_type', 'nonce', 'course_id');
}
?>