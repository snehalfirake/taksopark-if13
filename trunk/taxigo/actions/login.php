<?php
    
    ### Login.php
    ### form is shown when $_SESSION does not have the username.
    
    ### Request username and password
    
    if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])){
        
        $userInput=$_REQUEST["username"];
        $passInput=$_REQUEST["password"];
        
        
        if(empty($_SESSION["userdata"]["username"])){
            $userdata=new stdClass();
            $getUsers=$dbc->prepare("SELECT username,userType FROM users WHERE username=? and password=?");
            $getUsers->bind_param("ss",$userInput,$passInput);
            $getUsers->bind_result($username,$userType);
            $getUsers->execute();
            while($getUsers->fetch()){
                $userdata->type=$userType;
                $userdata->username=$username;
            }
            
            $userAllowed="no";
            if(isset($userdata->username) && !empty($userdata->username)){
                foreach($sitevar->allowedTypes as $allowed){
                    if($allowed["typeID"]===$userdata->type ){
                        $userAllowed="yes";
                        $userdata->typename=$allowed["typeName"];
                    }
                }
                //predump(in_array($userdata->type,$allowedTypes));
                
                if($userAllowed=="yes"){
                    $_SESSION['userdata']["username"]=$userdata->username;
                    $_SESSION['userdata']["typeID"]=$userdata->type;
                    $_SESSION['userdata']["typeName"]=$userdata->typename;
                    include($sitevar->templatesPath."main.php");
                }
            }
            else{
                header("location:http://localhost/");
            }
        }
    }
    
    else{
        
    ?>
    
    <form action="?" method="post">
        <div>
            <p>Kasutaja</p>
            <input type="text" name="username" value="" />
        </div>
        <div>
            <p>Parool</p>
            <input type="text" name="password" value=""/>
        </div>
        <button type="submit">Log In</button>
    </form>
    
    <?php 
}
?>

