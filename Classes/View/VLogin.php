<?php

class VLogin extends View {

	public function welcomePage($message){ //riunire le 2 funzioni in una sola
            $this->assign('body',$message);
	}

	public function errorPage($error){
            $this->assign('body',$error);
	}

	/*public function homePage(){
		$this->loadLoginForm();
		$body=$this->fetch('body_home.tpl');
    	$this->assign('body',$body);
    	$this->display('home.tpl');
	}*/
}