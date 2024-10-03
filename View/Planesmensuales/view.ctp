<div class="planesmensuales view">
<h2><?php  echo __('Planesmensuale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($planesmensuale['Planesmensuale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anno'); ?></dt>
		<dd>
			<?php echo h($planesmensuale['Planesmensuale']['anno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mes'); ?></dt>
		<dd>
			<?php echo h($planesmensuale['Planesmensuale']['mes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo h($planesmensuale['Planesmensuale']['empresa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo h($planesmensuale['Planesmensuale']['taller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Elaboracion'); ?></dt>
		<dd>
			<?php echo h($planesmensuale['Planesmensuale']['fecha_elaboracion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Planesmensuale'), array('action' => 'edit', $planesmensuale['Planesmensuale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Planesmensuale'), array('action' => 'delete', $planesmensuale['Planesmensuale']['id']), null, __('Are you sure you want to delete # %s?', $planesmensuale['Planesmensuale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesmensuales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesmensuale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planmensualregistros'), array('controller' => 'planmensualregistros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planmensualregistro'), array('controller' => 'planmensualregistros', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Planmensualregistros'); ?></h3>
	<?php if (!empty($planesmensuale['Planmensualregistro'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Planesmensuale Id'); ?></th>
		<th><?php echo __('Ordene Id'); ?></th>
		<th><?php echo __('Pieza Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Establecimiento'); ?></th>
		<th><?php echo __('Cantpiezas'); ?></th>
		<th><?php echo __('Costounidad'); ?></th>
		<th><?php echo __('Costototal'); ?></th>
		<th><?php echo __('Matprim Pesounidad'); ?></th>
		<th><?php echo __('Matprim Pesototal'); ?></th>
		<th><?php echo __('Matprim Ancho'); ?></th>
		<th><?php echo __('Matprim Largo'); ?></th>
		<th><?php echo __('Observaciones'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($planesmensuale['Planmensualregistro'] as $planmensualregistro): ?>
		<tr>
			<td><?php echo $planmensualregistro['id']; ?></td>
			<td><?php echo $planmensualregistro['planesmensuale_id']; ?></td>
			<td><?php echo $planmensualregistro['ordene_id']; ?></td>
			<td><?php echo $planmensualregistro['pieza_id']; ?></td>
			<td><?php echo $planmensualregistro['materiale_id']; ?></td>
			<td><?php echo $planmensualregistro['establecimiento']; ?></td>
			<td><?php echo $planmensualregistro['cantpiezas']; ?></td>
			<td><?php echo $planmensualregistro['costounidad']; ?></td>
			<td><?php echo $planmensualregistro['costototal']; ?></td>
			<td><?php echo $planmensualregistro['matprim_pesounidad']; ?></td>
			<td><?php echo $planmensualregistro['matprim_pesototal']; ?></td>
			<td><?php echo $planmensualregistro['matprim_ancho']; ?></td>
			<td><?php echo $planmensualregistro['matprim_largo']; ?></td>
			<td><?php echo $planmensualregistro['observaciones']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'planmensualregistros', 'action' => 'view', $planmensualregistro['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'planmensualregistros', 'action' => 'edit', $planmensualregistro['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'planmensualregistros', 'action' => 'delete', $planmensualregistro['id']), null, __('Are you sure you want to delete # %s?', $planmensualregistro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Planmensualregistro'), array('controller' => 'planmensualregistros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
