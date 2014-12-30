<?php

class CRegistration {
    private $bodyHTML;


    public function newUser(){
            $VRegistration=USingleton::getInstance('VRegistration');
            $USession=USingleton::getInstance('USession');
            $VRegistration= USingleton::getInstance('VRegistration');
            $this->bodyHTML=$VRegistration->loadRegistrationForm();
            
            if ( $USession->get('username') ) {
                $this->bodyHTML=$VRegistration->theUserIsLoggedYet();
                /*$mess="Sei gi&agrave registrato"; //non va bene così, sto messaggio ta stà in un template o in una V al massimo
                $VRegistration->showMessage($mess);
                $VRegistration->loadLogoutButton();*/
                //$VRegistration->showPage();                
            }
            else {
                $action=$VRegistration->get('action');
                if ($action=="addUser") {
                    $this->addNewUser();
               }else {
                        $this->loadRegForm();
                }
            }
            return$this->bodyHTML;
                
        }
        
        public function loadRegForm(){
            $VRegistration=  USingleton::getInstance('VRegistration');
            $this->bodyHTML=$VRegistration->loadRegistrationForm();
        }
        
        public function addNewUser(){
            $VRegistration=  USingleton::getInstance('VRegistration');
            $FDatabase=  USingleton::getInstance('FDatabase');
            
            $name=$VRegistration->get('name');
	    $surname=$VRegistration->get('surname');
	    $cf=$VRegistration->get('CF');
	    $mail=$VRegistration->get('email');
	    $user=$VRegistration->get('username');
	    $pass=$VRegistration->get('password');
            //se inserisco un utente che esiste già so cazzi.. devo fa i controlli prima
            $FDatabase->insertUser($name,$surname,$cf,$mail,$user,$pass);
            
            //$VRegistration->showMessage($message);
            $this->bodyHTML=$VRegistration->regSuccess();
        }	
}