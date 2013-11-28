<?php
    $userdata=$_SESSION["userdata"];
    if(!isset($_REQUEST["action"])){
        $action="";
    }
    else{
        $action=$_REQUEST["action"];
    }
    if(isset($userdata->userType)){
        switch($action){
            case "editOrders":
                #for editing orders
                include "adm-editOrders.php";
                break;
            default:
                # main view
                include "disp-main.php";
                break;
        }
    }
    else{
        echo "you got no business here!";
    }
?>