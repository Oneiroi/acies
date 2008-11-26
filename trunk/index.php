<?php
/**
 * 
 */
set_error_handler('error');
$err_stack = array();
$err_fatal = false;
/**
 * Load Config
 */
include("acies_conf.inc");
/**
 * Load Main Class
 */
require_once(ACIES_APP_CLASSES_DIR."/acies.class.php");
$ACIES = new acies();

//output body

echo $ACIES->_get_html();

//trigger_error("Coming Soon",E_ERROR);

function error($_no,$_str,$_file,$_line,$_context)
{
	global $err_stack, $err_fatal, $ACIES;
	switch($_no)
	{
		case E_USER_ERROR:
		break;
		case E_USER_NOTICE:
		break;
		case E_USER_WARNING:
		break;
		case E_COMPILE_ERROR:
		break;
		case E_COMPILE_WARNING:
		break;
		case E_CORE_ERROR:
		break;
		case E_CORE_WARNING:
		break;
		case E_ERROR:
		break;
		case E_NOTICE:
		break;
		case E_PARSE:
		break;
		case E_RECOVERABLE_ERROR:
		break;
		case E_STRICT:
		break;
		case E_WARNING:
		break;
		case E_FATAL_ERROR:
		break;
	}
	
	if(stristr($_str, "Fatal"))
	{
		$err_fatal = true;
	}
	if(stristr($_str, "sql"))
	{
		$_str .= "\n\n MYSQL_ERROR_NO:".@mysql_errno($ACIES->DB->con);
		$_str .= "\n\n MYSQL_ERROR:".@mysql_error($ACIES->DB->con);
		$_str .= "\n\n MYSQL_SQL:".$ACIES->DB->sql;
	}
	
	array_push($err_stack, $_str);
	
}
if($err_fatal)
{
	include(ACIES_HTCODE."/down.php");
	print_r($err_stack);
	exit;
}
?>