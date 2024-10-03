<div class="tipoelementoscortantes view">
<h2><?php  echo __('Tipoelementoscortante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoelementoscortante['Tipoelementoscortante']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tipoelementoscortante['Tipoelementoscortante']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipoelementoscortante'), array('action' => 'edit', $tipoelementoscortante['Tipoelementoscortante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipoelementoscortante'), array('action' => 'delete', $tipoelementoscortante['Tipoelementoscortante']['id']), null, __('Are you sure you want to delete # %s?', $tipoelementoscortante['Tipoelementoscortante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoelementoscortantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoelementoscortante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementoscortantes'), array('controller' => 'elementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementoscortante'), array('controller' => 'elementoscortantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Elementoscortantes'); ?></h3>
	<?php if (!empty($tipoelementoscortante['Elementoscortante'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Materialelemento Id'); ?></th>
		<th><?php echo __('Formascorte Id'); ?></th>
		<th><?php echo __('Tipoelementoscortante Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Diametro'); ?></th>
		<th><?php echo __('Formasugecion'); ?></th>
		<th><?php echo __('Calzada'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tipoelementoscortante['Elementoscortante'] as $elementoscortante): ?>
		<tr>
			<td><?php echo $elementoscortante['id']; ?></td>
			<td><?php echo $elementoscortante['materialelemento_id']; ?></td>
			<td><?php echo $elementoscortante['formascorte_id']; ?></td>
			<td><?php echo $elementoscortante['tipoelementoscortante_id']; ?></td>
			<td><?php echo $elementoscortante['nombre']; ?></td>
			<td><?php echo $elementoscortante['diametro']; ?></td>
			<td><?php echo $elementoscortante['formasugecion']; ?></td>
			<td><?php echo $elementoscortante['calzada']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'elementoscortantes', 'action' => 'view', $elementoscortante['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'elementoscortantes', 'action' => 'edit', $elementoscortante['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'elementoscortantes', 'action' => 'delete', $elementoscortante['id']), null, __('Are you sure you want to delete # %s?', $elementoscortante['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Elementoscortante'), array('controller' => 'elementoscortantes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
