<?php

class xhtml
{
	private $stack;
	private $html;
	
	public function __construct()
	{
		$this->stack = array();
		$this->html = "";
	}
	
	public function _get_html()
	{
		$this->render_xhtml();
		return $this->html();
	}
	private function render_xhtml($key=0,$indent=0)
	{
		//render xhtml spacing
		$this->indent($indent);
		
		switch($this->stack[$key]['type'])
		{
			/**
			 * string i.e.
			 * [0]['type'] => 'str';
			 * [0]['str'] => 'Hello world!';
			 */
			case 'str':
				$this->html .= $this->stack[$key]['str']."\n";
			break;
			/**
			 * tag i.e.
			 * [0]['tag'] => 'img';
			 */
			case 'tag':
				$this->html .= "<".$this->stack[$key]['tag'];
				if(isset($this->stack[$key]['argv']))
				{
					/**
					 * i.e.
					 * [0]['argv']['width'] => 120
					 * [0]['argv']['height'] => 90
					 * [0]['argv']['class'] => 'css_style'
					 */
					foreach($this->stack[$key]['argv'] as $key => $data)
					{
						$this->html .= " ".$key."=\"".$data."\"";
					}
				}
				if(isset($this->stack[$key]['child']))
				{
					$this->html .= ">\n";
					//render children
					foreach($this->stack[$key]['child'] as $data)
					{
						$this->html .= $this->render_html($data, ($indent + 1));
					}
					//render xhtml spacing
					$this->indent($indent);
					$this->html .= "</".$this->stack[$key]['tag'].">\n";
				}
				else 
				{
					$this->html .= "/>\n";
				}
			break;
		}		
	}
	private function indent($indent = 0)
	{
		for($i=0; $i < $indent; $i++)
		{
			$this->html .= "\t";
		}
	}
	
	public function div($class="",$style="",$id="",$name="")
	{
		$this->stack[]['type'] 			= "tag";
		$this->stack[]['tag'] 			= "div";
		$this->stack[]['argv']['class']	= $class;
		$this->stack[]['argv']['style'] = $style;
		$this->stack[]['argv']['id']	= $id;
		$this->stack[]['argv']['name']  = $name;
	}
}

?>