<?php

/*
 * File creato da Carlo Centofanti
 */

/**
 * Description of FUtente
 *
 * @access public
 * @package FUtente
 * @author Carlo
 */
class FUtente extends FDatabase {
    
    public function usernameIsAvaiable($user) {
        $query="SELECT `username` FROM `utenti` WHERE `username`=".$user;
        $result=$this->query($query);
        if (!$result){return TRUE;}
        else {return FALSE;}
        
        
        
    }
    
}

?>