<?php
session_start();
  if(!($_SESSION["roll"]=="admin")){
    header("Location: login.php");
	exit();
  }

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
<?php
  require_once("konf.php");
if(isSet($_REQUEST["Submit"])){
    $kask=$yhendus->prepare("INSERT INTO kasutaja(kasutajanimi, paroolir2si, eesnimi, perekonnanimi, email, roll) VALUES (?, PASSWORD(?), ?, ?, ?, ?)");
	$kasutajanimiparool=$_REQUEST["kasutajanimi"]."_".$_REQUEST["paroolir2si"];
    $kask->bind_param("ssssss", $_REQUEST["kasutajanimi"], $kasutajanimiparool, $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"], $_REQUEST["email"], $_REQUEST["roll"]);
    $kask->execute();
	$yhendus->close();
    header("Location: $_SERVER[PHP_SELF]");
    
    exit();
  }
?>
<!doctype html>
<html>
<head>
<img src="pildid/taxigo1.jpg" alt="logo" width="350" height="150">
<link rel="stylesheet" type="text/css" href="stiil.css">
<title>Administraator</title>
</head>
<body>
Sisse logitud <?php echo $_SESSION["roll"]." ".$_SESSION["kasnimi"]; ?>
       <a href="index.php">Avaleht</a>
<h1>Administraatori leht</h1>
<table border="1">
 <tr>
	<th>ID</th> 
	<th>Kasutajanimi</th> 
	<th>Eesnimi</th> 
	<th>Perekonnanimi</th> 
	<th>E-mail</th>
	<th>Roll</th> 	
	<th>Aktiivne</th> 	
</tr>
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
		<div id="header">
        <h2>Lisa uus tooline</h2>
		<?php
	  if(isSet($_REQUEST["kasutajanimi"])){
	   echo "Kasutaja $_REQUEST[kasutajanimi] lisamine oli edukas!";
	  }
    ?>	
		<div>
		<form action="admin.php" id="register" method="post">
<table border="0">
<tbody>

<tr>
<td><label for="kasutajanimi">Kasutajanimi*:</label> </td>
<td><input id="kasutajanimi" maxlength="45" name="kasutajanimi" type="text" /> </td>
</tr>

<tr>
<td><label for="paroolir2si">Parool*:</label></td>
<td><input id="paroolir2si" maxlength="45" name="paroolir2si" type="password" /></td>
</tr>

<tr>
<td><label for="eesnimi">Eesnimi*: </label> </td>
<td><input id="eesnimi" maxlength="45" name="eesnimi" type="text" /> </td>
</tr>

<tr>
<td><label for="perekonnanimi">Perekonnanimi*: </label> </td>
<td><input id="perekonnanimi" maxlength="45" name="perekonnanimi" type="text" /> </td>
</tr>

<tr>
<td><label for="email">Email*:</label> </td>
<td><input id="email" maxlength="45" name="email" type="text" /></td>
</tr>

<tr>
<td><label for="roll">Roll*:</label> </td>
<td><input id="roll" maxlength="20" name="roll" type="text" /></td>
</tr>

<tr>
<td align="right"><input name="Submit" type="submit" value="Submit" /></td>
</tr>
 
</tbody></table>
</form>
</body>
</html>
<?php
$yhendus->close();
?>