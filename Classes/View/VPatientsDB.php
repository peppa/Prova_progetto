<?php
//require_once './Classes/View/View.php';

class VPatientsDB extends View {

    public function loadHomePage(){
    	$body=$this->fetch('body_DB.tpl');
    	$this->assign('body',$body);
    }

    public function showHomePage(){
    	$this->display('home.tpl');  //rinominare in main.tpl
    }
    
    public function showHomeDB($arrayPat,$link){
        $this->assign('people',$arrayPat);
        $this->assign('part1',$link);
        $body=$this->fetch('body_DB.tpl');
    	$this->assign('body',$body);        
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showPatientDetail($arrayInfo){
        $this->assign('name',$arrayInfo['name']);
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
        $this->assign('link',md5($arrayInfo['CF']));
        
        $body=$this->fetch('patient_detail.tpl');
        $this->assign('body',$body);
        
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showInsertForm(){
        $body=$this->fetch('body_insertPatient.tpl');
        $this->assign('body',$body);
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showMessage($mess){
        $this->assign('body',$mess);
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showSearchResult($message,$patients,$link,$numResults){
        $this->assign('numResults',$numResults);
        $this->assign('message',$message);
        $this->assign('rows',$patients);
        $this->assign('part1',$link);
        $body=$this->fetch('body_resultSearch.tpl');
        $this->assign('body',$body);
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showSerachForm(){
        $body=$this->fetch('body_searchPatient.tpl');
        $this->assign('body',$body);
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showReportFields($link){
        $this->assign('link',$link);
        $body=$this->fetch('body_reportFields.tpl');
        $this->assign('body',$body);
       // $this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showModPage($arrayRow){
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
        $this->assign('body',$body);        
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function showConfirmPage($cf){
        $this->assign('link',md5($cf));
        $body=$this->fetch('body_confirmPage.tpl');
        $this->assign('body',$body);
        //$this->loadLogoutButton();
        $this->showHomePage();
    }
    
    public function addLogoutButton($user){
        $this->assign('username',$user);
        $logBox=$this->fetch('loggedIn.tpl');
        $this->assign('loginBox',$logBox);
    }

}