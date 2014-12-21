<?php

require_once './lib/smarty/Smarty.class.php';

Class View extends Smarty {

	public function __construct() {
        parent::__construct();
        //$this->Smarty();
        global $config;
        $this->template_dir = $config['smarty']['template_dir'];
        $this->compile_dir = $config['smarty']['compile_dir'];
        $this->config_dir = $config['smarty']['config_dir'];
        $this->cache_dir = $config['smarty']['cache_dir'];
        $this->caching = $config['smarty']['caching'];
        
    }

    public function get($key) {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        else {
            return false;
        }
    }

    public function loadLoginForm(){
        $log=$this->fetch('login.tpl');
        $this->assign('loginBox',$log);
    }

    public function loadLogoutButton(){
        $log=$this->fetch('loggedIn.tpl');
        $this->assign('loginBox',$log);
        //$this->assign('username',$user);
    }

    public function showHome(){
    	$this->display('home.tpl');     //rinominare in main.tpl	
    }
    
    public function showMessage($message){
        $this->assign('body',$message);
    }



}