<div class="tiemposmaquinadoreales view">
<h2><?php  echo __('Tiemposmaquinadoreale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tiemposmaquinadoreale['Tiemposmaquinadoreale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordenreal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tiemposmaquinadoreale['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $tiemposmaquinadoreale['Ordenreal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maquina'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tiemposmaquinadoreale['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $tiemposmaquinadoreale['Maquina']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo Auxiliar'); ?></dt>
		<dd>
			<?php echo h($tiemposmaquinadoreale['Tiemposmaquinadoreale']['tiempo_auxiliar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo Corte'); ?></dt>
		<dd>
			<?php echo h($tiemposmaquinadoreale['Tiemposmaquinadoreale']['tiempo_corte']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tiemposmaquinadoreale'), array('action' => 'edit', $tiemposmaquinadoreale['Tiemposmaquinadoreale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tiemposmaquinadoreale'), array('action' => 'delete', $tiemposmaquinadoreale['Tiemposmaquinadoreale']['id']), null, __('Are you sure you want to delete # %s?', $tiemposmaquinadoreale['Tiemposmaquinadoreale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiemposmaquinadoreales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiemposmaquinadoreale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('controller' => 'ordenreals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas'), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina'), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
