<div class="calificacionoperarios view">
<h2><?php  echo __('Calificacionoperario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calificacionoperario['Calificacionoperario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($calificacionoperario['Calificacionoperario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tarifa'); ?></dt>
		<dd>
			<?php echo h($calificacionoperario['Calificacionoperario']['tarifa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calificacionoperario'), array('action' => 'edit', $calificacionoperario['Calificacionoperario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calificacionoperario'), array('action' => 'delete', $calificacionoperario['Calificacionoperario']['id']), null, __('Are you sure you want to delete # %s?', $calificacionoperario['Calificacionoperario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calificacionoperarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calificacionoperario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operarios'), array('controller' => 'operarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operario'), array('controller' => 'operarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Operarios'); ?></h3>
	<?php if (!empty($calificacionoperario['Operario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Calificacionoperario Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Dirección'); ?></th>
		<th><?php echo __('Ci'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($calificacionoperario['Operario'] as $operario): ?>
		<tr>
			<td><?php echo $operario['id']; ?></td>
			<td><?php echo $operario['calificacionoperario_id']; ?></td>
			<td><?php echo $operario['nombre']; ?></td>
			<td><?php echo $operario['dirección']; ?></td>
			<td><?php echo $operario['ci']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'operarios', 'action' => 'view', $operario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'operarios', 'action' => 'edit', $operario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'operarios', 'action' => 'delete', $operario['id']), null, __('Are you sure you want to delete # %s?', $operario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Operario'), array('controller' => 'operarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
