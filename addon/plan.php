<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>drag image</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/script.js"></script>
</head>
<body>
<?php

$etage = $_GET["etage"];
$salle = $_GET["salle"];


$res = "<div>";

$res .= "<iframe style='width:100%; height:372px;' src='Etage_$etage.php?salle=$salle'></iframe>";

$res .= "</div>";

echo $res;



?>
</body>
</html>