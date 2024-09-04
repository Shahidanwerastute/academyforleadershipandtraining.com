<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\User;
use Validator;
use Auth, Hash;
use Braintree_Configuration;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('valid_profile_username', function($attribute, $value, $parameters, $validator) {
            return (bool) preg_match("/^([0-9a-zA-Z _.-])+$/i", $value);
        });
		Validator::extend('verification_email', function($attribute, $value, $parameters, $validator) {
            User::where('email',$value)
				->where('confirmed', 0)
				->delete();
			return true;
        });
		Validator::extend('confirmed_email_exist', function($attribute, $value, $parameters, $validator) {
            $count = User::where('email', $value)
				->where('id', '!=', $parameters[0])
				->where('confirmed', 1)
				->count();
			if($count > 0)
				return false;
			else 
				return true;
        });
		Validator::extend('old_password', function($attribute, $value, $parameters, $validator) {
           if(!Hash::check($value, Auth::user()->password))
				return false;
			else 
				return true;
        });

        //Braintree Config
        Braintree_Configuration::environment(config('braintree.BRAINTREE_ENV'));
        Braintree_Configuration::merchantId(config('braintree.BRAINTREE_MERCHANT_ID'));
        Braintree_Configuration::publicKey(config('braintree.BRAINTREE_PUBLIC_KEY'));
        Braintree_Configuration::privateKey(config('braintree.BRAINTREE_PRIVATE_KEY'));
		
		\Debugbar::disable();
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
