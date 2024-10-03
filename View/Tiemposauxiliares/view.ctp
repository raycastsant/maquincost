<div class="tiemposauxiliares view">
<h2><?php  echo __('Tiemposauxiliare'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tiemposauxiliare['Tiemposauxiliare']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo'); ?></dt>
		<dd>
			<?php echo h($tiemposauxiliare['Tiemposauxiliare']['tiempo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tiemposauxiliare['Tiemposauxiliare']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tiemposauxiliare'), array('action' => 'edit', $tiemposauxiliare['Tiemposauxiliare']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tiemposauxiliare'), array('action' => 'delete', $tiemposauxiliare['Tiemposauxiliare']['id']), null, __('Are you sure you want to delete # %s?', $tiemposauxiliare['Tiemposauxiliare']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiemposauxiliares'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiemposauxiliare'), array('action' => 'add')); ?> </li>
	</ul>
</div>
