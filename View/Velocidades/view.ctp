<div class="velocidades view">
<h2><?php  echo __('Velocidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($velocidade['Velocidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Velocidadrango'); ?></dt>
		<dd>
			<?php echo $this->Html->link($velocidade['Velocidadrango']['nombre'], array('controller' => 'velocidadrangos', 'action' => 'view', $velocidade['Velocidadrango']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Velocidad'); ?></dt>
		<dd>
			<?php echo h($velocidade['Velocidade']['velocidad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Velocidade'), array('action' => 'edit', $velocidade['Velocidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Velocidade'), array('action' => 'delete', $velocidade['Velocidade']['id']), null, __('Are you sure you want to delete # %s?', $velocidade['Velocidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Velocidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Velocidade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Velocidadrangos'), array('controller' => 'velocidadrangos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Velocidadrango'), array('controller' => 'velocidadrangos', 'action' => 'add')); ?> </li>
	</ul>
</div>
