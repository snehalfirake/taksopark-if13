<?php

    ### index.php
    ### this is what the client will be using and it is pretty much all we'll need from an index file for now.
    
    ### Get some configs and functions;
    
    include("../core/conf.php");
    
    ### Check if env is set
    
    switch($sitevar->env){
        case "DEV":
            error_reporting(E_ALL);
            break;
        case "TEST":
        case "PROD":
            error_reporting(0);
            break;
        default:
            exit("no environment described - bye:)");
    }
    
    ### test server connection and render frontpage if not logged in;
    
    include($sitevar->templatesPath."header.php");
        
        if($sitevar->status=="up"){
            ### get frontpage
            include($sitevar->templatesPath."main.php");
            if(!empty($_SESSION["userdata"]["username"])){
                echo "<a href='?logout=1'>logout</a>";
            }
            
            #close connection;
            $dbc->close();
        }
        else{
            array_push($sitevar->err,array("type"=>"DB","err"=>"No connection was made."));
            predump($sitevar->err);
        }
    
    include($sitevar->templatesPath."footer.php");

?>

