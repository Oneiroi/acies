<?php
class acies_template
{
	private $html;
	private $ACIES;
	
	public function __construct()
	{
		global $ACIES;
		
		$this->ACIES = $ACIES;
		
		$this->html  = $this->_set_header();
		$this->html .= $this->_set_body();
		$this->html .= $this->_set_footer();
		if(strlen($this->html) == 0)
		{
			trigger_error("Fatal:  Template html is empty",E_USER_ERROR);
		}
	}
	public function __destruct()
	{
		
	}
	
	private function _set_body()
	{
		
	}
	
	private function _set_header()
	{
		
	}
	
	private function _set_footer()
	{
		
	}
	
	public function _get_html()
	{
		return $this->html;
	}
}
?>