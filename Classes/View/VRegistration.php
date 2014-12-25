<?php

class VRegistration extends View {
    
    public function alreadyRegistered($message){ //implementare in view
        $this->setBody($message );
        //funzione mai chiamata???????????
    }
    
    //non deve fa la showPage
    public function loadRegistrationForm(){
        $body=$this->fetch('body_registration.tpl');
        $this->setBody($body);
        $this->loadLoginForm();
        $this->showPage();
    }
}

