<div class="avances view">
<h2><?php  echo __('Avance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($avance['Avance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Selectore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($avance['Selectore']['nombre'], array('controller' => 'selectores', 'action' => 'view', $avance['Selectore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avance'); ?></dt>
		<dd>
			<?php echo h($avance['Avance']['avance']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Avance'), array('action' => 'edit', $avance['Avance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Avance'), array('action' => 'delete', $avance['Avance']['id']), null, __('Are you sure you want to delete # %s?', $avance['Avance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Avances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selectores'), array('controller' => 'selectores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selectore'), array('controller' => 'selectores', 'action' => 'add')); ?> </li>
	</ul>
</div>
