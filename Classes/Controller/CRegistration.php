<?php

require_once "./Classes/Foundation/FDatabase.php";

class CRegistration {
/*
	public function __construct(){
		$VRegistration=USingleton::getInstance('VRegistration');
                $USession=  USingleton::getInstance('USession');
                
                if ( $USession->get('username') ) {
                    $mess="Sei gi"."&agrave"." registrato";
                    $this->showMessage($mess);
                    
                }
                
                else  {
                
		$action=$VRegistration->get('action');
		switch($action){

		case 'loadForm':
		$view->display('registration.tpl');
		break;

		case 'addUser':
		$db=USingleton::getInstance('FDatabase');
		
		$name=$view->get('name');
		$surname=$view->get('surname');
		$cf=$view->get('CF');
		$mail=$view->get('email');
		$user=$view->get('username');
		$pass=$view->get('password');

		$db->insertUser($name,$surname,$cf,$mail,$user,$pass);
		//mostrare messaggio di avvenuta iscrizione
		echo "utente aggiunto al DB";
		break;

		default:
		echo "da implementare";
                }
	}
		
	}*/
        
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
        
        /*
        public function showMessage($message){
            $VRegistration=  USingleton::getInstance('VRegistration');
            $VRegistration->showMessage($message);
            $VRegistration->loadLogoutButton();
            $VRegistration->showHome();
            
        }*/

	
}