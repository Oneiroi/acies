<?PHP
/**
 * Acies configuration class
 * @package acies
 */
class acies_config{
	//general config
	
	//database config
	/**
	 * @var string DB_USER database user
	 */
	public static $DB_USR = '';
	/**
	 * @var string DB_PWD database password
	 */
	public static $DB_PWD = '';
	/**
	 * @var string DB_HOST database host
	 */
	public static $DB_HOST = '';
	/**
	 * @var string DB_NAME database name
	 */
	public static $DB_NAME = '';
	/**
	 * @var string DB_TYPE database type default mysql
	 */
	public static $DB_TYPE = 'mysql';
	/**
	 * @var string DB_LOGTYPE datbase error log type, fo security you can opt to log nothing by setting ''. extended logs the SQL and the error
	 */
	public static $DB_LOGTYPE = 'extended';
	
}
?>