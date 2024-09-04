<?php
namespace App\Libraries;
 
class nameAvatar
{
	public $width = 120;
	
	public $height = 120;
	
	public $background = array("#000000","#F64936","#9B2EB3","#8DC23F","#4EAE49","#FF9800");
	
	public $backgroundChosen = 0;
	
	public $textColor = "#FFFFFF";
	
	public $text = "JD";
	
	public $font = "public/assets/common/fonts/avatarFonts/Xerox Serif Wide.ttf";
	
	public $fontSize = 30;
	
	public $chars = 3;
	
	public $im;
	
	public function __construct()
	{
		$this->backgroundChosen = $this->background[mt_rand(0,count($this->background)-1)];
	}
	
	public function setText($text)
	{
		$arr = explode(" ",$text);
		
		$first = $arr[0][0];
		
		$this->text = $first;
		
		$this->text = strtoupper($this->text);
		
		if($this->chars > 1)
		{
			if(count($arr) > 1)
			{
				if($arr[1] != "")
				{
					$second = $arr[1][0];
				
					$this->text = $first.$second;
					
					$this->text = strtoupper($this->text);
				}
			}
		}
	}
	
	public function setWidth($widthAndHeight)
	{
		$this->width = $widthAndHeight;
		
		$this->height = $widthAndHeight;
	}
	
	public function setHeight($height)
	{
		$this->height = $height;
	}
	
	public function setBackground($background)
	{
		$this->backgroundChosen = $background;
	}
	
	public function setTextColor($textColor)
	{
		$this->textColor = $textColor;
	}
	
	public function setFontSize($size)
	{
		$this->fontSize = $size;
	}
	
	public function setFont($font)
	{
		$this->font = $font;
	}
	
	public function setChars($chars)
	{
		$this->chars = $chars;
	}
	
	public function hex2rgb($hex)
	{
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3)
		{
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		}
		else
		{
			$r = hexdec(substr($hex,0,2));
			
			$g = hexdec(substr($hex,2,2));
			
			$b = hexdec(substr($hex,4,2));
		}
		
		$rgb = array($r, $g, $b);
		
		return $rgb;
	}
	
	public function generate()
	{
		if($this->fontSize > $this->width)
		{
			$newWidth = $this->width;
	
			$this->width = $this->fontSize;
			
			$this->height = $this->fontSize;
			
			$this->fontSize = $newWidth;
		}
		
		$font = $this->font;
		
		$text = $this->text;
		
		$textSize = imagettfbbox($this->fontSize, 0, $font, $text);
		
		$textSizeX = abs($textSize[0]) + abs($textSize[2]);
		
		$textSizeY = abs($textSize[5]) + abs($textSize[1]);
		
		$background = $this->hex2rgb($this->backgroundChosen);
		
		$textColor = $this->hex2rgb($this->textColor);
		
		$this->im = imagecreatetruecolor($this->width, $this->height);

		$backgourndColor = imagecolorallocate($this->im, $background[0], $background[1], $background[2]);
		
		$foregoundColor = imagecolorallocate($this->im, $textColor[0], $textColor[1], $textColor[2]);
		
		imagefilledrectangle($this->im, 0, 0, $this->width, $this->height, $backgourndColor);
		
		$x = ($this->width - $textSizeX)/2;
		
		$y = ($this->height/2) + ($textSizeY/2);
		
		imagettftext($this->im, $this->fontSize, 0, $x, $y, $foregoundColor, $font, $text);
	}
	
	public function output()
	{
		header("Content-Type: image/jpeg");
		
		imagejpeg($this->im, null, 100);
		
		imagedestroy($this->im);
	}
	
	public function display()
	{
		ob_start();

		imagejpeg($this->im, null, 100);

		$rawImageBytes = ob_get_clean();
		
		return "data:image/jpeg;base64,".base64_encode($rawImageBytes);
	}
	
	public function save($name)
	{
		imagejpeg($this->im, $name, 100);
	}
}
?>