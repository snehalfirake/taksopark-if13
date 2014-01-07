<?php
session_start();
  if(!($_SESSION["roll"]=="kasutaja")){
    header("Location: login.php");
	exit();
  }
 require_once("konf.php");
 if(isSet($_REQUEST["sisestusnupp"])){
 $kask=$yhendus->prepare(
 "INSERT INTO tellimus(kasutajanimi, algpunkt, lopp_punkt, tel_nr) VALUES (?,?,?,?)");
 
$kask->bind_param("ssss", $_SESSION["kasnimi"], $_REQUEST["algpunkt"], $_REQUEST["sihtpunkt"], $_REQUEST["telefon"]);
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
 Sisse logitud <?php echo $_SESSION["roll"]." ".$_SESSION["kasnimi"]; ?>
 <h1>Takso tellimine</h1>
 <?php
 if(isSet($_REQUEST["id"])){
 }
 ?>
<form action="?">
 <dl>
 <dt>Sisesta tellimus:</dt>
<dd>Alguspunt<input type="text" name="algpunkt" /></dd>
<dd>Sihtpunkt<input type="text" name="sihtpunkt" /></dd>
<dd>Telefoni nr.<input type="text" name="telefon" /></dd>
 <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>
 </dl>
</form>

</body>
</html>