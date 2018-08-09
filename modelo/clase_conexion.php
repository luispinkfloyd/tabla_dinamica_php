<?php
class Conexion{
	public static function conectar($dbname,$pass,$host,$usuario){
//----------------------Try Catch para probar conexión y en caso de error generar mensaje-------------
		  try{
		  
//---------------------------------Datos para conexión postgres---------------------------------------
			$puerto=5432;
//-----------------------------------------Conexión---------------------------------------------------
			$conexion=new PDO("pgsql:host=$host port=$puerto dbname=$dbname user=$usuario password=$pass options='--client_encoding=UTF8'");
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		  }
		  catch (Exception $e)
		  {
//-----------------------------Mensaje detallado en caso de error-------------------------------------
			/*echo "No se puede conectar: " . $e->getMessage() ."<br>";
			echo "El error se encuentra en la línea ".$e->getLine()."<br>";*/
			$conexion=NULL;
		  }
		  if($conexion != NULL){
		  return $conexion;
		  }else{
			  echo "<table style='margin:auto;'><tr><td><h1><b>No se pudo conectar a la base.<br>Verifique los datos ingresados</b></h1></td></tr></table>";
			  exit;
			  }
	}
}
//--------------------Verificar conexión--------------------------------------------------------------
	/*$dbname='guarani';
	$pass='laika1';
	$host="localhost";
	$usuario='postgres';

if(Conexion::conectar($dbname,$pass,$host,$usuario)){
	
	echo "Conexión exitosa";
	
	}*/
?>