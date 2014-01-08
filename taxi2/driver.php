<?php
session_start();
  if(!($_SESSION["roll"]=="autojuht")){
    header("Location: login.php");
	exit();
  }

require('konf.php');
if(isSet($_REQUEST["kinnitamise_id"])){
$kask=$yhendus->prepare("UPDATE tellimus SET vastuvoetud=1 WHERE id=?");
$kask->bind_param("i", $_REQUEST["kinnitamise_id"]);
$kask->execute();
}
?>
<!doctype html>
<html>
<head>
	<img src="pildid/taxigo1.jpg" alt="logo" width="350" height="150">
	<link rel="stylesheet" type="text/css" href="stiil.css">
<title>Dispetser</title>
</head>
<body>
 Sisse logitud <?php echo $_SESSION["roll"]." ".$_SESSION["kasnimi"]; ?>
       <a href="index.php">Avaleht</a>
<h1>Kinnita tellimusi</h1>
<table border="1">
 <tr>
	<th>Kliendi ID</th> 
	<th>Kliendi nimi</th> 
	<th>Algpunkt</th> 
	<th>Lõpp punkt</th> 
	<th>Tel. Nr</th>
	<th>Kinnitus</th> 
	<th>Vastuvõtt</th> 	
</tr>
<?php
$kask=$yhendus->prepare("SELECT id, kasutajanimi, algpunkt, lopp_punkt, tel_nr, kinnitatud, vastuvoetud FROM tellimus WHERE kinnitatud=1");
$kask->bind_result($id, $kasutajanimi, $algpunkt, $lopp_punkt, $tel_nr, $kinnitatud, $vastuvoetud);
$kask->execute();

while($kask->fetch()){
$kliendinimi=htmlspecialchars($kasutajanimi);
echo "<tr>
<td>$id</td>
<td>$kasutajanimi</td>
<td>$algpunkt</td>
<td>$lopp_punkt</td>
<td>$tel_nr</td>
<td>$kinnitatud</td>
<td>$vastuvoetud</td>
<td><a href='?kinnitamise_id=$id'>Võta vastu</a></td>
</tr>";

}
?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>