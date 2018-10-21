<p><h2 align='center'><?php echo 'tabla = '.$tabla." <small>(registros totales = $count_filas_total)</small>"; ?></h2></p>
<br>
<div class="table-responsive" style="margin-top:6px;background-color:#c9f8ff;"> 
<table class="table-bordered table-striped" style="margin:auto; white-space:nowrap; background-color:#FFFFFF; border:solid 2px #000000">
	<tr style="background-color:#1A2543;color:#FFFFFF">
<?php
for($i=0;$i<$count_columnas;$i++){
?>
    	<td>
            	<b><?php echo $resultado_columnas[$i][0].'<br><small>'.$resultado_columnas[$i][1].'</small>'; ?></b>
        </td>
<?php
}
?>
	</tr>
<?php
if(empty($resultado_filas)){
	echo "<tr><td colspan='".$count_columnas."' style='background-color:#FFFFFF;' align='left'><h2><b>Esta tabla no contiene datos</b></h2></td></tr>";
}else{
	for($e=0;$e<$count_filas;$e++){
	?>
	<tr>
	<?php
		for($a=0;$a<$count_columnas;$a++){
	?>
			<td>
			<?php
			if($schema==='mapuche'){
			echo utf8_encode($resultado_filas[$e][$a]);
			}else{
			echo $resultado_filas[$e][$a];
		    }?>
			</td>
	<?php
		}
	?>
		  </tr>
	 <?php
	}
}
 ?>
</table>
</div>
