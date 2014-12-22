<?php 


class CPatientsDB{

	private $patientsArray=array();

	public function __construct(){
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		$this->fillArray();

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

			case 'printReport':
			$this->printReport();
			break;

			case 'modify':
			$this->modifyPatient();
			break;

			case 'delete':
			$this->deletePatient();
			break;

			default:
			$this->showHomePage();   
		}

	}

	private function showHomePage(){ // OK
		$FDatabase=USingleton::getInstance('FDatabase');
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		$USession=USingleton::getInstance('USession');
                
                $result=$FDatabase->getAllPatients();
		$link1="index.php?control=manageDB&action=getFullData&show=";
		$numRows=0;

		while ( $row=$result->fetch_assoc() ){
				$Patients[$numRows]=array('name'=>$row['Nome'],'surname'=>$row['Cognome'],'cf'=>$row['Codice Fiscale'],'link'=>md5($row['Codice Fiscale']));
				$numRows++;                                
                }
                
                $this->addLogoutButton();
                $VPatientsDB->showHomeDB($Patients,$link1); 
	}

	private function insertPatient(){ //OK
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		if( $VPatientsDB->get('sent') ){
                    $FDatabase=USingleton::getInstance('FDatabase');
                    
                    $dataArray=array('name'=>$_REQUEST['name'],
                                     'surname'=>$_REQUEST['surname'],
				     'gender'=>$_REQUEST['gender'],
				     'dateBirth'=>$_REQUEST['dateBirth'],
				     'CF'=>$_REQUEST['CF'],
				     'dateCheck'=>$_REQUEST['dateCheck'],
				     'medHistory'=>$_REQUEST['medHistory'],
				     'medExam'=>$_REQUEST['medExam'],
				     'conclusions'=>$_REQUEST['conclusions'],
				     'toDoExams'=>$_REQUEST['toDoExams'],
				     'terapy'=>$_REQUEST['terapy'],
				     'checkup'=>$_REQUEST['checkup']);
                    
                    $FDatabase->insertNewPatient($dataArray);
                    $message="Inserimento avvenuto con successo";
                    $this->addLogoutButton();
                    $VPatientsDB->showMessage($message);
		}
		else {
                    $this->addLogoutButton();
                    $VPatientsDB->showInsertForm();			
		}	
	}

	private function searchPatient(){ //OK
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
                
		if($VPatientsDB->get('keyValue')==null) {
                    $this->addLogoutButton();
                    $VPatientsDB->showSerachForm();
		}
		else {
			$FDatabase=USingleton::getInstance('FDatabase');
			$searchKey=$VPatientsDB->get('keyValue');
			$query="SELECT `Nome`,`Cognome`,`Codice Fiscale` FROM `pazienti` WHERE `Nome`='".$searchKey."' or `Cognome`='".$searchKey."' or `Codice Fiscale`='".$searchKey."'"; //aggiungere caso cognome e CF
			$result=$FDatabase->findPatient($searchKey);

			$numRows=0;
			$results=array();
                        
			while ( $row=$result->fetch_assoc() ){				
				$results[$numRows]=array('name'=>$row['Nome'],'surname'=>$row['Cognome'],'cf'=>$row['Codice Fiscale'],'link'=>md5($row['Codice Fiscale']));
				$numRows++;
				}
                                
			if ( $numRows!=0 ) {
				$message="la ricerca ha prodotto ".$numRows." risultato/i";
                                $link1="index.php?control=manageDB&action=getFullData&show=";
                                $this->addLogoutButton();
                                $VPatientsDB->showSearchResult($message,$results,$link1,$numRows);
			}

	        else {
	        	$message="La ricerca non ha prodotto nessun risultato";
                        $this->addLogoutButton();
	        	$VPatientsDB->showMessage($message);
	        }
	    }
	}

	private function showPatientDetails(){ //OK
		$VPatientsDB=Usingleton::getInstance('VPatientsDB');
		$FDatabase=Usingleton::getInstance('FDatabase');
		$cf=$VPatientsDB->get('show');
                $result=$FDatabase->getPatientDetail($cf);
                
		while ( $row=$result->fetch_assoc() ){ //passare direttamente $result a VPatientsDB ?
                    
                    $info=array('name'=>$row['Nome'], //usare $patientsArray ?
				'surname'=>$row['Cognome'],
				'gender'=>$row['Sesso'],
				'dateBirth'=>$row['DataNascita'],
				'CF'=>$row['Codice Fiscale'],
				'dateCheck'=>$row['DataVisita'],
				'medHistory'=>$row['Anamnesi'],
				'medExam'=>$row['Esame Obiettivo'],
				'conclusions'=>$row['Conclusione'],
				'toDoExams'=>$row['Prescrizione Esami'],
				'terapy'=>$row['Terapia'],
				'checkup'=>$row['Controllo']);
		}
                $this->addLogoutButton();
                $VPatientsDB->showPatientDetail($info);
	}


	private function printReport(){ //OK
		$VPatientsDB=USingleton::getInstance('VPatientsDB');

		for ($i=0;$i<count($this->getPatientsArray());$i++) {
				if( md5($this->getPatientsArray()[$i]['cf'])==$VPatientsDB->get('pat') ) {
					$cfPatient=$this->getPatientsArray()[$i]['cf'];
					$row=$i;
				}
			}

		if ( $VPatientsDB->get('fields')=="sent" ){

				$Updf=USingleton::getInstance('Updf');
                                $patArray=$this->getPatientsArray()[$row];
				$patInfo=$patArray['name']." ".$patArray['surname'].", ".$patArray['dateBirth']." \n".$patArray['cf'];
				$arrayToPrint=array();

				foreach ($patArray as $key=>$value) {
					if ( $VPatientsDB->get($key) ) {
						$arrayPrint[$key]=$value;
					}
				}

				$Updf->printPage($patInfo,$arrayPrint);
		}
		else {
                    $link=md5($this->getPatientsArray()[$row]['cf']);
                    $this->addLogoutButton();
                    $VPatientsDB->showReportFields($link);			
		}
	}


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

	private function fillArray(){ //NOT OK non servirà più con le classi Entity
		$FDatabase=Usingleton::getInstance('FDatabase');
		$query="SELECT * FROM `pazienti`";
		$result=$FDatabase->queryDbSelect($query);
		while ( $row=$result->fetch_assoc() ){
			$this->patientsArray[]=array('name'=>$row['Nome'],
				                     'surname'=>$row['Cognome'],
				                     'gender'=>$row['Sesso'],
				                     'dateBirth'=>$row['DataNascita'],
				                     'cf'=>$row['Codice Fiscale'],
				                     'dateCheck'=>$row['DataVisita'],
				                     'medHistory'=>$row['Anamnesi'],
				                     'medExam'=>$row['Esame Obiettivo'],
				                     'conclusions'=>$row['Conclusione'],
				                     'toDoExams'=>$row['Prescrizione Esami'],
				                     'terapy'=>$row['Terapia'],
				                     'checkup'=>$row['Controllo']);
				}
		}

	private function getPatientsArray(){
		return $this->patientsArray;
	}
        
        public function addLogoutButton(){
            $USession=  USingleton::getInstance('USession');
            $VPatientsDB=  USingleton::getInstance('VPatientsDB');
            
            $username=$USession->get('username');
            $VPatientsDB->addLogoutButton($username);
        }
}




