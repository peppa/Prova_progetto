<?php

class VRegistration extends View {
    
    public function theUserIsLoggedYet() {
        return "Sei già loggato, effettua logout prima di registrare un nuovo utente";
        
    }
    
    /**
     * The message in case of registration success
     * 
     * @return string
     */
    function regSuccess() {
        return "Registrazione avvenuta con successo"; //non va bene
    }
    
    //non deve fa la showPage
    public function loadRegistrationForm(){
        $body=$this->fetch('body_registration.tpl');
        return $body;
        //$this->showPage();
    }
}

