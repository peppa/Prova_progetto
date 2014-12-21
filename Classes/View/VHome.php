<?php

//require_once './Classes/View/View.php';

class VHome extends View {
	
    public function loadHomeBody(){
    	$body=$this->fetch('body_home.tpl');
    	$this->assign('body',$body);
    }

    public function showHome(){
    	$this->display('home.tpl');     //rinominare in main.tpl	
    }
    
    public function showUser($user){
        $this->assign('username',$user);
    }
    
    public function loadServicesPage(){
        $about=$this->fetch('services.tpl');
        $this->assign('body',$about);
    }
    
    public function loadContactsPage(){
        $about=$this->fetch('contact.tpl');
        $this->assign('body',$about);
    }

}