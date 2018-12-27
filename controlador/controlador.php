<?php
error_reporting(1); //trae los datos de un error php si surge alguno

$resultado_bases=array();
$resultado_filas=array();
$limit=10;

require_once 'controlador/zebra.php';
$paginacion=new Zebra_Pagination;
echo "<form action='".$_SERVER['PHP_SELF']."' method='get'>";

include 'vista/vista_cuadro_host.php';

if(isset($_GET['pass']) and isset($_GET['host'])){
	require_once 'modelo/clase_consulta.php';
	$host=$_GET['host'];
	$pass=$_GET['pass'];
	$consulta=new consulta($pass,$host);
	$resultado_bases=$consulta->get_bases();
	$count_bases=count($resultado_bases);
	
	include 'vista/vista_cuadro_seleccion_tabla.php';
	echo "</form>";
	if(isset($_GET['tabla'])){
		$tabla=$_GET['tabla'];
		$sql="select * from $schema.$tabla";
		$where=NULL;
		if(isset($_GET['columna'])){
			$seleccion_columna=$_GET['columna'];
			}
		if(isset($_GET['where'])){
			if($_GET['comparador_parametro'] === 'Es igual a:'){
				$comparador = "= '".$_GET['where']."'";
				$set_type = '::text ';
			}
			if($_GET['comparador_parametro'] === 'Contiene:'){
				$comparador = "ilike '%".$_GET['where']."%'";
				$set_type = '::text ';
			}
			if($_GET['comparador_parametro'] === 'Incluye los valores:'){
				$comparador = "in (".$_GET['where'].")";
				$set_type = ' ';
			}
			$where=" where ".$seleccion_columna.$set_type.$comparador;
			}
		$offset=($paginacion->get_page()-1)*$limit;
		$count_filas_total=$consulta->get_filas_cant($schema,$tabla,$where,$and);
		$resultado_filas=$consulta->get_filas($sql,$limit,$offset,$where,$and);
		$count_filas=count($resultado_filas);
		$resultado_columnas=$consulta->get_columnas($tabla,$schema);
		$count_columnas=count($resultado_columnas);
		if(!empty($resultado_filas)){
			include 'vista/vista_where_seleccion.php';
		}
		include 'vista/vista_tabla.php';
		$paginacion->records($count_filas_total);
		$paginacion->records_per_page($limit);
		$paginacion->padding(FALSE);
		$paginacion->render();
	}
	include 'vista/vista_reset_submit.php';
}
?>