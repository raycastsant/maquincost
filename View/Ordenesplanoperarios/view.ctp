<div class="ordenesplanoperarios view">
<h2><?php  echo __('Ordenesplanoperario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordenesplanoperario['Ordenesplanoperario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordene'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordenesplanoperario['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $ordenesplanoperario['Ordene']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordenesplanoperario['Operario']['nombre'], array('controller' => 'operarios', 'action' => 'view', $ordenesplanoperario['Operario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horas'); ?></dt>
		<dd>
			<?php echo h($ordenesplanoperario['Ordenesplanoperario']['horas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tarifa'); ?></dt>
		<dd>
			<?php echo h($ordenesplanoperario['Ordenesplanoperario']['tarifa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($ordenesplanoperario['Ordenesplanoperario']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Terminacion'); ?></dt>
		<dd>
			<?php echo h($ordenesplanoperario['Ordenesplanoperario']['fecha_terminacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ordenesplanoperario'), array('action' => 'edit', $ordenesplanoperario['Ordenesplanoperario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ordenesplanoperario'), array('action' => 'delete', $ordenesplanoperario['Ordenesplanoperario']['id']), null, __('Are you sure you want to delete # %s?', $ordenesplanoperario['Ordenesplanoperario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenesplanoperarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenesplanoperario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes'), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene'), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operarios'), array('controller' => 'operarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operario'), array('controller' => 'operarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
