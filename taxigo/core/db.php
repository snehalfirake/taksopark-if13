<?php

    ### db.php
    ### this is used to make Database connect and create(if needed) tables which are neccesary for the app to work.
    
    if(isset($sitevar->basePath)){
        
        $sitevar->dbUser="taxi";
        $sitevar->dbName="taxi";
        $sitevar->dbPass="taxipass";
        $sitevar->dbHost="gn94.zone.eu:3306";
        $sitevar->status="down";
        
        $dbc=new mysqli($sitevar->dbHost, $sitevar->dbUser, $sitevar->dbPass, $sitevar->dbName);
        if($dbc){
            $sitevar->status="up";
            
            ### Make tables if not exists + add usertypes
            /*$addUserTypesTable=$dbc->prepare("CREATE TABLE IF NOT EXISTS `usertypes` (
                                         
                                         `typeID` VARCHAR(16) NOT NULL,
                                         `typeName` VARCHAR(16) NOT NULL
                                         ) ENGINE=MEMORY;");
            $addUsersTable=$dbc->prepare("CREATE TABLE IF NOT EXISTS `users` (
                                         
                                         `userID` VARCHAR(16) NOT NULL,
                                         `userType` VARCHAR(16) NOT NULL,
                                         `username` VARCHAR(16) NOT NULL,
                                         `password` VARCHAR(16) NOT NULL,
                                         `valid` VARCHAR(16) NOT NULL,
                                         `added` datetime NOT NULL,
                                         
                                         
                                         ) ENGINE=MEMORY;");
            */
            ### Get allowed usertypes
            $allowedTypes=array();
            $getUserTypes=$dbc->prepare("SELECT typeID,typeName FROM usertypes");
            $getUserTypes->bind_result($typeID,$typeName);
            $getUserTypes->execute();
            while($getUserTypes->fetch()){
                $thisType=array("typeID"=>$typeID,"typeName"=>$typeName);
                array_push($allowedTypes,$thisType);
            }
            $sitevar->allowedTypes=$allowedTypes;
        }
    }
?>
