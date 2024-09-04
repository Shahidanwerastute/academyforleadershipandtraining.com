<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable
{
	use Notifiable;
	use HasRoles;
	protected $table = 'users';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $fillable = array('first_name', 'last_name', 'email', 'password', 'image', 'confirmed', 'confirmation_code', 'mobile', 'address');
    protected $hidden = [
        'password', 'remember_token',
    ];
	//Send password reset notification
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPasswordNotification($token));
	}
}
?>