<div class="table-responsive" style="margin-top:3px;">
<table style="margin:auto;"><tr>
	<td><b>Donde la columna</b></td>
    <td>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="hidden" name="host" value="<?php echo $host;?>">
    <input type="hidden" name="pass" value="<?php echo $pass;?>">
    <input type="hidden" name="base_datos" value="<?php echo $base_datos;?>">
    <input type="hidden" name="schema" value="<?php echo $schema;?>">
    <input type="hidden" name="tabla" value="<?php echo $tabla;?>">
    <input type="text" name="columna" autocomplete="off" <?php if(isset($_GET['columna'])){echo "value='".$_GET['columna']."' ";}?>
			list="columnas">
			<datalist id="columnas">
<?php
	for($h=0;$h<$count_columnas;$h++){
		echo "<option>".$resultado_columnas[$h][0]."</option>";
	}
?>
			</datalist>					
<?php
echo "</td>";
if(isset($_GET['columna'])){
$parametros_columna=$consulta->get_filas_column($schema,$tabla,$seleccion_columna);
?>
<td style="padding: 0px 5px 0px 5px">
	<select name="comparador_parametro">
		<option>Es igual a:</option>
		<option>Contiene:</option>
        <option>Incluye los valores:</option>
	</select></td>
<td><input type="text" name="where" autocomplete="off" <?php if(isset($_GET['where'])){ echo "value='".$_GET['where']."' ";}?>
			list="parametros">
			<datalist id="parametros">
<?php
	foreach($parametros_columna as $parametro){
		echo "<option>".$parametro[0]."</option>";
	}
?>
			</datalist>					
<?php
}
echo "<td><input type='submit' value='Buscar'></td>";
?>
</form>
</td></tr>
</table>
</div>
