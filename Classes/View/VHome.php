<?php


class VHome extends View {
	
    public function loadHomeBody(){
    	$body=$this->fetch('body_home.tpl');
    	$this->setBody($body);
    }
    
    public function showUser($user){
        $this->assign('username',$user);
    }
    
    
    //questo va messo in una Vservice con relativo controllore o è statica e la lasciamo qua?
    public function loadServicesPage(){
        $about=$this->fetch('services.tpl');
        $this->setBody($about);
    }
    
    //questo va messo in una VContact con relativo controllore o è statica e la lasciamo qua?
    public function loadContactsPage(){
        $about=$this->fetch('contact.tpl');
        $this->setBody($about);
    }

}