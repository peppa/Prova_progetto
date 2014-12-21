<?php

class VRegistration extends View {
    
    public function alreadyRegistered($message){ //implementare in view
        $this->assign('body',$message );
    }
    
    public function loadRegistrationForm(){
        $body=$this->fetch('body_registration.tpl');
        $this->assign('body',$body);
        $this->loadLoginForm();
        $this->showHome();
    }
}

