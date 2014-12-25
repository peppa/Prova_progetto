<?php
class CLogin{

	public function manageLogin(){
		$VLogin=USingleton::getInstance('VLogin');
		$USession=USingleton::getInstance('USession');
		$FDatabase=USingleton::getInstance('FDatabase');

		$user=$VLogin->get('username');
		$pass=$VLogin->get('password');
                $keep=$VLogin->get('keepLogged');
		if($keep=="yes") {$remember=true;}  
		else {$remember=false;}
		$USession->keepAccess($remember);
		if($FDatabase->checkUser($user,$pass)) {

                    $USession->login($user,$pass);
                    $VLogin->loadLogoutButton();
                    $this->showWelcomePage();
                }

		else  {/*user o pass non corretti*/
                    $VLogin->loadLoginForm();
                    $this->showErrorPage();
		}
                $VLogin->showHome();
	}

	public function logout(){
		$USession=Usingleton::getInstance('USession');
		$VLogin=USingleton::getInstance('VLogin');
		$USession->logout();
                
                $VLogin->loadLoginForm();
                $VLogin->assign('body',"logout effettuato con successo");
		$VLogin->showHome();
	}
        
        public function checkLoggedIn(){
            $USession=USingleton::getInstance('USession');
            
            if ( $USession->get('username') ){
                return true;
            }
            else {
                return false;
            }
        }
        
        public function showWelcomePage(){  //riunire in un'unica funzione
            $VLogin=  USingleton::getInstance('VLogin');
            $message="login effettuato con successo";
            $VLogin->WelcomePage($message);
        }
        
        public function showErrorPage(){
            $VLogin=  USingleton::getInstance('VLogin');
            $message="user o pass non corretti";
            $VLogin->errorPage($message);
        }
        
        
        
}