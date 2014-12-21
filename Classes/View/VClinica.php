<?php

/*require_once "./Smarty/libs/Smarty.class.php";
require_once "./Configuration files/smartyConfig.php"; //autoload*/


//rinominare vclinica in view, tutte le altre view estendono questa
class VClinica extends Smarty {  

	public function __construct(){/*
		parent::__construct();

		global $smarty;
		
		$this->template_dir = $smarty['template_dir']; 
		$this->compile_dir = $smarty['compile_dir'];
		$this->cache_dir = $smarty['cache_dir'];
		$this->config_dir = $smarty['config_dir'];*/
		$this->Smarty();
        global $config;
        $this->template_dir = $config['smarty']['template_dir'];
        $this->compile_dir = $config['smarty']['compile_dir'];
        $this->config_dir = $config['smarty']['config_dir'];
        $this->cache_dir = $config['smarty']['cache_dir'];
        $this->caching = $config['smarty']['caching'];

	}

	public function get($key)
	{
		if (isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;		
	}
}