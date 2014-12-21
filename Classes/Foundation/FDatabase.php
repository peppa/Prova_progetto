<?php 

//require_once "./Configuration files/DBConfiguration.php";

class FDatabase extends mysqli{

	public function __construct(){
		global $config;
		parent::__construct($config['mysql']['host'],$config['mysql']['user'],$config['mysql']['password'],$config['mysql']['database']);
		//mysql_connect();

	}

	public function insertUser($field1,$field2,$field3,$field4,$field5,$field6){
		$query1="INSERT INTO `clinica`.`utenti` (`Nome`, `Cognome`, `Codice Fiscale`, `Email`, `Username`, `Password`, `Medico`)";
		$query2="VALUES ('".$field1."','".$field2."','".$field3."','".$field4."','".$field5."','".$field6."','0')";
		$query=$query1." ".$query2;
		//var_dump($query);
		//mysql_query($query);
		$this->query($query);

	}

	public function queryDb($passedQuery){
		$this->query($passedQuery);
	}

	public function queryDbSelect($passedQuery){
		$result=$this->query($passedQuery);
		return $result;
	}

	public function checkUser($user,$pass){
		$query="SELECT * FROM `utenti` WHERE `Username`='".$user."'";// and `Password`='".$pass."'";
		$res=$this->query($query);
                
                $result=$res->fetch_assoc();
                if ($result==NULL) return false;
                else {
                    if ($pass==$result['Password']) return true;
                    else return false;
                }
                
		/*while ( $row=$res->fetch_assoc() ){
			$value=$row['Password'];
		}*/

		//if ($pass==$value) return true;
		//else return false;*/



		//if(count($res)!=0) $result=true;
		//else $result=false;
		/*$key=$this->getByUsername($user);
		if($key!=false && $password==$key->getPassword()) {$result=true;}
		else {$result=false;}*/
//		return $result;

	}
        
        
        public function getPatientDetail($encryptedCF){
            $cfPatient=$this->findCodFisc($encryptedCF);
            $query="SELECT * FROM `pazienti` WHERE `Codice Fiscale`='".$cfPatient."'";
            $result=$this->query($query);
            return $result;
        }
        
        public function findCodFisc($encryptedCF){
            $query="SELECT `Codice Fiscale` FROM `pazienti`";
            $result=$this->query($query);
            
            while ( $row=$result->fetch_assoc() ){
                $codFisc=$row['Codice Fiscale'];
                if ( md5($codFisc)==$encryptedCF ) {
                    $cfPatient=$codFisc;                    
                }
		}
                return $cfPatient;            
        }
        
        public function insertNewPatient($array){
            $query1="INSERT INTO `clinica`.`pazienti`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Codice Fiscale`, `DataVisita`, `Anamnesi`, `Esame Obiettivo`, `Conclusione`, `Prescrizione Esami`, `Terapia`, `Controllo`)";
            $query2="VALUES ('".$array['name']."','".$array['surname']."','".$array['gender']."','".$array['dateBirth']."','".$array['CF']."','".$array['dateCheck']."','".$array['medHistory']."','".$array['medExam']."','".$array['conclusions']."','".$array['toDoExams']."','".$array['terapy']."','".$array['checkup']."')";
            $query=$query1." ".$query2;
            $this->query($query);            
        }
        
        public function findPatient($key){
            $query="SELECT `Nome`,`Cognome`,`Codice Fiscale` FROM `pazienti` WHERE `Nome`='".$key."' or `Cognome`='".$key."' or `Codice Fiscale`='".$key."'";
            $result=$this->query($query);
            return $result;
        }
        
        public function getAllPatients(){
            $query="SELECT `Nome`,`Cognome`,`Codice Fiscale` FROM `pazienti`";
            $result=$this->query($query);
            return $result;
        }
        
        public function deletePatient($cf){
            $query="DELETE FROM `pazienti` WHERE `Codice Fiscale`='".$cf."'";
            $this->query($query);
        }
        
        public function getDocUsername(){
            $query="SELECT `Username` FROM `utenti` WHERE `Medico`=1";
            $result=$this->query($query);
            return $result;
        }



}