<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class FriendsSubQuadrant extends Model
{
	protected $table = 'friend_sub_quadrant';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $fillable = array('behavior', 'file', 'score_id', 'h', 'v', 'p_content', 's_content');
}
?>