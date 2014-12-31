<?php 


class CPatientsDB{

    /**
     *Contiene tutti i pazienti nel DB
     * cambiare nome in Paztients ?
     * 
     * @var type array
     */
    public $Pazienti=array();
    /**
     *Contiene tutte le visite nel DB
     * cambiare nome in Visits ?
     * 
     * @var type array
     */
    public $Visite=array();

    
    /**
     *
     */
	public function __construct(){ 
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		$this->fillArrays();

		$action=$VPatientsDB->get('action');
		switch($action) {

			case 'insert':
			$this->insertPatient();
			break;

			case 'search':
			$this->searchPatient();
			break;

			case 'getFullData':
			$this->showPatientDetails();
			break;
                    
                        case 'getChecks':
                            $this->showPatientChecks();
                        break;

			case 'printReport':
			$this->printReport();
			break;

			case 'modify':
			$this->modifyPatient();
			break;

			case 'delete':
			$this->deletePatient();
			break;
                    
                        case 'newVisit':
                            $this->newVisit();
                        break;

			default:
			$this->showHomePage();   
		}

	}

        /**
         * Riempie gli array Pazienti e Visite
         */
        private function fillArrays(){ //OKv2
            $FPatient=  USingleton::getInstance('FPatient');
            $FCheckup=  USingleton::getInstance('FCheckup');
            
            $this->Pazienti=$FPatient->fillPatientsArray($this->Pazienti);
                
            for ( $i=0; $i<count($this->Pazienti); $i++){
                $this->Visite=$FCheckup->fillCheckupsArray($this->Visite,$this->Pazienti[$i]->getCf() );
            }
            //var_dump($this->Visite);
        }
        
    /**
     * 
     */    
    private function showHomePage(){ // OKv2
        $VPatientsDB=Usingleton::getInstance('VPatientsDB');
        $USession=USingleton::getInstance('USession');
        
                for ( $i=0; $i<count($this->Pazienti); $i++){
                    $Patients[$i]=array('name'=>$this->Pazienti[$i]->getName(),'surname'=>$this->Pazienti[$i]->getSurname(),'cf'=>$this->Pazienti[$i]->getCf(),'dateBirth'=>$this->Pazienti[$i]->getDataN(),'link'=>md5($this->Pazienti[$i]->getCf()));
                }
                
                $this->addLogoutButton();
                $VPatientsDB->showHomeDB($Patients);
    }

    /**
     * Inserisce una nuova riga sia nella tabella pazienti che in quella visite
     */
	private function insertPatient(){ //OKv2
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		if( $VPatientsDB->get('sent') ){
                    $FPatient=  USingleton::getInstance('FPatient');
                    $FCheckup=  USingleton::getInstance('FCheckup');
                    
                    $arrayPatient=array('name'=>$_REQUEST['name'],
                                        'surname'=>$_REQUEST['surname'],
				        'gender'=>$_REQUEST['gender'],
				        'dateBirth'=>$_REQUEST['dateBirth'],
				        'CF'=>$_REQUEST['CF']);
                    
		    $arrayCheck=array('CF'=>$_REQUEST['CF'],
                                      'dateCheck'=>$_REQUEST['dateCheck'],
			 	      'medHistory'=>$_REQUEST['medHistory'],
			 	      'medExam'=>$_REQUEST['medExam'],
				      'conclusions'=>$_REQUEST['conclusions'],
				      'toDoExams'=>$_REQUEST['toDoExams'],
				      'terapy'=>$_REQUEST['terapy'],
				      'checkup'=>$_REQUEST['checkup']);
                    
                    $FPatient->insertNewPatient($arrayPatient);
                    $FCheckup->insertNewCheckup($arrayCheck);
                    $message="Inserimento avvenuto con successo";
                    $this->addLogoutButton();
                    $VPatientsDB->showMessage($message);
		}
		else {
                    $this->addLogoutButton();
                    $VPatientsDB->showInsertForm();			
		}	
	}

        /**
         * La ricerca avviene per nome, cognome o codice fiscale, a seconda di cosa viene inserito nel campo cerca
         */
	private function searchPatient(){ //OKv2
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
                
		if($VPatientsDB->get('keyValue')==null) {
                    $this->addLogoutButton();
                    $VPatientsDB->showSerachForm();
		}
		else {
                    $FPatient=  USingleton::getInstance('FPatient');
		    $searchKey=$VPatientsDB->get('keyValue');
                    $searchResult=$FPatient->findPatient($searchKey);
                        $numResults=count($searchResult);
			if ( $numResults!=0 ) {
				$message="la ricerca ha prodotto ".$numResults." risultato/i";
                                $this->addLogoutButton();
                                $VPatientsDB->showSearchResult($message,$searchResult,$numResults);
			}

	        else {
	        	$message="La ricerca non ha prodotto nessun risultato";
                        $this->addLogoutButton();
	        	$VPatientsDB->showMessage($message);
	        }
	    }
	}

        /**
         * Visualizza i dettagli di una visita di un paziente
         */
	private function showPatientDetails(){ //OKv2
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
                $FPatient=  USingleton::getInstance('FPatient');
		$encCF=$VPatientsDB->get('p');
                $encCheck=$VPatientsDB->get('ch');
                
                $patientDetail=$this->buildInfoArray($encCF,$encCheck);
                
                $this->addLogoutButton();
                $VPatientsDB->showPatientDetail($patientDetail);
	}
        
        /**
         * Mette insieme i dati recuperati dall'array Pazienti e da quello Visite in un unico array che poi viene 
         * passato alla view per stamparlo
         * 
         * @param type $encryptedCF Codice fiscale preso dalla view
         * @param type $encryptedDateCheck Data della visita presa dalla view
         * @return type array
         */
        public function buildInfoArray($encryptedCF,$encryptedDateCheck){ //OKv2
            
            for ( $i=0; $i<count($this->Pazienti);$i++ ){ 
                if ( md5($this->Pazienti[$i]->getCF() )==$encryptedCF ) {//facio il ciclo su Pazienti perchè mi servono nome e cognome
                    $cfPaziente=$this->Pazienti[$i]->getCF();
                    $posP=$i;
                }
            }
            
            //conviene scrivere questi 2 cicli for in funzioni esterne perchè vengono richiamati più
            //volte nella classe
            
            for ( $i=0;$i<count($this->Visite[$cfPaziente]);$i++ ){
                if ( md5($this->Visite[$cfPaziente][$i]->getDateCheck())==$encryptedDateCheck ) {
                    $dateCH=$this->Visite[$cfPaziente][$i]->getDateCheck();
                    $posV=$i;
                }
            }
            
            $array=array('name'=>$this->Pazienti[$posP]->getName(),
                                 'surname'=>$this->Pazienti[$posP]->getSurname(),
                                 'gender'=>$this->Pazienti[$posP]->getSex(),
                                 'dateBirth'=>$this->Pazienti[$posP]->getDataN(),
                                 'CF'=>$this->Pazienti[$posP]->getCF(),
                                 'dateCheck'=>$this->Visite[$cfPaziente][$posV]->getDateCheck(),
                                 'medHistory'=>$this->Visite[$cfPaziente][$posV]->getMedHistory(),
                                 'medExam'=>$this->Visite[$cfPaziente][$posV]->getMedExam(),
                                 'conclusions'=>$this->Visite[$cfPaziente][$posV]->getConclusions(),
                                 'toDoExams'=>$this->Visite[$cfPaziente][$posV]->getToDoExam(),
                                 'terapy'=>$this->Visite[$cfPaziente][$posV]->getTerapy(),
                                 'checkup'=>$this->Visite[$cfPaziente][$posV]->getCheckup());
            return $array;
        }
        
        /**
         * Mostra tutte le visite fatte da un paziente
         */
        public function showPatientChecks(){ //OKv2
            $VPatientsDB=Usingleton::getInstance('VPatientsDB');
            $FPatient=  USingleton::getInstance('FPatient');
            $cf=$VPatientsDB->get('p');
            
            for ( $i=0; $i<count($this->Pazienti);$i++ ){ //scrivere su una funzione esterna ?
                if ( md5($this->Pazienti[$i]->getCF() )==$cf ) {//facio il ciclo su Pazienti perchè mi servono nome e cognome
                    $cfPaziente=$this->Pazienti[$i]->getCF();
                    $name=$this->Pazienti[$i]->getName();
                    $surname=$this->Pazienti[$i]->getSurname();
                }
            }
            $encCF=md5($cfPaziente);
            
            /* se prendo il CF da paziente questa funz. non mi serve
               la lascio perchè potrebbe servirmi dopo
             
            foreach ($this->Visite as $key => $value){ se prendo il CF da paziente questa funz. non mi serve
                if ( $cf==md5($key) ) {
                    $cfPaziente=$key;
                }
            }*/
            
            
            for ( $i=0;$i<count($this->Visite[$cfPaziente]);$i++ ){
                $patChecks[]=$this->Visite[$cfPaziente][$i]->getDateCheck(); //tutte le date delle visite del paziente
            }
            
            $this->addLogoutButton();
            $VPatientsDB->showPatientChecks($name,$surname,$patChecks,$encCF);
        }


        /**
         * Stampa il report di una visita di un paziente
         */
	private function printReport(){ //OKv2
		$VPatientsDB=USingleton::getInstance('VPatientsDB');
                $encCF=$VPatientsDB->get('pat');
                $encCH=$VPatientsDB->get('ch');
                
		if ( $VPatientsDB->get('fields')=="sent" ){
                    $Updf=USingleton::getInstance('Updf');
                    $patArray=$this->buildInfoArray($encCF, $encCH);
                    $patInfo=$patArray['name']." ".$patArray['surname'].", ".$patArray['dateBirth']." \n".$patArray['CF'];
                    $arrayToPrint=array();
                    
                    foreach ($patArray as $key=>$value) {
                        if ( $VPatientsDB->get($key) ) {
                            $arrayPrint[$key]=$value;                            
                        }
                    }
                    $Updf->printPage($patInfo,$arrayPrint);
		}
		else {
                    $this->addLogoutButton();
                    $VPatientsDB->showReportFields($encCF,$encCH);			
		}
	}


        /**
         * Va rifatta
         * Possibilità di modificare sia il paziente che una particolare visita
         */
	private function modifyPatient() { //NOT OK
		$VPatientsDB=USingleton::getInstance('VPatientsDB');
                
		if ( $VPatientsDB->get('mod')!="completed" ) {
			for ( $i=0;$i<count($this->getPatientsArray());$i++ ) { //usare while ?
				if (md5($this->getPatientsArray()[$i]['cf'])==$VPatientsDB->get('mod')) {
                                    $this->addLogoutButton();
                                    $VPatientsDB->showModPage($this->getPatientsArray()[$i]);
				}
			}
		}
                
		else {
			$cfCryp=$VPatientsDB->get('pat');
			for ($i=0;$i<count($this->getPatientsArray());$i++) {
				if (md5($this->getPatientsArray()[$i]['cf'])==$cfCryp) {
					$cfPatient=$this->getPatientsArray()[$i]['cf'];
				}
			}
			$FDatabase=Usingleton::getInstance('FDatabase');
                        //passare valori a FDatabase invece che query ?
			$query="UPDATE `pazienti` SET `Nome`='".$VPatientsDB->get('name')."',`Cognome`='".$VPatientsDB->get('surname')."',`Sesso`='".$VPatientsDB->get('gender')."',`DataNascita`='".$VPatientsDB->get('dateBirth')."',`DataVisita`='".$VPatientsDB->get('dateCheck')."',`Anamnesi`='".$VPatientsDB->get('medHistory')."',`Esame Obiettivo`='".$VPatientsDB->get('medExam')."',`Conclusione`='".$VPatientsDB->get('conclusions')."',`Prescrizione Esami`='".$VPatientsDB->get('toDoExams')."',`Terapia`='".$VPatientsDB->get('terapy')."',`Controllo`='".$VPatientsDB->get('checkup')."' WHERE `Codice Fiscale`='".$cfPatient."' ";
			$FDatabase->query($query);
                        $message="modifica completata con successo";
                        $this->addLogoutButton();
                        $VPatientsDB->showMessage($message);
		}
	}

        /**
         * Come ModifyPatient
         */
	private function deletePatient(){ //OK
		$VPatientsDB=USingleton::getInstance('VPatientsDB');
		$FDatabase=USingleton::getInstance('FDatabase');
                

		for ($i=0;$i<count($this->getPatientsArray());$i++) {
				if( md5($this->getPatientsArray()[$i]['cf'])==$VPatientsDB->get('pat') ) {
					$cfPatient=$this->getPatientsArray()[$i]['cf'];
				}
			}
                        
                        if ( $VPatientsDB->get('conf') ) {
                        $FDatabase->deletePatient($cfPatient);
                        $message="eliminazione completata con successo";
                        $this->addLogoutButton();
                        $VPatientsDB->showMessage($message);
                        }
                        else {
                            $this->addLogoutButton();
                            $VPatientsDB->showConfirmPage($cfPatient);
                        }

		}
                
        /**
         * Aggiunge una nuova visita alla lista delle visite di un paziente
         */
        public function newVisit(){ //OKv2
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            $FCheckup=  USingleton::getInstance('FCheckup');
            
            $encCF=$VPatientsDB->get('p');
            
                for ( $i=0; $i<count($this->Pazienti);$i++ ){ //scrivere su una funzione esterna ?
                    if ( md5($this->Pazienti[$i]->getCF() )==$encCF ) {
                        $cfPat=$this->Pazienti[$i]->getCF();
                        $name=$this->Pazienti[$i]->getName();
                        $surname=$this->Pazienti[$i]->getSurname();
                    }
                }
            
            if ( $VPatientsDB->get('sent')=="y"){ //query                
                
                $arrayCheck=array('CF'=>$_REQUEST['CF'],
                                  'dateCheck'=>$_REQUEST['dateCheck'],
			 	  'medHistory'=>$_REQUEST['medHistory'],
			 	  'medExam'=>$_REQUEST['medExam'],
				  'conclusions'=>$_REQUEST['conclusions'],
				  'toDoExams'=>$_REQUEST['toDoExams'],
				  'terapy'=>$_REQUEST['terapy'],
				  'checkup'=>$_REQUEST['checkup']);
                
                $FCheckup->insertNewCheckup($arrayCheck);
                $message="inserimento avvenuto con successo";
                $this->addLogoutButton();
                $VPatientsDB->showMessage($message);
                
            }
            else { //carica form                
                $this->addLogoutButton();
                $VPatientsDB->showCheckForm($cfPat,$name,$surname);                
            }
        }
        
        /**
         * Col nuovo modo in cui è progettato il sito questo non servirà più
         */
        public function addLogoutButton(){ 
            $USession=  USingleton::getInstance('USession');
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            
            $username=$USession->get('username');
            $VPatientsDB->addLogoutButton($username);
        }
}




