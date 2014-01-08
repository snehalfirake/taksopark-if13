<?php
$yhendus=new mysqli("localhost", "if13", "ifikad", "if13_egert_k");
if(isSet($_REQUEST["mitteaktiivne_id"])){
$kask=$yhendus->prepare("UPDATE kasutaja SET aktiivne=0 WHERE id=?");
$kask->bind_param("i", $_REQUEST["mitteaktiivne_id"]);
$kask->execute();
}
 if(isSet($_REQUEST["aktiivne_id"])){
$kask=$yhendus->prepare("UPDATE kasutaja SET aktiivne=1 WHERE id=?");
$kask->bind_param("i", $_REQUEST["aktiivne_id"]);
$kask->execute();
}
 //if(isSet($_REQUEST["peitmise_nullid_id"])){
//$kask=$yhendus->prepare("UPDATE kohvi SET avalik=0 WHERE topsepakis<1");
//$kask->bind_param("i", $_REQUEST["peitmise_nullid_id"]);
//$kask->execute();
//}
// if(isSet($_REQUEST["avamise_nullid_id"])){
//$kask=$yhendus->prepare("UPDATE kasutaja SET avalik=1 WHERE topsepakis<0");
//$kask->bind_param("i", $_REQUEST["avamise_nullid_id"]);
//$kask->execute();
//}
?>
<!doctype html>
<html>
<head>
<title>Administraator</title>
</head>
<body>
Sisse logitud <?php echo $_SESSION["roll"]." ".$_SESSION["kasnimi"]; ?>
       <a href="index.php">avaleht</a>
<h1>Administraatori leht</h1>
<table>
<?php
$kask=$yhendus->prepare("SELECT id, kasutajanimi, eesnimi, perekonnanimi, email, roll, aktiivne FROM kasutaja");
$kask->bind_result($id, $kasutajanimi, $eesnimi, $perekonnanimi, $email, $roll, $aktiivne);
$kask->execute();
//echo "<tr>
//<td><a href='?peitmise_nullid_id=$id'>Peida mitteaktiivsed</a></td>
//<td><a href='?avamise_nullid_id=$id'>Näita aktiivsed</a></td>
//</tr>";

while($kask->fetch()){
$nimi=htmlspecialchars($kasutajanimi);

	echo"<tr>
	<td>$id</td>
	<td>$kasutajanimi</td>
	<td>$eesnimi</td>
	<td>$perekonnanimi</td>
	<td>$email</td>
	<td>$roll</td>
	<td>$aktiivne</td>
	<td><a href='?mitteaktiivne_id=$id'>Mitteaktiivne</a></td>
	<td><a href='?aktiivne_id=$id'>Aktiivne</a></td>
	</tr>";
}

//<?php
//$kask=$yhendus->prepare("SELECT rollinimi FROM roll");
//$kask->bind_result($rollinimi);
//$kask->execute();
//	<select>
//	<option value="$rollinimi">Roll</option>
//	</select>
// ?>



</table>
</body>
</html>
<?php
$yhendus->close();
?>