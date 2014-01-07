<?php
  $yhendus=new mysqli("localhost", "if13", "ifikad", "if13_egert_k");
   
   if(isSet($_REQUEST["juhinimi"])){
    $kask=$yhendus->prepare(
	  "UPDATE tellimus  SET autojuht=? WHERE id=?");
    $kask->bind_param("si", $_REQUEST["juhinimi"], $_REQUEST["salvestus_id"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
  }
 ?>
 <!doctype html>
<html>
	<head>
		<title>Autojuht</title>
		    <style type="text/css">
	#menyykiht{
         float: left;
         padding-right: 30px;
       }
       #sisukiht{
         float:left;
       }
       #jalusekiht{
         clear: left;
       }
		</style>
		<meta charset="utf-8" />
	</head>
	<body>
		<div id="menyykiht">
			<h2>Tellimused</h2>
			<ul>
	  <?php
	     $kask=$yhendus->prepare(
		   "SELECT id, algpunkt FROM tellimus WHERE ISNULL(autojuht)");
		 $kask->bind_result($id, $algpunkt);
		 $kask->execute();
		 while($kask->fetch()){
			echo "<li><a href='?id=$id'>".
				htmlspecialchars($algpunkt)."</a></li>";
			  }
	  ?>
	  </ul>
	</table>
	</div>
		<div id="sisukiht">
			<?php
				if(isSet($_REQUEST["id"])){
					$kask=$yhendus->prepare("SELECT id, kliendinimi, algpunkt, lopp_punkt, tel_nr FROM tellimus");
					$kask->bind_param("isssi", $_REQUEST["id"], $REQUEST["kliendinimi"], $REQUEST["algpunkt"],
						$REQUEST["lopp_punkt"], $REQUEST["tel_nr"]);
					$kask->bind_result($id, $kliendinimi, $algpunkt, $lopp_punkt, $tel_nr);
					$kask->execute();
					}
					if($kask->fetch()){
						echo "<h2>".htmlspecialchars($kliendinimi)."</h2>";
						?>
									<h2>Sisesta autojuhi nimi</h2>
		<form>
			<dl>
				<dt>Autojuhi nimi:</dt>
				<dd><input type="text" name="juhinimi" /></dd>
				<input type="hidden" name="salvestus_id" 
				   value="<?php echo $id; ?>">
			</dl>
			<input type="submit" value="lisamine" />
		</form>
						
						<?php
						}else {
						echo "Vajuta kliendinimele, et lisada tellimust vastuvõtva autojuhi nimi";
						}
						?>

		</div>
	</body>
</html>
<?php
	$yhendus->close();
?>