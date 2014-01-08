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

     <title>TaxiGO log in</title>
  </head>
  <body>
  <section id="list">
    <?php if(isSet($_SESSION["kasnimi"])): ?>
      Tere, <?php echo $_SESSION["roll"]." ".$_SESSION["kasnimi"]; ?>
      <a href="?lahku=jah">lahku</a>
      <ul>
        <?php if($_SESSION["roll"]=="kasutaja"): ?>
		<li><a href="user.php">Esita tellimus siit!</a></li>
		 <?php endif ?>
        <?php if($_SESSION["roll"]=="dispetser"): ?>
          <li><a href="disp.php">Dispetseri leht</a></li>  
        <?php endif ?>
		<?php if($_SESSION["roll"]=="autojuht"): ?>
          <li><a href="driver.php">Autojuhi leht</a></li>  
        <?php endif ?>
		<?php if($_SESSION["roll"]=="admin"): ?>
          <li><a href="admin.php">Administraator</a></li>
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
	 <p>Pole veel kasutaja? Registreeri ennast <a href="newuser.php">SIIN!</a></p>
    <?php endif ?>
	</section>
  </body>
</html>
<?php
  $yhendus->close();
?>