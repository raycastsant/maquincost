<table class="table table-bordered" style = "width:800px">
<tr>
	<td></td>
	<td>EMCIUDAD</td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Listado de Usuarios</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>No.</td>
	<td>Fecha y Hora</td>
	<td>Reclamación</td>
	<td></td>
</tr>
<?php 
print_r($users);
foreach ($users as $user): 

?>
	<td><?php echo h($user['User']['username'])?></td>
	<td><?php echo h($user['Tipousuario']['descripcion'])?></td>
	<td></td>
	<td></td>
</tr>
<?php
endforeach;
?>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
