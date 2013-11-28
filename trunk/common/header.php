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
    <link rel="stylesheet" type="text/css" href="http://localhost/css/style.css">
    
</head>
<body>
<h1>TaxiApp</h1>


   