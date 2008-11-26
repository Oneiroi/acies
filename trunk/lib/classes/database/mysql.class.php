<?php
/**
 * mySQL wrapper class
 * (Part of the Acies framework)
 * @copyright D.Busby 2008
 */
class mysql
{
	/**
	 * Mysql connection
	 * use _get_con(); if you need access to this resource.
	 * @see _get_con()
	 */
	private $con;
	/**
	 * SQL run, this is set by the query() function.
	 * use _get_sql() if you need to get the contents;
	 *
	 * @var string
	 */
	private $sql;
	
	/**
	 * mySQL class construct
	 *
	 */
	public function __construct()
	{
		$this->con = mysql_connect(ACIES_DB_HOST, ACIES_DB_USR, ACIES_DB_PWD);
		if(!$this->con)
		{
			trigger_error("Fatal: DB Connection Failed",E_USER_ERROR);
		}
		else
		{
			$this->__selectdb(ACIES_DB);
		}
		
	}
	/**
	 * mySQL class destruct
	 *
	 */
	public function __destruct()
	{
		
	}
	/**
	 * This method is used to change the datbase associated with $this->con
	 *
	 * @param string $db
	 */
	public function __selectdb($db)
	{
		if(!mysql_select_db($db, $this->con))
		{
			trigger_error("Fatal: DB Selection failed ".ACIES_DB."\n\n".mysql_error(), E_USER_ERROR);
		}
	}
	/**
	 * Returns $this->sql contents
	 *
	 * @return string
	 */
	public function _get_sql()
	{
		return $this->sql;
	}
	/**
	 * Returns $this->con
	 *
	 * @return MYSQL_CONNECTION_RESOURCE
	 */
	public function _get_con()
	{
		return $this->con;
	}
	/**
	 * Mysql query method
	 *
	 * @param string $sql
	 * @return MYSQL_RESULT
	 */
	public function query($sql)
	{
		$this->sql = $sql;
		return mysql_query($sql, $this->con);
	}
	/**
	 * mysql_fetch_assoc() wrapper
	 *
	 * @param MYSQL_RESULT $res
	 * @return array
	 */
	public function fetch_assoc($res)
	{
		return mysql_fetch_assoc($res);
	}
	/**
	 * mysql_numrows() wrapper
	 *
	 * @param MYSQL_RESULT $res
	 * @return int
	 */
	public function num_rows($res)
	{
		return mysql_numrows($res);
	}
	/**
	 * mysql_numfields() wrapper
	 *
	 * @param MYSQL_RESULT $res
	 * @return int
	 */
	public function num_fields($res)
	{
		return mysql_numfields($res);
	}
	/**
	 * Returns the pk from the last insert query
	 *
	 * @param MYSQL_RESULT $res
	 * @return int
	 */
	public function last_insert_id($res)
	{
		return mysql_insert_id($res);
	}
	/**
	 * Escapes the data passed in for inclusion in a sql string
	 *
	 * @param string $data
	 * @return string
	 */
	public function safe($data)
	{
		return "'".mysql_real_escape_string($data)."'";
	}
}

?>