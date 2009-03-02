<?PHP

/**
 * data validation too set, each function should return a bool true/false
 */
class validate {
	
	/**
	 * Length validation, by default returns true if strlen() > 0, if length > 0 specified will return true if <= $len
	 * @var string str string to validate
	 * @var int len
	 */
	public function len($str, $len=0){
		$bool = false;
		$slen = strlen($str);
		if($len > 0){
			if($slen <= $len){
				$bool = true;	
			}
		} elseif($slen > 0) {
			$bool = true;
		}
		return $bool;
	}
	
	/**
	 * little function runs fileexists() && is_readable(); validate if both true
	 * @var string path the file path
	 * @return bool
	 */
	public function requireable($path){
		$bool = false;
		if(file_exists($path)){
			if(is_readable($path)){
				$bool = true;
			}
		}
		return $bool;
	}
}

?>