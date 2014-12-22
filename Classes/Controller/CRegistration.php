<?php

class CRegistration {
        
        public function newUser(){
            $VRegistration=USingleton::getInstance('VRegistration');
            $USession=USingleton::getInstance('USession');
            $VRegistration= USingleton::getInstance('VRegistration');
            
            if ( $USession->get('username') ) {
                $mess="Sei gi&agrave registrato";
                $VRegistration->showMessage($mess);
                $VRegistration->loadLogoutButton();
                $VRegistration->showHome();                
            }
            else {
                $action=$VRegistration->get('action');
                switch ($action) {
                    
                    case 'loadForm':
                        $this->loadRegForm();
                    break;
                
                    case 'addUser':
                        $this->addNewUser();
                    break;
                
                    default:
                        $this->loadRegForm();
                
                }
            }
                
        }
        
        public function loadRegForm(){
            $VRegistration=  USingleton::getInstance('VRegistration');
            $VRegistration->loadRegistrationForm();
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
            $FDatabase->insertUser($name,$surname,$cf,$mail,$user,$pass);
            
            $message="Registrazione avvenuta con successo";
            $VRegistration->showMessage($message);
            $VRegistration->loadLoginForm();
            $VRegistration->showHome();
        }	
}