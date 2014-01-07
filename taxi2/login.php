<?php
  require_once("konf.php");
  session_start();
  if(isSet($_REQUEST["kasnimi"])){
     $kask=$yhendus->prepare(
      "SELECT roll FROM kasutaja WHERE kasutajanimi=? AND paroolir2si=PASSWORD(?)");
     $kasutajanimiparool=$_REQUEST["kasnimi"]."_".$_REQUEST["parool"];
     $kask->bind_param("ss", $_REQUEST["kasnimi"], $kasutajanimiparool);
     $kask->bind_result($roll);
     $kask->execute();
     if($kask->fetch()){
         $_SESSION["kasnimi"]=$_REQUEST["kasnimi"];
         $_SESSION["roll"]=$roll;
         $kask->close();
     }
  }
  if(isSet($_REQUEST["lahku"])){
     unset($_SESSION["kasnimi"]);
     unset($_SESSION["roll"]);
  }
?>
<!doctype html>
<html>
  <head>
  

 <link rel="stylesheet" type="text/css" href="kujundus.css">
 <meta charset="UTF-8">

     <title>Parandus log in</title>
  </head>
  <body>
  <section id="list">
    <?php if(isSet($_SESSION["kasnimi"])): ?>
      Tere, <?php echo $_SESSION["roll"]." ".$_SESSION["kasnimi"]; ?>
      <a href="?lahku=jah">lahku</a>
      <ul>
        <?php if($_SESSION["roll"]=="dispetser"): ?>
		<li><a href="toovastu.php">Vastuvõtmine</a></li>
		 <?php endif ?>
        <?php if($_SESSION["roll"]=="tehnik"): ?>
          <li><a href="tehnik.php">Pooleli olevad tööd</a></li>  
        <?php endif ?>
		<?php if($_SESSION["roll"]=="haldur"): ?>
          <li><a href="tehnik.php">Tehnikuleht</a></li>  
        <?php endif ?>
		<?php if($_SESSION["roll"]=="haldur"): ?>
          <li><a href="valmis.php">Statistika</a></li>
		  <?php endif ?>
		  <?php if($_SESSION["roll"]=="haldur"): ?>
          <li><a href="tvv.php">Tehniku määramine</a></li>
		  <?php endif ?>
      </ul>
    <?php else: ?>
     <form action="?" method="post">
      <dl>
        <dt>Kasutajanimi:</dt>
        <dd><input type="text" name="kasnimi" /></dd>
        <dt>Parool:</dt>
        <dd><input type="password" name="parool" /></dd>
        <dd><input type="submit" value="Sisesta" /></dd>
      </dl>
     </form>
    <?php endif ?>
	</section>
  </body>
</html>
<?php
  $yhendus->close();
?>