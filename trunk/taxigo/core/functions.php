<?php
    
    ### Functions.php
    ### this is for custom functions that may be needed to ease the job.
    
    
    ### pretty var_dump
    ### used to see readable array or object dumps
    
    function predump($var){
        if(isset($var)){
            echo "<pre>";
                var_dump($var);
            echo "</pre>";
        }   
    }
    
    
    ### function for testing both isset and empty;
    ### this ain't working so well.
    
    function isemt($var){
        
        if(!empty($var)==false){
            return false;
        }
        else{
            if(isset($var)==false){
                return false;
            }
            else{
                return true;
            }
        }   
    }


?>