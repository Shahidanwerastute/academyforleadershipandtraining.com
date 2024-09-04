<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use Hash, Carbon\Carbon;

use DB;

class Password_resets extends Model
{
    protected $table = 'password_resets';
	
	protected $primaryKey = 'id';
	
	public function resetPassword(User $user, $token)
    {
        $this->email = $user->email;
		
        $this->token = $token;
		
        $this->created_at = Carbon::now();
		
        $this->save();
    }
}
?>