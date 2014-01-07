<?php
    
    ### user-main.php
    ### this will be for logged in users and for users who haven't yet logged in
    ### it will mainly contain includes to templates when finished.
    
    if($usertype=="user"){
        echo "this is for logged in user";
    }
    if($usertype==""){
        
        ## ask for a login form
        include($sitevar->actionsPath."login.php");  
    }



?>