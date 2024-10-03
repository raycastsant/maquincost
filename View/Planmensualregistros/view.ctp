<div class="planmensualregistros view">
<h2><?php  echo __('Planmensualregistro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Planesmensuale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($planmensualregistro['Planesmensuale']['mes'], array('controller' => 'planesmensuales', 'action' => 'view', $planmensualregistro['Planesmensuale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pieza'); ?></dt>
		<dd>
			<?php echo $this->Html->link($planmensualregistro['Pieza']['nombre'], array('controller' => 'piezas', 'action' => 'view', $planmensualregistro['Pieza']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materiale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($planmensualregistro['Materiale']['descripcion'], array('controller' => 'materiales', 'action' => 'view', $planmensualregistro['Materiale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Establecimiento'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['establecimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantpiezas'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['cantpiezas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costounidad'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['costounidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costototal'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['costototal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprim Pesounidad'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['matprim_pesounidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprim Pesototal'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['matprim_pesototal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprim Ancho'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['matprim_ancho']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprim Largo'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['matprim_largo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($planmensualregistro['Planmensualregistro']['observaciones']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Planmensualregistro'), array('action' => 'edit', $planmensualregistro['Planmensualregistro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Planmensualregistro'), array('action' => 'delete', $planmensualregistro['Planmensualregistro']['id']), null, __('Are you sure you want to delete # %s?', $planmensualregistro['Planmensualregistro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Planmensualregistros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planmensualregistro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesmensuales'), array('controller' => 'planesmensuales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesmensuale'), array('controller' => 'planesmensuales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Piezas'), array('controller' => 'piezas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pieza'), array('controller' => 'piezas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiale'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes'), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene'), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ordenes'); ?></h3>
	<?php if (!empty($planmensualregistro['Ordene'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Planmensualregistro Id'); ?></th>
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
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($planmensualregistro['Ordene'] as $ordene): ?>
		<tr>
			<td><?php echo $ordene['id']; ?></td>
			<td><?php echo $ordene['planmensualregistro_id']; ?></td>
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
