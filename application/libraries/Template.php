<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');





class Template


{


	var $template_data = array();


		


	private $page_title;


	private $page_sub_title;


	


	public function getPage_title() { return $this->page_title; }


	public function getPage_sub_title() { return $this->page_sub_title; }


		


	public function setPage_title($x) { $this->page_title = $x; }


	public function setPage_sub_title($x) { $this->page_sub_title = $x; }


		


	private function set($name, $value)


	{


		$this->template_data[$name] = $value;


	}


	


	public function load($template = '', $view = '' , $view_data = array(), $return = FALSE)


	{


		$this->CI =& get_instance();


		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));


		return $this->CI->load->view($template, $this->template_data, $return);


	}


		


	public function setTitles($page_title, $page_sub_title)


	{


		$this->setPage_title($page_title);


		$this->setPage_sub_title($page_sub_title);


	}


}