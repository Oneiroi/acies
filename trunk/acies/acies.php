<?PHP

class acies {
	
	/**
	 * @var object db database object, set in acies construct
	 */
	public $db;
	/**
	 * @var object error object
	 */
	public $error;
	
	public $path = '';
	
	/**
	 * @var string tag Tag used in error logs
	 */
	private $tag = 'Acies: ';
	
	public function __construct(){
		$this->path = realpath(dirname(__FILE__));
		/**
		 * Load required classes
		 */
		 //validate class
		  require_once($this->path.'/lib/classes/core/validate.class.php');
		/**
		 * Load the config
		 */
		 $path = $this->path.'/lib/acies_config.php';
		 if(validate::requireable($path)){
		 	//load in the config
		 	require_once($this->path.'/lib/acies_config.php');
		 	//load the error class
		 	$this->_load_error();
		 	//load the db
		 	$this->_load_db();
		 } else {
		 	$this->_error('Failed to require '.$path);
		 }	 
	}
	
	private function  _load_error(){
		$path = $this->path.'/lib/classes/core/error.class.php';
		require_once($path);
		$this->error = new error();
	}
	/**
	 * instance the specified database handler class
	 */
	private function _load_db(){
		switch(acies_config::$DB_TYPE){
			case 'mysql':
				$path = $this->path.'/lib/classes/database/mysql.class.php';
				$cname= 'mysql';
			break;
			default:
				$path = $this->path.'/lib/classes/database/mysql.class.php';
				$cname= 'mysql';
			break;	
		}
		if(validate::requireable($path)){
			require_once($path);
			$this->db = new $cname();
		} else {
			$this->_error('Failed to load '.$path);
		}
	}
	
	/**
	 * Error class wrapper
	 */
	public function _error($str){
		$this->error->error($this->tag.$str);
	}
}

?>