<div class="elementocortanteoperaciones view">
<h2><?php  echo __('Elementocortanteoperacione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($elementocortanteoperacione['Elementocortanteoperacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($elementocortanteoperacione['Operacione']['id'], array('controller' => 'operaciones', 'action' => 'view', $elementocortanteoperacione['Operacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elementoscortante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($elementocortanteoperacione['Elementoscortante']['id'], array('controller' => 'elementoscortantes', 'action' => 'view', $elementocortanteoperacione['Elementoscortante']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Elementocortanteoperacione'), array('action' => 'edit', $elementocortanteoperacione['Elementocortanteoperacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Elementocortanteoperacione'), array('action' => 'delete', $elementocortanteoperacione['Elementocortanteoperacione']['id']), null, __('Are you sure you want to delete # %s?', $elementocortanteoperacione['Elementocortanteoperacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementocortanteoperaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementocortanteoperacione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operaciones'), array('controller' => 'operaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacione'), array('controller' => 'operaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementoscortantes'), array('controller' => 'elementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementoscortante'), array('controller' => 'elementoscortantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
