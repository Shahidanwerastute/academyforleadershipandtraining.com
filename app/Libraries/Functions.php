<?php 
namespace App\Libraries;

use Illuminate\Support\Facades\Auth;

use App\User;

use Carbon\Carbon,Config;

class Functions 
{	
	public static function getdomain($url)
	{
		if(preg_match("#https?://#", $url) === 0)
		$url = 'http://' . $url;
		
		return strtolower(str_ireplace('www.', '', parse_url($url, PHP_URL_HOST)));
	}
	public static function timeAgo($time)
	{
		$time=strtotime($time);

		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

		$lengths = array("60","60","24","7","4.35","12","10");
		
		$now = time();

		$difference = $now - $time;

		$tense= "ago";

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
		{
			$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if($difference != 1) 
		{
			$periods[$j].= "s";
		}

		return "$difference $periods[$j] $tense "; 
	}
	
	public static function _is_image_exist($file)
	{
		if(file_exists($file))
			return asset($file);
		
		return false;
	}
	
	public static function _myDefault_profile_picture($gender = '')
	{
		if($gender == 'male')
		{
			return asset('public/assets/manage_store/images/users-profile/default/male-default-profile-picture.png');
		}
		else
		{
			return asset('public/assets/manage_store/images/users-profile/default/female-default-profile-picture.jpg');
		} 	
	}
	
	public static function array_push_assoc($array, $key, $value)
	{
		$array[$key] = $value;
		
		return $array;
	}
	
	public static function csv_to_array($filename='', $delimiter=',')
	{
		if(!file_exists($filename) || !is_readable($filename))
			return FALSE;

		$header = NULL;
		
		$data = array();
		
		if (($handle = fopen($filename, 'r')) !== FALSE)
		{
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
			{
				if(!$header)
					$header = $row;
				else
					$data[] = array_combine($header, $row);
			}
			fclose($handle);
		}
		return $data;
	}
	
	public static function permalink($permalink)
	{

		$to_clean = array("#","%","&","$","*","{","}","(",")","@","^","|","/",";",".",",","`","!","\\",":","<",">","?","/","+",'"',"'");
		
		$permalink = str_replace(" ", "-", $permalink);
		
		foreach($to_clean as $symbol)
		{
			$permalink = str_replace($symbol, "", $permalink);
		}
		
		while (strpos($permalink, '--') !== FALSE)
			$permalink = str_replace("--", "-", $permalink);
		
		$permalink = rtrim($permalink, "-");
		
		$permalink = ltrim($permalink, "-");
		
		if ($permalink != "-") 
			return $permalink;
		else 
			return "";
	}
}
?>