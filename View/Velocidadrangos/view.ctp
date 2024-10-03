<div class="velocidadrangos view">
<h2><?php  echo __('Velocidadrango'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($velocidadrango['Velocidadrango']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maquina'); ?></dt>
		<dd>
			<?php echo $this->Html->link($velocidadrango['Maquina']['id'], array('controller' => 'maquinas', 'action' => 'view', $velocidadrango['Maquina']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($velocidadrango['Velocidadrango']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Min'); ?></dt>
		<dd>
			<?php echo h($velocidadrango['Velocidadrango']['vel_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Max'); ?></dt>
		<dd>
			<?php echo h($velocidadrango['Velocidadrango']['vel_max']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Velocidadrango'), array('action' => 'edit', $velocidadrango['Velocidadrango']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Velocidadrango'), array('action' => 'delete', $velocidadrango['Velocidadrango']['id']), null, __('Are you sure you want to delete # %s?', $velocidadrango['Velocidadrango']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Velocidadrangos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Velocidadrango'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas'), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina'), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selectores'), array('controller' => 'selectores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selectore'), array('controller' => 'selectores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Velocidades'), array('controller' => 'velocidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Velocidade'), array('controller' => 'velocidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Selectores'); ?></h3>
	<?php if (!empty($velocidadrango['Selectore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Velocidadrango Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($velocidadrango['Selectore'] as $selectore): ?>
		<tr>
			<td><?php echo $selectore['id']; ?></td>
			<td><?php echo $selectore['velocidadrango_id']; ?></td>
			<td><?php echo $selectore['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'selectores', 'action' => 'view', $selectore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'selectores', 'action' => 'edit', $selectore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'selectores', 'action' => 'delete', $selectore['id']), null, __('Are you sure you want to delete # %s?', $selectore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Selectore'), array('controller' => 'selectores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Velocidades'); ?></h3>
	<?php if (!empty($velocidadrango['Velocidade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Velocidadrango Id'); ?></th>
		<th><?php echo __('Velocidad'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($velocidadrango['Velocidade'] as $velocidade): ?>
		<tr>
			<td><?php echo $velocidade['id']; ?></td>
			<td><?php echo $velocidade['velocidadrango_id']; ?></td>
			<td><?php echo $velocidade['velocidad']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'velocidades', 'action' => 'view', $velocidade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'velocidades', 'action' => 'edit', $velocidade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'velocidades', 'action' => 'delete', $velocidade['id']), null, __('Are you sure you want to delete # %s?', $velocidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Velocidade'), array('controller' => 'velocidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
