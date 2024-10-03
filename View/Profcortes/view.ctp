<div class="profcortes view">
<h2><?php  echo __('Profcorte'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profcorte['Profcorte']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Selectore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profcorte['Selectore']['nombre'], array('controller' => 'selectores', 'action' => 'view', $profcorte['Selectore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profcorte'); ?></dt>
		<dd>
			<?php echo h($profcorte['Profcorte']['profcorte']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profcorte'), array('action' => 'edit', $profcorte['Profcorte']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profcorte'), array('action' => 'delete', $profcorte['Profcorte']['id']), null, __('Are you sure you want to delete # %s?', $profcorte['Profcorte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profcortes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profcorte'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selectores'), array('controller' => 'selectores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selectore'), array('controller' => 'selectores', 'action' => 'add')); ?> </li>
	</ul>
</div>
