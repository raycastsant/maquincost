<div class="tiposmateriales view">
<h2><?php  echo __('Tiposmateriale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tiposmateriale['Tiposmateriale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agrupadormateriale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tiposmateriale['Agrupadormateriale']['nombre'], array('controller' => 'agrupadormateriales', 'action' => 'view', $tiposmateriale['Agrupadormateriale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tiposmateriale['Tiposmateriale']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resistencia Min'); ?></dt>
		<dd>
			<?php echo h($tiposmateriale['Tiposmateriale']['resistencia_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resistencia Max'); ?></dt>
		<dd>
			<?php echo h($tiposmateriale['Tiposmateriale']['resistencia_max']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tiposmateriale'), array('action' => 'edit', $tiposmateriale['Tiposmateriale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tiposmateriale'), array('action' => 'delete', $tiposmateriale['Tiposmateriale']['id']), null, __('Are you sure you want to delete # %s?', $tiposmateriale['Tiposmateriale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmateriales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmateriale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agrupadormateriales'), array('controller' => 'agrupadormateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agrupadormateriale'), array('controller' => 'agrupadormateriales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiale'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vpcamaterialeselementoscortantes'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vpcamaterialeselementoscortante'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Materiales'); ?></h3>
	<?php if (!empty($tiposmateriale['Materiale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tiposmateriale Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Um'); ?></th>
		<th><?php echo __('Existencia'); ?></th>
		<th><?php echo __('Precio Mn'); ?></th>
		<th><?php echo __('Precio Mlc'); ?></th>
		<th><?php echo __('Fecha Ultima Salida'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tiposmateriale['Materiale'] as $materiale): ?>
		<tr>
			<td><?php echo $materiale['id']; ?></td>
			<td><?php echo $materiale['tiposmateriale_id']; ?></td>
			<td><?php echo $materiale['codigo']; ?></td>
			<td><?php echo $materiale['descripcion']; ?></td>
			<td><?php echo $materiale['um']; ?></td>
			<td><?php echo $materiale['existencia']; ?></td>
			<td><?php echo $materiale['precio_mn']; ?></td>
			<td><?php echo $materiale['precio_mlc']; ?></td>
			<td><?php echo $materiale['fecha_ultima_salida']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'materiales', 'action' => 'view', $materiale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'materiales', 'action' => 'edit', $materiale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'materiales', 'action' => 'delete', $materiale['id']), null, __('Are you sure you want to delete # %s?', $materiale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Materiale'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Vpcamaterialeselementoscortantes'); ?></h3>
	<?php if (!empty($tiposmateriale['Vpcamaterialeselementoscortante'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Elementoscortante Id'); ?></th>
		<th><?php echo __('Tiposmateriale Id'); ?></th>
		<th><?php echo __('Vel Min Viruta'); ?></th>
		<th><?php echo __('Vel Max Viruta'); ?></th>
		<th><?php echo __('Av Min Viruta'); ?></th>
		<th><?php echo __('Av Max Viruta'); ?></th>
		<th><?php echo __('Pfc Min Viruta'); ?></th>
		<th><?php echo __('Pfc Max Viruta'); ?></th>
		<th><?php echo __('Vel Min Desbaste'); ?></th>
		<th><?php echo __('Vel Max Desbaste'); ?></th>
		<th><?php echo __('Av Min Desbaste'); ?></th>
		<th><?php echo __('Av Max Desbaste'); ?></th>
		<th><?php echo __('Pfc Min Desbaste'); ?></th>
		<th><?php echo __('Pfc Max Desbaste'); ?></th>
		<th><?php echo __('Vel Min Afinar'); ?></th>
		<th><?php echo __('Vel Max Afinar'); ?></th>
		<th><?php echo __('Av Min Afinar'); ?></th>
		<th><?php echo __('Av Max Afinar'); ?></th>
		<th><?php echo __('Pfc Min Afinar'); ?></th>
		<th><?php echo __('Pfc Max Afinar'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tiposmateriale['Vpcamaterialeselementoscortante'] as $vpcamaterialeselementoscortante): ?>
		<tr>
			<td><?php echo $vpcamaterialeselementoscortante['id']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['elementoscortante_id']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['tiposmateriale_id']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['vel_min_viruta']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['vel_max_viruta']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['av_min_viruta']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['av_max_viruta']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['pfc_min_viruta']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['pfc_max_viruta']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['vel_min_desbaste']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['vel_max_desbaste']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['av_min_desbaste']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['av_max_desbaste']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['pfc_min_desbaste']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['pfc_max_desbaste']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['vel_min_afinar']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['vel_max_afinar']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['av_min_afinar']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['av_max_afinar']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['pfc_min_afinar']; ?></td>
			<td><?php echo $vpcamaterialeselementoscortante['pfc_max_afinar']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'view', $vpcamaterialeselementoscortante['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'edit', $vpcamaterialeselementoscortante['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'delete', $vpcamaterialeselementoscortante['id']), null, __('Are you sure you want to delete # %s?', $vpcamaterialeselementoscortante['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vpcamaterialeselementoscortante'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
