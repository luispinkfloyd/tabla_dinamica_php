<div class="table-responsive" style="margin-top:6px;">
<table style="margin:auto;">
        	<tr>
            	<td align="right"><b>Base de datos:</b></td><td><input type="text" name="base_datos" autocomplete="off" <?php if(isset($_GET['base_datos'])){echo "value='".$_GET['base_datos']."'>";}else{?>
			list="bases">
			<datalist id="bases">
<?php
	for($b=0;$b<$count_bases;$b++){
		echo "<option>".$resultado_bases[$b][0]."</option>";
	}
?>
			</datalist>					
<?php }?></td>
         
<?php if(!isset($_GET['base_datos'])){
	echo "<td colspan='2' align='center'><input type='submit' value='Seleccionar base'></td>";
	}
if(isset($_GET['base_datos'])){
  $base_datos=$_GET['base_datos'];
  
  $consulta=new consulta($pass,$host,$base_datos);
  $resultado_schemas=$consulta->get_schemas($base_datos);
  $count_schemas=count($resultado_schemas);
?>          
            
            	<td align="right"><b>Schema:</b></td><td><input type="text" name="schema" autocomplete="off" <?php if(isset($_GET['schema'])){echo "value='".$_GET['schema']."'";}else{?>
			list="schemas">
			<datalist id="schemas">
<?php
	for($c=0;$c<$count_schemas;$c++){
		echo "<option>".$resultado_schemas[$c][0]."</option>";
	}
?>
			</datalist>					
<?php }?></td>
            
<?php
if(isset($_GET['base_datos']) && !isset($_GET['schema'])){
	echo "<td colspan='2' align='center'><input type='submit' value='Seleccionar schema'></td>";
	}
  if(isset($_GET['schema'])){
	  $schema=$_GET['schema'];
	  $resultado_tablas=$consulta->get_tablas($schema);
	  $count_tablas=count($resultado_tablas);
	  if(!empty($resultado_tablas)){
	
?>
            
            	<td align="right"><b>Tabla:</b></td><td><input type="text" name="tabla" autocomplete="off" <?php if(isset($_GET['tabla'])){echo "value='".$_GET['tabla']."'";}?>
			list="tablas">
			<datalist id="tablas">
<?php
			for($d=0;$d<$count_tablas;$d++){
				echo "<option>".$resultado_tablas[$d][0]."</option>";
			}
?>
			</datalist>					
</td>
                        
<?php
			if(isset($_GET['base_datos']) && isset($_GET['schema'])){
				echo "<td colspan='2' align='center'><input type='submit' value='Seleccionar tabla'></td>";
				}
	  }else{
		  echo "<table style='margin:auto;'><tr><td><h1><b>Opciones de tablas vacía.<br>Verifique los datos ingresados</b></h1></td></tr></table>";
		  exit;
		  }
echo "</tr></table>";  
  }
}
?>
</div>