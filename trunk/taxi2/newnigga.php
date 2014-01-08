<!doctype html>
<html>
<head>
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

	<meta charset="utf-8" />
</head>
<body>
	<div id="header">
        <h2>Lisa uus tooline</h2>
		<?php
	  if(isSet($_REQUEST["kasutajanimi"])){
	   echo "Teie tellimus alguspunktist $_REQUEST[kasutajanimi] oli edukas!";
	  }
    ?>	
		<div>
		<form action="newnigga.php" id="register" method="post">
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