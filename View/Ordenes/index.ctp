<div class="ordenes index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/ordenes/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Emitir</a></td></div>
    <h3><center><?php echo __('Listado de Órdenes'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
		<th><?php echo __('No.'); ?></th>	
		<!-- <th><?php //echo $this->Paginator->sort('planmensualregistro_id'); ?></th> -->
		<th><?php echo $this->Paginator->sort('numero', 'Número'); ?></th>
        <th><?php echo $this->Paginator->sort('Pieza.nombre', 'Pieza'); ?></th>
		<!-- <th><?php //echo $this->Paginator->sort('planificada'); ?></th> -->
		<!-- <th><?php //echo $this->Paginator->sort('cant_piezas', 'Cantidad de piezas'); ?></th> -->
		<!-- <th><?php //echo $this->Paginator->sort('cant_materiales'); ?></th> -->
		<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>
		<th><?php echo $this->Paginator->sort('hora_solicitud'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_fin'); ?></th>
		<!-- <th><?php //echo $this->Paginator->sort('laboriosidad'); ?></th>
		<th><?php //echo $this->Paginator->sort('precio_material'); ?></th>
		<th><?php //echo $this->Paginator->sort('salario_plan'); ?></th> -->
		<!-- <th><?php //echo $this->Paginator->sort('tiempo_func_maquinas'); ?></th> -->
		<!-- <th><?php //echo $this->Paginator->sort('cerrada'); ?></th> -->
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
    
	foreach ($ordenes as $ordene): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<!-- <td> <?php //echo $this->Html->link($ordene['Planmensualregistro']['id'], array('controller' => 'planmensualregistros', 'action' => 'view', $ordene['Planmensualregistro']['id'])); ?> </td> -->
		<td><?php echo h($ordene['Ordene']['numero']); ?>&nbsp;</td>
        <td><?php echo h($ordene['Pieza']['nombre']); ?>&nbsp;</td>
		<!-- <td><?php 
              /*  if($ordene['Ordene']['planificada'] == '1')
                 echo "Si";  
                else
                 echo "No"; */ ?>&nbsp;</td> -->
		<!-- <td><?php //echo h($ordene['Ordene']['cant_piezas']); ?>&nbsp;</td> -->
		<!-- <td><?php //echo h($ordene['Ordene']['cant_materiales']); ?>&nbsp;</td> -->
		<td><?php echo h($ordene['Ordene']['fecha_solicitud']); ?>&nbsp;</td>
		<td><?php echo h($ordene['Ordene']['hora_solicitud']); ?>&nbsp;</td>
		<td><?php echo h($ordene['Ordene']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($ordene['Ordene']['fecha_fin']); ?>&nbsp;</td>
	<!--	<td><?php //echo h($ordene['Ordene']['laboriosidad']); ?>&nbsp;</td>
		<td><?php //echo h("$".$ordene['Ordene']['precio_material']); ?>&nbsp;</td>
		<td><?php //echo h("$".$ordene['Ordene']['salario_plan']); ?>&nbsp;</td> -->
		<!-- <td><?php //echo h($ordene['Ordene']['tiempo_func_maquinas']); ?>&nbsp;</td> -->
		<!-- <td><?php //echo h($ordene['Ordene']['cerrada']); ?>&nbsp;</td> -->
		<td class="actions">
			<?php //echo $this->Html->link(__('Ver'), array('action' => 'view', $ordene['Ordene']['id']), array('class' => 'btn btn-small')); ?>
			<?php //echo $this->Html->link(__('<i class="icon-qrcode"></i>Plan'), array('action' => 'edit', $ordene['Ordene']['id']), array('class' => 'btn btn-small')); ?>
            
            <a href="/maquincost/ordenes/edit/<?php echo $ordene['Ordene']['id']; ?>" class="btn btn-small"><i class="icon-qrcode"></i>&nbsp;Plan</a>
            <a href="/maquincost/ordenreals/edit/<?php echo $ordene['Ordenreal'][0]['id']; ?>" class="btn btn-small"><i class=" icon-arrow-right"></i>&nbsp;Seguimiento</a>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ordene['Ordene']['id']), array('class' => 'btn btn-small'), __('¿Está seguro que desea eliminar la orden?', $ordene['Ordene']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('<center>P&aacute;gina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, comenzando en el {:start}, terminando en el {:end}</center>')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>