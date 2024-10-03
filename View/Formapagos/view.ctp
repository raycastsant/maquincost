<div class="formapagos view">
<h2><?php  echo __('Formapago'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formapago['Formapago']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($formapago['Formapago']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Formapago'), array('action' => 'edit', $formapago['Formapago']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Formapago'), array('action' => 'delete', $formapago['Formapago']['id']), null, __('Are you sure you want to delete # %s?', $formapago['Formapago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Formapagos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formapago'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fuerzatrabajoordenes'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fuerzatrabajoordene'), array('controller' => 'fuerzatrabajoordenes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Fuerzatrabajoordenes'); ?></h3>
	<?php if (!empty($formapago['Fuerzatrabajoordene'])): ?>
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
		foreach ($formapago['Fuerzatrabajoordene'] as $fuerzatrabajoordene): ?>
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
