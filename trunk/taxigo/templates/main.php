<?php
    
    ### main.php
    ### directs user by usertype to its right main action router file
    
    ### uses $_SESSION["userdata"] which gets put together in login.php (userdatas usertype may be left blank in that case the login did not happen)
    ### also the logout is described here ?logout=1 

    if( isset($_SESSION["userdata"]["typeName"]) && !empty($_SESSION["userdata"]["typeName"])){
        $usertype=$_SESSION["userdata"]["typeName"];
    }
    else{
        $usertype="";
    }
        
        switch($usertype){
            case "admin":
                include($sitevar->templatesPath."admin/admin-main.php");
                break;
            case "dispatcher":
                include($sitevar->templatesPath."dispatcher/dispatcher-main.php");
                break;
            case "driver":
                include($sitevar->templatesPath."driver/driver-main.php");
                break;
            default:
                include($sitevar->templatesPath."user/user-main.php");
                break;
        }
    
    if(isset($_REQUEST["logout"])){
        $logout=$_REQUEST["logout"];
        if($logout==="1"){
            session_destroy();
            header("location:http://localhost/");
        }
    }

?>