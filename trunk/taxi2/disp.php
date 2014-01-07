<?php 
  session_start();
  if(!($_SESSION["roll"]=="haldur")){
    header("Location: login.php");
	exit();
  }
  date_default_timezone_set('Europe/Tallinn');
  require_once("konf.php"); 
  if(isSet($_REQUEST["kustutusid"])){
$kask=$yhendus->prepare("DELETE FROM parandused WHERE id=?");
$kask->bind_param("i", $_REQUEST["kustutusid"]);
$kask->execute();
}
  if(isSet($_REQUEST["tehnikid"])){
$kask=$yhendus->prepare("UPDATE parandused SET tehnik=? WHERE id=?");
$kask->bind_param("si", $_REQUEST["uustehnik"], $_REQUEST["uue_töö_id"]);
$kask->execute();
}
  $kask=$yhendus->prepare(
    "SELECT id, kirjeldus  FROM parandused WHERE tehnik IS NULL");
  $kask->bind_result($id, $kirjeldus);
  $kask->execute();  
  

?>
<!doctype html>
<html>
  <head>
    <title>Tööde määramine</title>
	
 <link rel="stylesheet" type="text/css" href="kujundus.css">
 <meta charset="UTF-8">
  </head>
  <body>
  <section id="kasutajariba">
    Tere, <?php echo $_SESSION["roll"]." ".$_SESSION["kasutajanimi"]; ?>
    <div style="float: right">
	  <a href="login.php?">Avaleht</a>
	  <a href="login.php?lahku=jah">lahku</a>
	</div>
  </section>
  <section id="Töömääramistabel">
    <h1>Kõik tööd</h1>
	<table>
	  <tr>
		<th>ID</th>
	    <th>Probleemi kirjeldus</th>
		<th>Määra tehnik?</th>
		<th></th>
	  </tr>
	  <?php
	    while($kask->fetch())
		   echo "
		     <tr>
			   <td>$id</td>
			   <td>$kirjeldus</td>
			   <td><a href='?tehnikumaaramiskirje_id=$id'>Määra tehnik</a></td>
			   <td><a href='?kustutusid=$id'>Kustuta</a></td>
			 </tr>
		   ";
	  ?>
  </section>
  <section id="Statistikatabel">
	<h2>Tehnikutele määratud tööde kogus</h2>
<?php
  $kask=$yhendus->prepare(
  "SELECT tehnik, COUNT(*)  FROM parandused GROUP BY tehnik");
  $kask->bind_result($tehnik, $COUNT);
  $kask->execute(); 
?>
	<table>
	  <tr>
	    <th>Tehnik</th>
		<th>Tööde arv</th>
	  </tr>
	 <?php
		while($kask->fetch())
			echo "
			  <tr>
			    <td>$tehnik</td>
				<td>$COUNT</td>
			  </tr>
			";
	 ?>
	</table>
	</section>
<div id="sisukiht">
<?php
if(isSet($_REQUEST["tehnikumaaramiskirje_id"])){
?>
<section id="tehnikumääramisvorm">
<form action='?'>
<input type="hidden" name="tehnikid" value="jah" />
<h2>Tehniku määramine</h2>
<dl>
<dt>Tehniku nimi:</dt>
<dd>
<input type="text" name="uustehnik" />
</dd>
<dt>Töö ID:</dt>
<dd>
<input type="int" name="uue_töö_id" />
</dd>
</dl>
<input type="submit" value="sisesta">
</form>
</section>
<?php
}
?>

</div>
	</table>
  </body>
</html>