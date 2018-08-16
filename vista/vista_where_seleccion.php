<table style="margin:auto;"><tr>
	<td><b>Filtrar por valor de columna:</b></td>
    <td>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="hidden" name="host" value="<?php echo $host;?>">
    <input type="hidden" name="pass" value="<?php echo $pass;?>">
    <input type="hidden" name="base_datos" value="<?php echo $base_datos;?>">
    <input type="hidden" name="schema" value="<?php echo $schema;?>">
    <input type="hidden" name="tabla" value="<?php echo $tabla;?>">
    <input type="text" name="columna" autocomplete="off" <?php if(isset($_GET['columna'])){echo "value='".$_GET['columna']."'>";}else{?>
			list="columnas">
			<datalist id="columnas">
<?php
	for($h=0;$h<$count_columnas;$h++){
		echo "<option>".$resultado_columnas[$h][0]."</option>";
	}
?>
			</datalist>					
<?php }
echo "</td>";
if(!isset($_GET['columna'])){
echo "<td><input type='submit' value='Seleccionar columna'></td>";
}
if(isset($_GET['columna'])){
$parametros_columna=$consulta->get_filas_column($schema,$tabla,$where,$seleccion_columna);
?>
<td><b>Ingresar parámetro de búsqueda:</b></td>
<td><input type="text" name="where" autocomplete="off" <?php if(isset($_GET['where'])){echo "value='".$_GET['where']."'>";}else{?>
			list="parametros">
			<datalist id="parametros">
<?php
	foreach($parametros_columna as $parametros){
		echo "<option>".$parametros[0]."</option>";
	}
?>
			</datalist>					
<?php
}
echo "<td><input type='submit' value='Buscar parámetro'></td>";
}
?>
</form>
</td></tr></table>