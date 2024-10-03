<div class="ordenes view">
<h2><?php  echo __('Ordene'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Planmensualregistro'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordene['Planmensualregistro']['id'], array('controller' => 'planmensualregistros', 'action' => 'view', $ordene['Planmensualregistro']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Planificada'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['planificada']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cant Piezas'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['cant_piezas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cant Materiales'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['cant_materiales']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Solicitud'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['fecha_solicitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Solicitud'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['hora_solicitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['fecha_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Laboriosidad'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['laboriosidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Material'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['precio_material']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario Plan'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['salario_plan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo Func Maquinas'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['tiempo_func_maquinas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cerrada'); ?></dt>
		<dd>
			<?php echo h($ordene['Ordene']['cerrada']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ordene'), array('action' => 'edit', $ordene['Ordene']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ordene'), array('action' => 'delete', $ordene['Ordene']['id']), null, __('Are you sure you want to delete # %s?', $ordene['Ordene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planmensualregistros'), array('controller' => 'planmensualregistros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planmensualregistro'), array('controller' => 'planmensualregistros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('controller' => 'ordenreals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ordenreals'); ?></h3>
	<?php if (!empty($ordene['Ordenreal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordene Id'); ?></th>
		<th><?php echo __('Piezas Elaboradas'); ?></th>
		<th><?php echo __('Materiales Elaborados'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Hora Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Hora Fin'); ?></th>
		<th><?php echo __('Consumo Salario'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ordene['Ordenreal'] as $ordenreal): ?>
		<tr>
			<td><?php echo $ordenreal['id']; ?></td>
			<td><?php echo $ordenreal['ordene_id']; ?></td>
			<td><?php echo $ordenreal['piezas_elaboradas']; ?></td>
			<td><?php echo $ordenreal['materiales_elaborados']; ?></td>
			<td><?php echo $ordenreal['fecha_inicio']; ?></td>
			<td><?php echo $ordenreal['hora_inicio']; ?></td>
			<td><?php echo $ordenreal['fecha_fin']; ?></td>
			<td><?php echo $ordenreal['hora_fin']; ?></td>
			<td><?php echo $ordenreal['consumo_salario']; ?></td>
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
