<!doctype html>
<html>
<?php
$yhendus=new mysqli("localhost", "if13", "ifikad", "if13_egert_k");
if(isSet($_REQUEST["uusleht"])){
    $kask=$yhendus->prepare("INSERT INTO kasutaja (kasutajanimi, paroolir2si, eesnimi, perekonnanimi, email, roll) VALUES (?, ?, ?, ?, ?, ?)");
    $kask->bind_param("ssssss", $_REQUEST["kasutajanimi"], $_REQUEST["paroolir2si"], $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"], $_REQUEST["email"], $_REQUEST["roll"]);
    $kask->execute();
	$yhendus->close();
    header("Location: $_SERVER[PHP_SELF]");
    
    exit();
  }
?>
</body>
</html>
</style>
	<meta charset="utf-8" />
<body>
	<div id="header">
        <h2>Tere tulemast TaxiGo kodulehele! Registreeri end siin!</h2>
		<div>
		<form action="index.php" id="register" method="post">
<table border="0">
<tbody>

<tr>
<td><label for="kasutajanimi">Kasutajanimi*:</label> </td>
<td><input id="kasutajanimi" maxlength="45" name="kasutajanimi" type="text" /> </td>
</tr>

<tr>
<td><label for="paroolir2si">Parool*:</label></td>
<td><input id="paroolir2si" maxlength="45" name="paroolir2si" type="paroolir2si" /></td>
</tr>

<tr>
<td><label for="eesnimi">Teie eesnimi*: </label> </td>
<td><input id="eesnimi" maxlength="45" name="eesnimi" type="text" /> </td>
</tr>

<tr>
<td><label for="perekonnanimi">Teie perekonnanimi*: </label> </td>
<td><input id="perekonnanimi" maxlength="45" name="perekonnanimi" type="text" /> </td>
</tr>

<tr>
<td><label for="email">Email*:</label> </td>
<td><input id="email" maxlength="45" name="email" type="text" /></td>
</tr>

<tr>
<td><label for="roll">Roll*:</label> </td>
<td><input id="roll" maxlength="45" name="roll" type="text" /> </td>
</tr>

<tr>
<td align="right"><input name="Submit" type="submit" value="Submit" /></td>
</tr>

</tbody></table>
</form>

<div class="login">
      <h1>Logi kasutajasse</h1>
      <form method="post" action="index.php">
        <p><input type="text" name="login" value="" placeholder="kasutajanimi"></p>
        <p><input type="paroolir2si" name="paroolir2si" value="" placeholder="paroolir2si"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Mäleta mu kasutajat siin arvutis
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>
	<html>