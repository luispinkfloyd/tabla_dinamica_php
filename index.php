<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" type="text/css" href="vista/style.css">-->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta charset="utf-8">
<title>Selección de <?php if(!isset($_GET['base_datos'])){echo "Base de Datos";}elseif(isset($_GET['base_datos']) and !isset($_GET['schema'])){echo "Schema";}elseif(isset($_GET['schema'])){echo "Tabla";}?></title>
</head>
<body class="media-body" style="background-color:#c9f8ff">
<?php
include 'controlador/controlador.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!– Importante llamar antes a jQuery para que funcione bootstrap.min.js   –> 
<script src="js/bootstrap.min.js"></script> <!– Llamamos al  JavaScript de Bootstrap –>
</body>
</html>