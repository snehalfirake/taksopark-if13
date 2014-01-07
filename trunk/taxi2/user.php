<?php
session_start();
  if(!($_SESSION["roll"]=="kasutaja")){
    header("Location: login.php");
	exit();
  }
 require_once("konf.php");
 if(isSet($_REQUEST["sisestusnupp"])){
 $kask=$yhendus->prepare(
 "INSERT INTO tellimused(kasutajanimi, algpunkt, lopp_punkt, tel_nr, kinnitatud, valmis) VALUES (?, )");
 
$kask->bind_param("s", $_REQUEST["kasutajanimi"], $_REQUEST["algpunkt"], $_REQUEST["sihtpunkt"], $_REQUEST["telefon"]);
$kask->execute();
$yhendus->close();
exit();
 }
?>
<!doctype html>
<html>
 <head>
 <link rel="stylesheet" type="text/css" href="kujundus.css">
 <title>Tellimine</title>
 </head>
 <body>
 <h1>Takso tellimine</h1>
 <?php
 if(isSet($_REQUEST["id"])){
 }
 ?>
<form action="?">
 <dl>
 <dt>Sisesta tellimus:</dt>
<dd><input type="text" name="kasutajanimi" /></dd>
<dd><input type="text" name="algpunkt" /></dd>
<dd><input type="text" name="sihtpunkt" /></dd>
<dd><input type="text" name="telefon" /></dd>
 <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>
 </dl>
</form>
</body>
</html>