<div class="agrupadormateriales view">
<h2><?php  echo __('Agrupadormateriale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agrupadormateriale['Agrupadormateriale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($agrupadormateriale['Agrupadormateriale']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factor Peso'); ?></dt>
		<dd>
			<?php echo h($agrupadormateriale['Agrupadormateriale']['factor_peso']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agrupadormateriale'), array('action' => 'edit', $agrupadormateriale['Agrupadormateriale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agrupadormateriale'), array('action' => 'delete', $agrupadormateriale['Agrupadormateriale']['id']), null, __('Are you sure you want to delete # %s?', $agrupadormateriale['Agrupadormateriale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agrupadormateriales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agrupadormateriale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmateriales'), array('controller' => 'tiposmateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmateriale'), array('controller' => 'tiposmateriales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tiposmateriales'); ?></h3>
	<?php if (!empty($agrupadormateriale['Tiposmateriale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Agrupadormateriale Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Resistencia Min'); ?></th>
		<th><?php echo __('Resistencia Max'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($agrupadormateriale['Tiposmateriale'] as $tiposmateriale): ?>
		<tr>
			<td><?php echo $tiposmateriale['id']; ?></td>
			<td><?php echo $tiposmateriale['agrupadormateriale_id']; ?></td>
			<td><?php echo $tiposmateriale['nombre']; ?></td>
			<td><?php echo $tiposmateriale['resistencia_min']; ?></td>
			<td><?php echo $tiposmateriale['resistencia_max']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tiposmateriales', 'action' => 'view', $tiposmateriale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tiposmateriales', 'action' => 'edit', $tiposmateriale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tiposmateriales', 'action' => 'delete', $tiposmateriale['id']), null, __('Are you sure you want to delete # %s?', $tiposmateriale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tiposmateriale'), array('controller' => 'tiposmateriales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
