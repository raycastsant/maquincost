<div class="vales view">
<h2><?php  echo __('Vale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materiale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vale['Materiale']['descripcion'], array('controller' => 'materiales', 'action' => 'view', $vale['Materiale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordenreal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vale['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $vale['Ordenreal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unidades'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['unidades']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Importe'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['importe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Solicitud'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['no_solicitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Salida'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['no_salida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Solicitud'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['fecha_solicitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Salida'); ?></dt>
		<dd>
			<?php echo h($vale['Vale']['fecha_salida']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vale'), array('action' => 'edit', $vale['Vale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vale'), array('action' => 'delete', $vale['Vale']['id']), null, __('Are you sure you want to delete # %s?', $vale['Vale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiale'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenreals'), array('controller' => 'ordenreals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordenreal'), array('controller' => 'ordenreals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Piezasmaterialesordenes'), array('controller' => 'piezasmaterialesordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Piezasmaterialesordene'), array('controller' => 'piezasmaterialesordenes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Piezasmaterialesordenes'); ?></h3>
	<?php if (!empty($vale['Piezasmaterialesordene'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordenreal Id'); ?></th>
		<th><?php echo __('Vale Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($vale['Piezasmaterialesordene'] as $piezasmaterialesordene): ?>
		<tr>
			<td><?php echo $piezasmaterialesordene['id']; ?></td>
			<td><?php echo $piezasmaterialesordene['ordenreal_id']; ?></td>
			<td><?php echo $piezasmaterialesordene['vale_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'piezasmaterialesordenes', 'action' => 'view', $piezasmaterialesordene['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'piezasmaterialesordenes', 'action' => 'edit', $piezasmaterialesordene['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'piezasmaterialesordenes', 'action' => 'delete', $piezasmaterialesordene['id']), null, __('Are you sure you want to delete # %s?', $piezasmaterialesordene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Piezasmaterialesordene'), array('controller' => 'piezasmaterialesordenes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
