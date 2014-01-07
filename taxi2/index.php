<!doctype html>
<html>
<?php
$yhendus=new mysqli("localhost", "if13", "ifikad", "if13_egert_k");
if(isSet($_REQUEST["uusleht"])){
    $kask=$yhendus->prepare("INSERT INTO toolid (toon, tellimiskogus) VALUES (?, ?)");
    $kask->bind_param("si", $_REQUEST["toon"], $_REQUEST["tellimiskogus"]);
    $kask->execute();
	$yhendus->close();
    header("Location: $_SERVER[PHP_SELF]");
    
    exit();
  }
?>
</body>
</html>index.php
<body>
	<div id="header">
        <h2>Tere tulemast TaxiGo kodulehele!</h2>
		<div>
		<p>Esitage oma tellimus taksole siit</p>
		</div>
		</style>
	<meta charset="utf-8" />
    <div id="menyykiht">
        <h2>Teated</h2>
        <ul>
		  </ul>
		<a href='?lisamine=jah'>Lisa ...</a>
    </div>
    <div id="sisukiht">
       <?php
         
         if(isSet($_REQUEST["lisamine"])){
           ?>
             <form action='?'>
              <input type="hidden" name="uusleht" value="jah" />
              <h2>Uue tooli lisamine</h2>
              <dl>
                <dt>toon:</dt>
                <dd>
                 <input type="text" name="toon" />
                </dd>
                <dt>tellimiskogus:</dt>
                <dd>
                  <textarea rows="20" name="tellimiskogus"></textarea>
                </dd>
               </dl>
               <input type="submit" value="sisesta">
             </form>
           <?php
         }
       ?>
    </div>
	<html>