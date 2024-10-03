<div class="maquinasoperaciones view">
<h2><?php  echo __('Maquinasoperacione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maquinasoperacione['Maquinasoperacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maquina'); ?></dt>
		<dd>
			<?php echo $this->Html->link($maquinasoperacione['Maquina']['id'], array('controller' => 'maquinas', 'action' => 'view', $maquinasoperacione['Maquina']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($maquinasoperacione['Operacione']['id'], array('controller' => 'operaciones', 'action' => 'view', $maquinasoperacione['Operacione']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maquinasoperacione'), array('action' => 'edit', $maquinasoperacione['Maquinasoperacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maquinasoperacione'), array('action' => 'delete', $maquinasoperacione['Maquinasoperacione']['id']), null, __('Are you sure you want to delete # %s?', $maquinasoperacione['Maquinasoperacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinasoperaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquinasoperacione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas'), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina'), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operaciones'), array('controller' => 'operaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacione'), array('controller' => 'operaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
