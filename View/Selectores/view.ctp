<div class="selectores view">
<h2><?php  echo __('Selectore'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($selectore['Selectore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Velocidadrango'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectore['Velocidadrango']['nombre'], array('controller' => 'velocidadrangos', 'action' => 'view', $selectore['Velocidadrango']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($selectore['Selectore']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Selectore'), array('action' => 'edit', $selectore['Selectore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Selectore'), array('action' => 'delete', $selectore['Selectore']['id']), null, __('Are you sure you want to delete # %s?', $selectore['Selectore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Selectores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selectore'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Velocidadrangos'), array('controller' => 'velocidadrangos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Velocidadrango'), array('controller' => 'velocidadrangos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avancesprofcortes'), array('controller' => 'avancesprofcortes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avancesprofcorte'), array('controller' => 'avancesprofcortes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Avancesprofcortes'); ?></h3>
	<?php if (!empty($selectore['Avancesprofcorte'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Selectore Id'); ?></th>
		<th><?php echo __('Avance'); ?></th>
		<th><?php echo __('Prof Corte'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($selectore['Avancesprofcorte'] as $avancesprofcorte): ?>
		<tr>
			<td><?php echo $avancesprofcorte['id']; ?></td>
			<td><?php echo $avancesprofcorte['selectore_id']; ?></td>
			<td><?php echo $avancesprofcorte['avance']; ?></td>
			<td><?php echo $avancesprofcorte['prof_corte']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'avancesprofcortes', 'action' => 'view', $avancesprofcorte['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'avancesprofcortes', 'action' => 'edit', $avancesprofcorte['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'avancesprofcortes', 'action' => 'delete', $avancesprofcorte['id']), null, __('Are you sure you want to delete # %s?', $avancesprofcorte['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Avancesprofcorte'), array('controller' => 'avancesprofcortes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
