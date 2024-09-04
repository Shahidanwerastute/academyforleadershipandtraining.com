<?php 
namespace App\Libraries;

class Upload
{	
	protected $UPLOAD_DIR;
	
	public function __construct()
	{
	
	}
	public function saveImage($base64img,$uploadPath)
	{
		$this->UPLOAD_DIR = $uploadPath;
		if(substr_count($base64img,"data:image/png")==1)
		{
			$base64img = str_replace('data:image/png;base64,', '', $base64img);
			$data = base64_decode($base64img);
			$base64img=uniqid().'-'.time().'.png';
		}
		else if(substr_count($base64img,"data:image/gif")==1)
		{
			$base64img = str_replace('data:image/gif;base64,', '', $base64img);
			$data = base64_decode($base64img);
			$base64img=uniqid().'-'.time().'.gif';
		}
		else
		{
			$base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
			$data = base64_decode($base64img);
			$base64img=uniqid().'-'.time().'.jpg';
		}
		$this->uploadFile(1,$data,$this->UPLOAD_DIR,$base64img,false,'');
		return $base64img;
	}
	
	public function uploadFile($type,$file,$path,$fileName,$delete=false,$originalImagePath="")
	{
		if($type == 1)
		{
			file_put_contents($path.$fileName, $file);
			$this->compress($path.$fileName, $path.$fileName);
		}
		else if($type == 2)
		{
			move_uploaded_file($file,$path.$fileName);
			$this->compress($path.$fileName, $path.$fileName);
		}
	}
	
	public function compress($source, $destination) 
	{
		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
		{
			$image = imagecreatefromjpeg($source);
			imagejpeg($image, $destination, 90);
		}
		elseif ($info['mime'] == 'image/png')
		{
			$image = imagecreatefrompng($source);
			imagepng($image,$destination,9,PNG_ALL_FILTERS);
		}
		
		return $destination;
	}
	
	public function defaultAvatar($text,$path,$width,$height)
	{
		$profilePicture=uniqId().'-'.time().'.jpg';
		
		$object = new nameAvatar();

		$object->setChars(1);

		$object->setText($text);

		$object->setTextColor("#FFFFFF");

		$object->setWidth($width);
		
		$object->setWidth($height);

		$object->setFontSize(70);

		$object->setFont("public/assets/common/fonts/avatarFonts/arial.ttf");

		$object->generate();
		
		$object->save($path.$profilePicture);
		
		return $profilePicture;
	}
}
?>