<?php

class VPatientsDB extends View {

    public function loadHomePage(){
    	$body=$this->fetch('body_DB.tpl');
    	$this->setBody($body);
    }


    
    public function fetchHomePatients($arrayPat){
        $this->assign('people',$arrayPat);
        //$this->assign('part1',$link); 
        return $body=$this->fetch('body_DB.tpl');
    	//$this->setBody($body);
        //$this->showPage();
    }
    
    public function getPatientDetail($arrayInfo){
        /*$this->assign('name',$arrayInfo['name']);
        $this->assign('surname',$arrayInfo['surname']);
        $this->assign('gender',$arrayInfo['gender']);
        $this->assign('dateBirth',$arrayInfo['dateBirth']);
        $this->assign('CF',$arrayInfo['CF']);
        $this->assign('dateCheck',$arrayInfo['dateCheck']);
        $this->assign('medHistory',$arrayInfo['medHistory']);
        $this->assign('medExam',$arrayInfo['medExam']);
        $this->assign('conclusions',$arrayInfo['conclusions']);
        $this->assign('toDoExams',$arrayInfo['toDoExams']);
        $this->assign('terapy',$arrayInfo['terapy']);
        $this->assign('checkup',$arrayInfo['checkup']);
        $this->assign('link',md5($arrayInfo['CF']));*/
        $this->assign('info',$arrayInfo);
        
        $body=$this->fetch('body_patientDetail.tpl');
        return $body;
        //$this->assign('body',$body);
        //$this->setBody($body);

        //$this->showPage();
    }
    
    public function showInsertForm(){
        $body=$this->fetch('body_insertPatient.tpl');
        return $body;
        //$this->setBody($body);
        //$this->showPage();
    }
    
    public function getFormattedMessage($mess){ //implementare funz. generica in View che mostra il template
        return $mess; //va fatto il template che ci mette un div apposito
        //$this->showPage();
    }
    
    public function getSearchResult($message,$patients,$numResults){
        $this->assign('numResults',$numResults);
        $this->assign('message',$message);
        $this->assign('rows',$patients);
        $body=$this->fetch('body_resultSearch.tpl');
        return $body;
        //$this->assign('body',$body);
        //$this->showPage();
    }
    
    public function fetchSerachForm(){
        $body=$this->fetch('body_searchPatient.tpl');
        //$this->assign('body',$body);
        //$this->loadLogoutButton();
        //$this->showPage();
        return $body;
    }
    
    public function getReportFields($cf,$ch){
        $this->assign('patLink',$cf);
        $this->assign('checkLink',$ch);
        $body=$this->fetch('body_reportFields.tpl');
        //$this->assign('body',$body);
        //$this->showPage();
        return $body;
    }
    
    public function getModPage($arrayRow){
        $this->assign('name',$arrayRow['name']);
	$this->assign('surname',$arrayRow['surname']);
                                        
	if (strtoupper($arrayRow['gender'])=="M") {
            $this->assign('checkedM',"checked");
            $this->assign('checkedF',"");
            
        }
	else {
            $this->assign('checkedF',"checked");
            $this->assign('checkedM',"");
            
        }                                        
	
        $this->assign('dateBirth',$arrayRow['dateBirth']);
	$this->assign('cf',$arrayRow['cf']);
	$this->assign('medHistory',$arrayRow['medHistory']);
	$this->assign('medExam',$arrayRow['medExam']);
        $this->assign('conclusions',$arrayRow['conclusions']);
        $this->assign('toDoExams',$arrayRow['toDoExams']);
        $this->assign('terapy',$arrayRow['terapy']);
        $this->assign('checkup',$arrayRow['checkup']);
        $this->assign('link',md5($arrayRow['cf']));
        $body=$this->fetch('body_modifyPatient.tpl');
        //$this->assign('body',$body);        
        //$this->loadLogoutButton();
        //$this->showPage();
        return $body;
    }
    
    public function showConfirmPage($cf){
        $this->assign('link',md5($cf));
        $body=$this->fetch('body_confirmPage.tpl');
        //$this->assign('body',$body);
        //$this->loadLogoutButton();
        //$this->showPage();
        return $body;
    }
    
    public function addLogoutButton($user){
        $this->assign('username',$user);
        $logBox=$this->fetch('loggedIn.tpl');
        $this->assign('loginBox',$logBox);
    }
    
    public function getPatientChecks($na,$sur,$array,$link){
        $this->assign('pat',$link);
        $this->assign('PatChecks',$array);
        $this->assign('name',$na);
        $this->assign('surname',$sur);
        $body=$this->fetch('body_patientChecks.tpl');
        //$this->assign('body',$body);
        //$this->showPage();
        return $body;
    }
    
    public function showCheckForm($cf,$n,$s){
        $this->assign('CF',$cf);
        $this->assign('name',$n);
        $this->assign('surname',$s);
        $body=$this->fetch('body_newVisit.tpl');
        //$this->assign('body',$body);
        //$this->showPage();
        return $body;
    }

}