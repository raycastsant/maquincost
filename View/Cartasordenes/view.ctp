<div class="cartasordenes view">
<h2><?php  echo __('Cartasordene'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cartasordene['Cartasordene']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordene'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cartasordene['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $cartasordene['Ordene']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cartastecnologica'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cartasordene['Cartastecnologica']['codigo'], array('controller' => 'cartastecnologicas', 'action' => 'view', $cartasordene['Cartastecnologica']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cartasordene'), array('action' => 'edit', $cartasordene['Cartasordene']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cartasordene'), array('action' => 'delete', $cartasordene['Cartasordene']['id']), null, __('Are you sure you want to delete # %s?', $cartasordene['Cartasordene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartasordenes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartasordene'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes'), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene'), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartastecnologicas'), array('controller' => 'cartastecnologicas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
	</ul>
</div>
