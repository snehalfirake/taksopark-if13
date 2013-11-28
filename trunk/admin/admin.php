<?php
    $userdata=$_SESSION["userdata"];
    if(!isset($_REQUEST["action"])){
        $action="";
    }
    else{
        $action=$_REQUEST["action"];
    }
    if(isset($userdata->userType)=="admin"){
        include("adm-menu.php");
    
        switch($action){
            case "editUsers":
                #for editing users
                include("adm-users.php");
                break;
            case "editOrders":
                #for editing orders
                include "adm-editOrders.php";
                break;
            default:
                # main view
                include "adm-main.php";
                break;
        }
    }
    else{
        echo "you got no business here!";
    }
?>