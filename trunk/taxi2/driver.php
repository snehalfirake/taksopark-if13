<?php
$yhendus=new mysqli("localhost", "if13", "ifikad", "if13_egert_k");
if(isSet($_REQUEST["uusleht"])){
$kask=$yhendus->prepare("INSERT INTO tellimus (autojuht) VALUES (?)");
$kask->bind_param("s", $_REQUEST["autojuht"]);
$kask->execute();
header("Location: $_SERVER[PHP_SELF]");
$yhendus->close();
exit();
}
?>
<!doctype html>
<html>
<head>
<title>Autojuht</title>
<style type="text/css">
#menyykiht{
float: left;
padding-right: 170px;
padding-top: 100px;
}
#sisukiht{
float:left;
padding-left: 300px;
padding-top: 100px;
}
#jalusekiht{
clear: left;
padding-top: 30px;
padding-left: 250px;
}
</style>
</head>
<body>
<div id="menyykiht">
<h2>Tellimuste vastuvõtt</h2>
<ul>
<?php
$kask=$yhendus->prepare("SELECT id, algpunkt FROM tellimus");
$kask->bind_result($id, $algpunkt);
$kask->execute();
while($kask->fetch()){
echo "<li><a href='?id=$id'>".
htmlspecialchars($algpunkt)."</a></li>";
}
?>
</ul>
</div>
<div id="sisukiht">
<?php
if(isSet($_REQUEST["id"])){
$kask=$yhendus->prepare("SELECT id, kasutajanimi, algpunkt, lopp_punkt, tel_nr, FROM tellimus
");
$kask->bind_param("isssi", $_REQUEST["id"], $_REQUEST["kasutajanimi"], $_REQUEST["algpunkt"], $_REQUEST["lopp_punkt"],
 $_REQUEST["tel_nr"]);
$kask->bind_result($id, $kasutajanimi, $algpunkt, $lopp_punkt, $tel_nr);
$kask->execute();
if($kask->fetch()){
echo "<h2>".htmlspecialchars($algpunkt)."</h2>";
echo htmlspecialchars($algpunkt);
echo htmlspecialchars($lopp_punkt);
echo htmlspecialchars($tel_nr);
}
</div>
</body>
</html>
<?php
$yhendus->close();
?>