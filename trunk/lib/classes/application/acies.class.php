<?php

/**
 * ACIES Framework application layer, this class sets up common objects such as database connection and XHTML compliant render
 * @author  David Busby
 * @copyright  David Busby
 */
class acies
{
	/**
	 * Object definitions for global access
	 * rather than using (global $VAR)
	 */
	
	/**
	 * DATBASE object, this is set in the construct
	 *
	 * @var  object;
	 */
	public $DB;
	/**
	 * XHTML object, this is set in the construct
	 *
	 * @var unknown_type
	 */
	public $XHTML;
	
	/**
	 * HTML output buffer,
	 *
	 * @var  string
	 */
	private $html = "";
	
	public function __construct()
	{
		/**
		 * DB Defines
		 */
		define("ACIES_DB", "saiwebco_acies");
		define("ACIES_DB_TYPE", "mysql");
		define("ACIES_DB_USR", "saiwebco_saiweb");
		define("ACIES_DB_PWD", "6786dd9e5d072aedaf9f3b74e6b63849f192f90fa6dc716eeb77dc7b171cda2a");
		define("ACIES_DB_HOST", "localhost");
		
		$this->_set_db_type();
				
		$sql 	= "SELECT f.folder, w.lang_shortcode, w.id FROM www w, www_folder f WHERE w.server_name = "
				. $this->DB->safe($_SERVER['SERVER_NAME'])
				. " AND f.id=w.folder_id;";
				
		$res = $this->DB->query($sql);
		//set site defines
		$row = $this->DB->fetch_assoc($res);
		
		if(!is_array($row))
		{
			trigger_error("Fatal: Site Not Defined ",E_USER_ERROR);
		}
		else
		{
			
			define("ACIES_SITE_ID", $row['id']);
			define("ACIES_LANG_SHORTCODE", $row['lang_shortcode']);
			define("ACIES_WWW", ACIES_ROOT."/www/".$row['folder']);
			
			//load xhtml class
			require_once(ACIES_APP_CLASSES_DIR."/xhtml.class.php");
			$this->XHTML = new xhtml();
			
			//load site content into buffer
			$this->_load_site();
		}
	}
	
	private function _load_site()
	{
		require_once(ACIES_WWW."/acies.template.php");
		$PAGE = new acies_template();
		
		$this->html = $PAGE->_get_html();
	}
	
	public function _get_html()
	{
		return $this->html;
	}
	
	private function _set_db_type()
	{
		switch(ACIES_DB_TYPE)
		{
			case "mysql":
				require_once(ACIES_DB_CLASSES_DIR."/mysql.class.php");
				$this->DB = new mysql();
			break;
			default:
				trigger_error("Fatal: ACIES_DB_TYPE", E_USER_ERROR);
			break;
		}
	}
}

?>