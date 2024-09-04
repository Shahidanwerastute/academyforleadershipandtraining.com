<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Instructor extends Model
{
	protected $table = 'instructor';
	
	protected $primaryKey = 'id';
	
	public $timestamps = true;
	
	protected $fillable = array('name', 'bio', 'image');
}
?>