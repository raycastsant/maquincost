<div class="ordenreals view">
<h2><?php  echo __('Ordenreal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordene'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordenreal['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $ordenreal['Ordene']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Piezas Elaboradas'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['piezas_elaboradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gasto Materiales'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['gasto_materiales']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Inicio'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['hora_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['fecha_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Fin'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['hora_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Cierre'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['fecha_cierre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consumo Salario'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['consumo_salario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cerrada'); ?></dt>
		<dd>
			<?php echo h($ordenreal['Ordenreal']['cerrada']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ordenreal'), array('action' => 'edit', $ordenreal['Ordenreal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ordenreal'), array('action' => 'delete', $ordenreal['Ordenreal']['id']), null, __('Are you sure you want to delete # %s?', $ordenreal['Ordenreal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes'), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene'), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fuerzatrabajoordenes'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fuerzatrabajoordene'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Piezasmaterialesordenes'), array('controller' => 'piezasmaterialesordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Piezasmaterialesordene'), array('controller' => 'piezasmaterialesordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiemposmaquinadoreales'), array('controller' => 'tiemposmaquinadoreales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiemposmaquinadoreale'), array('controller' => 'tiemposmaquinadoreales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Fuerzatrabajoordenes'); ?></h3>
	<?php if (!empty($ordenreal['Fuerzatrabajoordene'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Operario Id'); ?></th>
		<th><?php echo __('Ordenreal Id'); ?></th>
		<th><?php echo __('Formapago Id'); ?></th>
		<th><?php echo __('Salario'); ?></th>
		<th><?php echo __('Fechacomienzo'); ?></th>
		<th><?php echo __('Fechaterminacion'); ?></th>
		<th><?php echo __('Totalhoras'); ?></th>
		<th><?php echo __('Tarifa'); ?></th>
		<th><?php echo __('Importe'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ordenreal['Fuerzatrabajoordene'] as $fuerzatrabajoordene): ?>
		<tr>
			<td><?php echo $fuerzatrabajoordene['id']; ?></td>
			<td><?php echo $fuerzatrabajoordene['operario_id']; ?></td>
			<td><?php echo $fuerzatrabajoordene['ordenreal_id']; ?></td>
			<td><?php echo $fuerzatrabajoordene['formapago_id']; ?></td>
			<td><?php echo $fuerzatrabajoordene['salario']; ?></td>
			<td><?php echo $fuerzatrabajoordene['fechacomienzo']; ?></td>
			<td><?php echo $fuerzatrabajoordene['fechaterminacion']; ?></td>
			<td><?php echo $fuerzatrabajoordene['totalhoras']; ?></td>
			<td><?php echo $fuerzatrabajoordene['tarifa']; ?></td>
			<td><?php echo $fuerzatrabajoordene['importe']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'view', $fuerzatrabajoordene['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'edit', $fuerzatrabajoordene['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'delete', $fuerzatrabajoordene['id']), null, __('Are you sure you want to delete # %s?', $fuerzatrabajoordene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fuerzatrabajoordene'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Piezasmaterialesordenes'); ?></h3>
	<?php if (!empty($ordenreal['Piezasmaterialesordene'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordenreal Id'); ?></th>
		<th><?php echo __('Vale Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ordenreal['Piezasmaterialesordene'] as $piezasmaterialesordene): ?>
		<tr>
			<td><?php echo $piezasmaterialesordene['id']; ?></td>
			<td><?php echo $piezasmaterialesordene['ordenreal_id']; ?></td>
			<td><?php echo $piezasmaterialesordene['vale_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'piezasmaterialesordenes', 'action' => 'view', $piezasmaterialesordene['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'piezasmaterialesordenes', 'action' => 'edit', $piezasmaterialesordene['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'piezasmaterialesordenes', 'action' => 'delete', $piezasmaterialesordene['id']), null, __('Are you sure you want to delete # %s?', $piezasmaterialesordene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Piezasmaterialesordene'), array('controller' => 'piezasmaterialesordenes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tiemposmaquinadoreales'); ?></h3>
	<?php if (!empty($ordenreal['Tiemposmaquinadoreale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordenreal Id'); ?></th>
		<th><?php echo __('Maquina Id'); ?></th>
		<th><?php echo __('Tiempo Auxiliar'); ?></th>
		<th><?php echo __('Tiempo Corte'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ordenreal['Tiemposmaquinadoreale'] as $tiemposmaquinadoreale): ?>
		<tr>
			<td><?php echo $tiemposmaquinadoreale['id']; ?></td>
			<td><?php echo $tiemposmaquinadoreale['ordenreal_id']; ?></td>
			<td><?php echo $tiemposmaquinadoreale['maquina_id']; ?></td>
			<td><?php echo $tiemposmaquinadoreale['tiempo_auxiliar']; ?></td>
			<td><?php echo $tiemposmaquinadoreale['tiempo_corte']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tiemposmaquinadoreales', 'action' => 'view', $tiemposmaquinadoreale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tiemposmaquinadoreales', 'action' => 'edit', $tiemposmaquinadoreale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tiemposmaquinadoreales', 'action' => 'delete', $tiemposmaquinadoreale['id']), null, __('Are you sure you want to delete # %s?', $tiemposmaquinadoreale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tiemposmaquinadoreale'), array('controller' => 'tiemposmaquinadoreales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
