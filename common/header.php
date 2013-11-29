<?php
    
    session_start();
    if(isset($_SESSION["userdata"])){
        $userdata=$_SESSION["userdata"];    
    }
?>
<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/css/bootstrap.min.css"/>
    <link rel="stylesheet/less" type="text/css" href="http://localhost/css/main.less"/>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
    
</head>
<body>
    <div class="container">
        <div id="appTitle">
            <h1><a href="/">Taxigo</a></h1>
            <p>get a taxi and go where ever you want to go.</p>    
        </div>


<?php
    if(isset($userdata->username)){?>
        <p>you are loged in as <?php echo $userdata->username ?></p>
    
    <?php
    }
?>

   