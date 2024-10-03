<div class="cartastecnologicas index">
    <h3><center><?php echo __('Listado de Cartas Tecnológicas'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
		<th><?php echo __('No.'); ?></th>	
		<th><?php echo __('Código'); ?></th>
        <th><?php echo __('Pieza'); ?></th>
        <th><?php echo __('Máquina'); ?></th>
        <th><?php echo __('Fecha elaboración'); ?></th>				
	</tr>
<?php
    $counter = 0;
	foreach ($cartastecnologicas as $cartastecnologica)
    { 
        $counter++;
?>
    	<tr>
    		<td><?php echo $counter;?></td>
            <td><?php echo $cartastecnologica['Cartastecnologica']['codigo']; ?></td>
            <td><?php echo $cartastecnologica['Pieza']['nombre']; ?></td>
    		<td><?php echo $cartastecnologica['Maquina']['nombre']; ?></td>
            <td><?php echo $cartastecnologica['Cartastecnologica']['fecha_elaboracion']; ?></td>
    	</tr>
<?php } ?>
	</table>
</div>