<?php
namespace App\Providers;
use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /* if (\Schema::hasTable('smtp_setting'))
        {
            $mail = DB::table('smtp_setting')->first();
            if ($mail) //checking if table is not empty
            
            {
                $config = array(
                    'driver' => $mail->driver,
                    'host' => $mail->host,
                    'port' => $mail->port,
                    'from' => array(
                        'address' => $mail->from_address,
                        'name' => $mail->from_name
                    ) ,
                    'encryption' => $mail->type,
                    'username' => $mail->username,
                    'password' => $mail->password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                );
                Config::set('mail', $config);
            }
        } */ 
    }
}

