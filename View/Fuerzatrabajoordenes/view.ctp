<div class="fuerzatrabajoordenes view">
<h2><?php  echo __('Fuerzatrabajoordene'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fuerzatrabajoordene['Operario']['id'], array('controller' => 'operarios', 'action' => 'view', $fuerzatrabajoordene['Operario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordenreal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fuerzatrabajoordene['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $fuerzatrabajoordene['Ordenreal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formapago'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fuerzatrabajoordene['Formapago']['id'], array('controller' => 'formapagos', 'action' => 'view', $fuerzatrabajoordene['Formapago']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['salario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechacomienzo'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['fechacomienzo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechaterminacion'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['fechaterminacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Totalhoras'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['totalhoras']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tarifa'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['tarifa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Importe'); ?></dt>
		<dd>
			<?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['importe']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fuerzatrabajoordene'), array('action' => 'edit', $fuerzatrabajoordene['Fuerzatrabajoordene']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fuerzatrabajoordene'), array('action' => 'delete', $fuerzatrabajoordene['Fuerzatrabajoordene']['id']), null, __('Are you sure you want to delete # %s?', $fuerzatrabajoordene['Fuerzatrabajoordene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fuerzatrabajoordenes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fuerzatrabajoordene'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operarios'), array('controller' => 'operarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operario'), array('controller' => 'operarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('controller' => 'ordenreals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Formapagos'), array('controller' => 'formapagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formapago'), array('controller' => 'formapagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
