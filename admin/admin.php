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
                
                if(isset($_REQUEST["subAct"])){
                    $subAct=$_REQUEST["subAct"];
                    switch($subAct){
                        case 'adduser':
                            if(isset($_REQUEST["newUsername"]) && isset($_REQUEST["newPass"]) && isset($_REQUEST["newPassRepeat"]) && isset($_REQUEST["newUserType"]) ){
                                $newUser=$_REQUEST["newUsername"];
                                $newPass=$_REQUEST["newPass"];
                                $newPassRepeat=$_REQUEST["newPassRepeat"];
                                $newUserType=$_REQUEST["newUserType"];
                                if(empty($newUser)||empty($newPass)||empty($newPassRepeat)){
                                    echo "empty";
                                }
                                else{
                                    if($newPass==$newPassRepeat){
                                        echo $newUser." ".$newPass." ".$newPassRepeat." ".$newUserType;
                                        #add to base
                                    }
                                    else{
                                        echo "passwords dont match";
                                    }    
                                }
                                
                            }
                            else{
                                echo "one or more fields was empty";
                            }
                            break;
                        case 'deleteuser':
                            break;
                        case 'updateuser':
                            break;
                    }
                }
                include("adm-users.php");
                break;
            case "editOrders":
                #for editing orders
                include "adm-editOrders.php";
                break;
            default:
                # main view
                header("location:http://localhost/");
                break;
        }
    }
    else{
        echo "you got no business here!";
    }
?>