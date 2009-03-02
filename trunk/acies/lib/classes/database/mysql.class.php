
<?PHP
/**
 * mySQL class
 * @package acies
 */
class mysql {
	/**
	 * @var resource mySQL connection resource
	 */
	private $con;
	/**
	 * @var string tag Tag used in error logs
	 */
	private $tag = 'mySQL: ';
	/**
	 * Class construct
	 */
	public function __construct(){
		$this->con = mysql_connect(acies_config::$DB_HOST,acies_config::$DB_USR,acies_config::$DB_PWD);
		if(!$this->con){
			$this->_error('Connection failed');
		} else {
			if(!mysql_select_db(acies_config::$DB_NAME,$this->con)){
				$this->_error('Failed to select database');
			}
		}
	}
	/**
	 * Class destruct
	 */
	public function __destruct(){

	}
	
	/**
	 * mysql_query() wrapper
	 * @var string sql SQL string
	 * @return mySQL result resouce
	 */
	public function query($sql){
		$query = mysql_query($sql,$this->con);	
		if(!$query){
			switch(acies_config::$DB_LOGTYPE){
				case 'extended':
					$this->_error('SQL('.$sql.') ERROR('.mysql_error($this->con).')');
				break;
				default:
					$this->_error('query failed');
				break;
			}
		}
		return $query;
	}
	
	/**
	 * mysql_fetch_assoc() wrapper
	 * @var resource res mysql result resource
	 * @return array
	 */
	public function fetch_row($res){
		return mysql_fetch_assoc($res);
	}
	
	/**
	 * variant of fetch_row() returns all rows to an array. i.e. $arr[0]['field_name'] = 'value'
	 */
	public function fetch_all($res){
		$return = array();
		while($row = $this->fetch_row($res)){
			$return[] = $row;
		}
		return $return;
	}
	/**
	 * Error class wrapper
	 */
	private function _error($str){
		error::error($this->tag.$str);
	}	
}

?>