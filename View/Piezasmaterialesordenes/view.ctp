<div class="piezasmaterialesordenes view">
<h2><?php  echo __('Piezasmaterialesordene'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($piezasmaterialesordene['Piezasmaterialesordene']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordenreal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($piezasmaterialesordene['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $piezasmaterialesordene['Ordenreal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($piezasmaterialesordene['Vale']['id'], array('controller' => 'vales', 'action' => 'view', $piezasmaterialesordene['Vale']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Piezasmaterialesordene'), array('action' => 'edit', $piezasmaterialesordene['Piezasmaterialesordene']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Piezasmaterialesordene'), array('action' => 'delete', $piezasmaterialesordene['Piezasmaterialesordene']['id']), null, __('Are you sure you want to delete # %s?', $piezasmaterialesordene['Piezasmaterialesordene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Piezasmaterialesordenes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Piezasmaterialesordene'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('controller' => 'ordenreals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vales'), array('controller' => 'vales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vale'), array('controller' => 'vales', 'action' => 'add')); ?> </li>
	</ul>
</div>
