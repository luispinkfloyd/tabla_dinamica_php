<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" type="text/css" href="vista/style.css">-->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta charset="utf-8">
<title><?php if(isset($_GET['tabla'])){echo $_GET['tabla'];} else{echo 'Selector dinámico de tablas';}?></title>
</head>
<body class="media-body" style="background-color:#c9f8ff;">
<?php
include 'controlador/controlador.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
