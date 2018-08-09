<div class="table-responsive" style="margin-top:6px;">
<table class="table-bordered" style="margin:auto;">
	<tr>
    	<td align="right">Indique host:</td>
    	<td><input type="text" name="host" value="<?php if(isset($_GET['host'])){echo $_GET['host'];}?>" autocomplete="on"></td>
    	<td align="right">Indique contraseña:</td>
    	<td><input type="text" name="pass" value="<?php if(isset($_GET['pass'])){echo $_GET['pass'];}?>" autocomplete="on"></td>
        <td colspan="2" align="center"><input type="submit" value="Seleccionar host y contraseña"></td>
    </tr>
</table>
</div>