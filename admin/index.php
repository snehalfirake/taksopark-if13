<?php
    include("../common/header.php");
    # Include functions.php
    include('../common/functions.php');
    
    $taxiDB=new mysqli("localhost", "taxi", "taxipass", "taxi");
    if($taxiDB){
	#echo "Connected to database<br/>";
	# Get variables
	
	# Check Session status
	if (session_status() !== PHP_SESSION_ACTIVE) {
	    session_start();
	}
    
	# Get allowed user types from the DB put them into an array;
	$userTypesArray=array();
	$getAllowedUserTypes=$taxiDB->prepare("select typeName from userTypes");
	$getAllowedUserTypes->bind_result($userTypes);
	$getAllowedUserTypes->execute();
	while($getAllowedUserTypes->fetch()){
	    array_push($userTypesArray,$userTypes);
	}
	
	# Check if userType has been set
	$err="";
	if(isset($_SESSION["userdata"]->userType)){
	    $userType=$_SESSION["userdata"]->userType;
	    $username=$_SESSION["userdata"]->username;
	    $userid=$_SESSION["userdata"]->userid;
	    
	    #echo "asd:".$userType." ".$username." ".$userid;
	}
	else{
		
	    $userType="";
	    $username="";
	    $passwd="";
	    $userid="";
	    $data=new stdClass();
	    
	    if(isset($_REQUEST["username"])){
		$username=$_REQUEST["username"];
		$getUID=$taxiDB->prepare("SELECT userID from users where username=? and validUser=1");
		$getUID->bind_param("s",$username);
		$getUID->bind_result($userid);
		$getUID->execute();
		while($getUID->fetch()){
		    $data->userid=$userid;
		    $data->username=$username;
		}
	    }
	    else{
		$err.="bad username<br/>";
	    }
	    
	    if(isset($_REQUEST["password"])){
		$passwd=$_REQUEST["password"];
		$getUserType=$taxiDB->prepare("SELECT userType from users where userID=? AND username=? AND password=? AND validUser=1");
		$getUserType->bind_param("iss",$data->userid,$data->username,$passwd);
		$getUserType->bind_result($userType);
		$getUserType->execute();
		while($getUserType->fetch()){
		    $data->userType=$userType;
		}
		if(in_array($userType,$userTypesArray)){
		    $_SESSION['userdata']=$data;
		}
	    }
	    else{
		$err.="bad password<br/>";
	    }
	}
	if($err){
	    $pass="noPass";
	}
	else{
	    $pass="pass";
	}
	
	switch($pass){
	    case 'pass':
		switch ($userType) {
		    case 'dispatcher':
			include('dispatcher.php');
			break;
			    
		    case 'admin':
			include('admin.php');
			break;
		    
		    case 'driver':
			include('driver.php');
			break;
		    
		    default:
			include('nopremissions.php');
			break;
		    }
		    break;
		case 'noPass':
		    echo $err;
		    ?>
		    
		    <form action="" method="post">
			<fieldset>
			    <div>
				<label for="username">User</label><br>
				<input type="text" name="username"/>
			    </div>
			    <div>
				<label for="password">Password</label><br>
				<input type="password" name="password"/>
			    </div>
			    <div>
				<button type="submit">Log in</button>
			    </div>
			</fieldset>
		    </form>
		    <a href="/">back</a>
		    
		    <?php
		    break;
		default:
		    echo "what is this?";
	    }
	
	# Check if the user is loged in, if is loged in get premissions.
    }
    else{
	echo "no connection";
    }
    

    # KEEP SHIT READABLE! 
    include("../common/footer.php");
?>
