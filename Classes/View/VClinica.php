<?php


//rinominare vclinica in view, tutte le altre view estendono questa
class VClinica extends View { 
    
    public function get($key) {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        else {
            return false;
        }
    }
    
    //qua dentro ci vanno tutte funzioni tipo getqualcosa, getstocazzo... 
    //ma comunque boh
    
    //sta classe a che serve?? booh non ci sta na pagina clinica.. o si?
    //o ci intendi la gestione database???
    //è la view di cclinica ma cclinica è un controllore che non deve visualizzare...
    
} 


	