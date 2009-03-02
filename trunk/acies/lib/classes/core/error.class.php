<?PHP
/**
 * Error class
 * @package acies
 */
class error {
	
	private $srr_stack = array();
	
	public function __construct(){
		//@todo add php error handler overide here
	}
	public function __destruct(){
	
	}
	public function error($str){
		//error_log($str);
		echo $str."\n";
	}
	
}

?>