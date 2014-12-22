<?php

class CHome {  

	public function __construct() {
		$VHome=Usingleton::getInstance('VHome');
		
		$action=$VHome->get('control');
		switch ($action) {

			case 'Home':
                            $this->showHomePage();
			break;
                    
                        case 'Checkup':
                            $CCheckup=  USingleton::getInstance('CCheckup');
                            $CCheckup->ReserveCheckup();
                        break;

			case 'login':
                            $CLogin=USingleton::getInstance('CLogin');
                            $CLogin->manageLogin();
			break;

			case 'logout':
                            $CLogin=USingleton::getInstance('CLogin');
                            $CLogin->logout();
			break;

			case 'manageDB':
                            $this->checkUser();
			break;

			case 'Services':
                            $VHome->loadServicesPage();
                            $this->showHomePage();
			break;

			case 'Registration':
                            $CRegistration=  USingleton::getInstance('CRegistration');
                            $CRegistration->newUser();
			break;

			case 'Contacts':
                            $this->contactsPage();
                        break;


			default:
			$this->showHomePage();
		}
		
	}
        
	private function addLoginBox(){
            $CLogin=USingleton::getInstance('CLogin');
            $VHome=USingleton::getInstance('VHome');
            $USession=USingleton::getInstance('USession');
            
            if ($CLogin->checkLoggedIn()) {
                $username=$USession->get('username');
                debug($username,"Username: ");
                $VHome->showUser($username);
                $VHome->loadLogoutButton($username);                
            }
            else {
                $VHome->loadLoginForm();
            }
	}

	private function showHomePage(){
            $VHome=USingleton::getInstance('VHome');
            $VHome->loadHomeBody();
            $this->addLoginBox();
            $VHome->showHome();
	}
        
        public function contactsPage(){
            $VHome=  USingleton::getInstance('VHome');
            $VHome->loadContactsPage();
            $this->addLoginBox();
            $VHome->showHome();
        }
        
        public function checkUser(){//solo il medico ha accesso a questa sezione
            $CLogin=  USingleton::getInstance('CLogin');
            $USession=  USingleton::getInstance('USession');
            $FDatabase=  USingleton::getInstance('FDatabase');
            $VHome=  USingleton::getInstance('VHome');
            
            if ( $CLogin->checkLoggedIn() ){
                $result=$FDatabase->getDocUsername();
                $row=$result->fetch_assoc();
                $docUsername=$row['Username'];
                if ( $USession->get('username')==$docUsername){
                    $CPatientsDB=USingleton::getInstance('CPatientsDB');
                }
                else {//utente loggato ma non medico
                    $this->addLoginBox();
                    $message="Solo il medico pu&oacute accedere a questa sezione";
                    $VHome->showMessage($message);
                    $VHome->showHome();
                }
            }
            else {//utente non loggato
                $this->addLoginBox();
                $message="Per accedere al DB &eacute necessario effettuare il login";
                    $VHome->showMessage($message);
                    $VHome->showHome();
            }
        }




}