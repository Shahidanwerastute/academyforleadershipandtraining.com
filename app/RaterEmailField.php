<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class RaterEmailField extends Model
{
    protected $table = 'rater_email_fields';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = array('field_1', 'field_2');
}
?>