<?php
    
    ### action=adduser
    ### This is for adding users to database
   
    ### Get variables from the template: admin-adduser when the form gets submited
    
    if(isset($_REQUEST["usertype"])){
        $usertype=$_REQUEST["usertype"];
        echo $usertype;
    };
    if(isset($_REQUEST["username"])){
        $username=$_REQUEST["username"];
        echo $username;
    };
    if(isset($_REQUEST["passwd"])){
        $passwd=$_REQUEST["passwd"];
        echo $passwd;
    };
    if(isset($_REQUEST["passwdretype"])){
        $passwdretype=$_REQUEST["passwdretype"];
        echo $passwdretype;
    };
    if(isset($_REQUEST["valid"])){
        $validuser=$_REQUEST["valid"];
        echo $validuser;
    };
    
    # crypt the password
    # Add data to users table
    
?>


<?php

    ### Include template
    ### sidenote: this may change;
    
    include($sitevar->templatesPath."admin/admin-adduser.php");
    
?>