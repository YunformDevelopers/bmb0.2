<?php
require 'includes/includes.inc.php';
/* class MajorColor
{
	//参考颜色
	protected $_colors = null;

	//容差
	protected $_tolerance = 80;

	//忽略的颜色
	protected $_ignoreColors = array();

	//支持的图片类型
	protected $_funcs = array('image/png' => 'imagecreatefrompng', 'image/jpeg' => 'imagecreatefromjpeg', 'image/gif' => 'imagecreatefromgif');

	public function __construct(array $colors = null) {
		if(null !== $colors) {
			$this->_colors = $colors;
		}
	}

	public function setColors(array $colors) {
		$this->_colors = $colors;
	}

	public function setTolerance($tolerance) {
		$this->_tolerance = $tolerance;
	}

	public function setIgnoreColors($colors) {
		$this->_ignoreColors = $colors;
	}

	public function _isValidColor($confVal, $val) {
		if(is_array($confVal)) {
			return $val >= $confVal[0] && $val <= $confVal[1];
		} else {
			return $val >= $confVal - $this->_tolerance && $val <= $confVal + $this->_tolerance;
		}
	}

	public function getOrderedColors($pic) {
		$size = getimagesize($pic);
		if(!$size) {
			return false;
		}

		$width = $size[0];
		$height = $size[1];
		$mime = $size['mime'];
		$func = isset($this->_funcs[$mime]) ? $this->_funcs[$mime] : null;
		if(!$func) {
			return false;
		}

		$im = $func($pic);
		if(!$im) {
			return false;
		}

		$total = $width * $height;
		$nums = array();
		for($i = 0; $i < $width; $i++) {
			for($m = 0; $m < $height; $m++) {
				$color_index = imagecolorat($im, $i, $m);
				$color_tran = imagecolorsforindex($im, $color_index);
				$alpha = $color_tran['alpha'];
				unset($color_tran['alpha']);
				if(100 < $alpha || in_array($color_tran, $this->_ignoreColors)) {
					continue;
				}

				foreach ($this->_colors as $colorid => $color) {
					if($this->_isValidColor($color['red'], $color_tran['red'])
					&& $this->_isValidColor($color['green'], $color_tran['green'])
					&& $this->_isValidColor($color['blue'], $color_tran['blue'])
					) {
						$nums[$colorid] = isset($nums[$colorid]) ? $nums[$colorid] + 1 : 1;
					}
				}
			}
		}

		imagedestroy($im);
		arsort($nums);
		return $nums;
	}

	public function getMajorColor($pic) {
		$nums = $this->getOrderedColors($pic);
		$keys = array_keys($nums);
		return $keys[0];
	}
}
$colors = array(
		1 => array('red' => 0xff, 'green' => 0xff, 'blue' => 0xff),
		2 => array('red' => 0xc0, 'green' => 0xc0, 'blue' => 0xc0),
		2 => array('red' => 0x00, 'green' => 0x00, 'blue' => 0x00),
);
$test = new MajorColor();
$test->setColors($colors);
echo $test->getMajorColor('test/test.jpg'); */
function getMajorColor($url){
	$i = imagecreatefromjpeg($url);
	$rTotal=0;
	$gTotal=0;
	$bTotal=0;
	$total=0;
	for ($x=0;$x<imagesx($i);$x++) {
		for ($y=0;$y<imagesy($i);$y++) {
			$rgb = imagecolorat($i,$x,$y);
			$r   = ($rgb >> 16) & 0xFF;
			$g   = ($rgb >> 8)  & 0xFF;
			$b   = $rgb & 0xFF;
	
			$rTotal += $r;
			$gTotal += $g;
			$bTotal += $b;
			$total++;
		}
	}
	
	$rAverage = dechex(round($rTotal/$total));
	$gAverage = dechex(round($gTotal/$total));
	$bAverage = dechex(round($bTotal/$total));
	$color='0x'.$rAverage.$gAverage.$bAverage;
	echo $color;
}
getMajorColor('test/test.jpg');

?>