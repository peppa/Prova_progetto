<?php

class VLogin extends View {

    //cosi non va bene, il messaggio deve esse html..
	public function welcomePage(){ 
            $message="login effettuato con successo";
            $this->assign('body',$message);
	}
        
    //idem a sopra
	public function errorPage(){
            $error="user o pass non corretti";
            $this->assign('body',$error);
            //QUA UGUALE A SOPRA.. PORCO DIO
	}

}