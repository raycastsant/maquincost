<div class="tipotrabajos view">
<h2><?php  echo __('Tipotrabajo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipotrabajo['Tipotrabajo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipotrabajo['Tipotrabajo']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipotrabajo'), array('action' => 'edit', $tipotrabajo['Tipotrabajo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipotrabajo'), array('action' => 'delete', $tipotrabajo['Tipotrabajo']['id']), null, __('Are you sure you want to delete # %s?', $tipotrabajo['Tipotrabajo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipotrabajos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipotrabajo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes'), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene'), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('controller' => 'ordenreals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ordenes'); ?></h3>
	<?php if (!empty($tipotrabajo['Ordene'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Planmensualregistro Id'); ?></th>
		<th><?php echo __('Tipotrabajo Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Planificada'); ?></th>
		<th><?php echo __('Cant Piezas'); ?></th>
		<th><?php echo __('Cant Materiales'); ?></th>
		<th><?php echo __('Fecha Solicitud'); ?></th>
		<th><?php echo __('Hora Solicitud'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Laboriosidad'); ?></th>
		<th><?php echo __('Precio Material'); ?></th>
		<th><?php echo __('Salario Plan'); ?></th>
		<th><?php echo __('Tiempo Func Maquinas'); ?></th>
		<th><?php echo __('Tarifa Proyectista'); ?></th>
		<th><?php echo __('Tarifa Tecnologo'); ?></th>
		<th><?php echo __('Tiempo Proyecto'); ?></th>
		<th><?php echo __('Tiempo Tecnologia'); ?></th>
		<th><?php echo __('Costo Pieza'); ?></th>
		<th><?php echo __('Peso Pieza'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipotrabajo['Ordene'] as $ordene): ?>
		<tr>
			<td><?php echo $ordene['id']; ?></td>
			<td><?php echo $ordene['planmensualregistro_id']; ?></td>
			<td><?php echo $ordene['tipotrabajo_id']; ?></td>
			<td><?php echo $ordene['numero']; ?></td>
			<td><?php echo $ordene['planificada']; ?></td>
			<td><?php echo $ordene['cant_piezas']; ?></td>
			<td><?php echo $ordene['cant_materiales']; ?></td>
			<td><?php echo $ordene['fecha_solicitud']; ?></td>
			<td><?php echo $ordene['hora_solicitud']; ?></td>
			<td><?php echo $ordene['fecha_inicio']; ?></td>
			<td><?php echo $ordene['fecha_fin']; ?></td>
			<td><?php echo $ordene['laboriosidad']; ?></td>
			<td><?php echo $ordene['precio_material']; ?></td>
			<td><?php echo $ordene['salario_plan']; ?></td>
			<td><?php echo $ordene['tiempo_func_maquinas']; ?></td>
			<td><?php echo $ordene['tarifa_proyectista']; ?></td>
			<td><?php echo $ordene['tarifa_tecnologo']; ?></td>
			<td><?php echo $ordene['tiempo_proyecto']; ?></td>
			<td><?php echo $ordene['tiempo_tecnologia']; ?></td>
			<td><?php echo $ordene['costo_pieza']; ?></td>
			<td><?php echo $ordene['peso_pieza']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ordenes', 'action' => 'view', $ordene['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ordenes', 'action' => 'edit', $ordene['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ordenes', 'action' => 'delete', $ordene['id']), null, __('Are you sure you want to delete # %s?', $ordene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ordene'), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ordenreals'); ?></h3>
	<?php if (!empty($tipotrabajo['Ordenreal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordene Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Tipotrabajo Id'); ?></th>
		<th><?php echo __('Piezas Elaboradas'); ?></th>
		<th><?php echo __('Gasto Materiales'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Hora Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Hora Fin'); ?></th>
		<th><?php echo __('Fecha Cierre'); ?></th>
		<th><?php echo __('Consumo Salario'); ?></th>
		<th><?php echo __('Cerrada'); ?></th>
		<th><?php echo __('Pieza Costo Unit'); ?></th>
		<th><?php echo __('Mat Prim Peso Unit'); ?></th>
		<th><?php echo __('Pieza Peso Unit'); ?></th>
		<th><?php echo __('Ueb'); ?></th>
		<th><?php echo __('Responsable'); ?></th>
		<th><?php echo __('Tipo Trabajo'); ?></th>
		<th><?php echo __('Equipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipotrabajo['Ordenreal'] as $ordenreal): ?>
		<tr>
			<td><?php echo $ordenreal['id']; ?></td>
			<td><?php echo $ordenreal['ordene_id']; ?></td>
			<td><?php echo $ordenreal['materiale_id']; ?></td>
			<td><?php echo $ordenreal['tipotrabajo_id']; ?></td>
			<td><?php echo $ordenreal['piezas_elaboradas']; ?></td>
			<td><?php echo $ordenreal['gasto_materiales']; ?></td>
			<td><?php echo $ordenreal['fecha_inicio']; ?></td>
			<td><?php echo $ordenreal['hora_inicio']; ?></td>
			<td><?php echo $ordenreal['fecha_fin']; ?></td>
			<td><?php echo $ordenreal['hora_fin']; ?></td>
			<td><?php echo $ordenreal['fecha_cierre']; ?></td>
			<td><?php echo $ordenreal['consumo_salario']; ?></td>
			<td><?php echo $ordenreal['cerrada']; ?></td>
			<td><?php echo $ordenreal['pieza_costo_unit']; ?></td>
			<td><?php echo $ordenreal['mat_prim_peso_unit']; ?></td>
			<td><?php echo $ordenreal['pieza_peso_unit']; ?></td>
			<td><?php echo $ordenreal['ueb']; ?></td>
			<td><?php echo $ordenreal['responsable']; ?></td>
			<td><?php echo $ordenreal['tipo_trabajo']; ?></td>
			<td><?php echo $ordenreal['equipo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ordenreals', 'action' => 'view', $ordenreal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ordenreals', 'action' => 'edit', $ordenreal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ordenreals', 'action' => 'delete', $ordenreal['id']), null, __('Are you sure you want to delete # %s?', $ordenreal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
