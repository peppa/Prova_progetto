<?php


//rinominare cclinica in chome
class CClinica {  

	public function __construct() {

		$session=USingleton::getInstance('USession');
		$view=Usingleton::getInstance('VClinica'); //vclinica va chiamato vhome
		
		//controllo se utente loggato
		if($session->checkLogged()==true){  //
			$view->assign('loggedIn',true);
			$view->assign('username',$session->get('username'));
		}
		else {$view->assign('loggedIn',false);} //gli assign li deve fare vhome
		


		$action=$view->get('controllerAction');
		switch ($action) {

			case 'Home':
			$view->display('home.tpl');
			break;

			case 'Login':
			$login=USingleton::getInstance('CLogin');
			$login->manageLogin();
			//if($view->get('remember')){$session->createCookiePerm();}
			//	else {$session->createCookieTemp();}
			//$view->assign('loggedIn',true);
			//$view->display('home.tpl');
			break;

			case 'Logout':
			$login=USingleton::getInstance('CLogin');
			$login->logout();
			$view->display('home.tpl');
			break;

			case 'manageDB':
			$patients=USingleton::getInstance('CPatientsDB'); //lanciare la funzione impostaHome
			break;

			case 'About':
			$view->display('about.tpl');
			break;

			case 'Services':
			$view->display('services.tpl');
			break;

			case 'Registration':
			$registration=USingleton::getInstance('CRegistration');
			break;

			case 'Contacts':
			$view->display('contact.tpl');
            break;


			default:
			$view->display('home.tpl');
		}
		
	}
}