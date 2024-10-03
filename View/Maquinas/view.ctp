<div class="maquinas view">
<h2><?php  echo __('Maquina'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maquina['Maquina']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($maquina['Maquina']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($maquina['Maquina']['modelo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maquina'), array('action' => 'edit', $maquina['Maquina']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maquina'), array('action' => 'delete', $maquina['Maquina']['id']), null, __('Are you sure you want to delete # %s?', $maquina['Maquina']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartastecnologicas'), array('controller' => 'cartastecnologicas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinasoperaciones'), array('controller' => 'maquinasoperaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquinasoperacione'), array('controller' => 'maquinasoperaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vpcamaquinas'), array('controller' => 'vpcamaquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vpcamaquina'), array('controller' => 'vpcamaquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cartastecnologicas'); ?></h3>
	<?php if (!empty($maquina['Cartastecnologica'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Semiproductoforma Id'); ?></th>
		<th><?php echo __('Maquina Id'); ?></th>
		<th><?php echo __('Tipopieza Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Piezamaquinada'); ?></th>
		<th><?php echo __('Urlplano'); ?></th>
		<th><?php echo __('Codigoplano'); ?></th>
		<th><?php echo __('Semiproducto Diametro'); ?></th>
		<th><?php echo __('Semiproducto Ancho'); ?></th>
		<th><?php echo __('Semiproducto Largo'); ?></th>
		<th><?php echo __('Semiproducto Peso Neto'); ?></th>
		<th><?php echo __('Semiproducto Peso Bruto'); ?></th>
		<th><?php echo __('Timpo Prep'); ?></th>
		<th><?php echo __('Tiempo Total'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($maquina['Cartastecnologica'] as $cartastecnologica): ?>
		<tr>
			<td><?php echo $cartastecnologica['id']; ?></td>
			<td><?php echo $cartastecnologica['materiale_id']; ?></td>
			<td><?php echo $cartastecnologica['semiproductoforma_id']; ?></td>
			<td><?php echo $cartastecnologica['maquina_id']; ?></td>
			<td><?php echo $cartastecnologica['tipopieza_id']; ?></td>
			<td><?php echo $cartastecnologica['codigo']; ?></td>
			<td><?php echo $cartastecnologica['piezamaquinada']; ?></td>
			<td><?php echo $cartastecnologica['urlplano']; ?></td>
			<td><?php echo $cartastecnologica['codigoplano']; ?></td>
			<td><?php echo $cartastecnologica['semiproducto_diametro']; ?></td>
			<td><?php echo $cartastecnologica['semiproducto_ancho']; ?></td>
			<td><?php echo $cartastecnologica['semiproducto_largo']; ?></td>
			<td><?php echo $cartastecnologica['semiproducto_peso_neto']; ?></td>
			<td><?php echo $cartastecnologica['semiproducto_peso_bruto']; ?></td>
			<td><?php echo $cartastecnologica['timpo_prep']; ?></td>
			<td><?php echo $cartastecnologica['tiempo_total']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cartastecnologicas', 'action' => 'view', $cartastecnologica['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cartastecnologicas', 'action' => 'edit', $cartastecnologica['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cartastecnologicas', 'action' => 'delete', $cartastecnologica['id']), null, __('Are you sure you want to delete # %s?', $cartastecnologica['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Maquinasoperaciones'); ?></h3>
	<?php if (!empty($maquina['Maquinasoperacione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maquina Id'); ?></th>
		<th><?php echo __('Operacione Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($maquina['Maquinasoperacione'] as $maquinasoperacione): ?>
		<tr>
			<td><?php echo $maquinasoperacione['id']; ?></td>
			<td><?php echo $maquinasoperacione['maquina_id']; ?></td>
			<td><?php echo $maquinasoperacione['operacione_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'maquinasoperaciones', 'action' => 'view', $maquinasoperacione['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'maquinasoperaciones', 'action' => 'edit', $maquinasoperacione['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'maquinasoperaciones', 'action' => 'delete', $maquinasoperacione['id']), null, __('Are you sure you want to delete # %s?', $maquinasoperacione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Maquinasoperacione'), array('controller' => 'maquinasoperaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Vpcamaquinas'); ?></h3>
	<?php if (!empty($maquina['Vpcamaquina'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maquina Id'); ?></th>
		<th><?php echo __('Velocidad Min'); ?></th>
		<th><?php echo __('Velocidad Max'); ?></th>
		<th><?php echo __('Avance Min'); ?></th>
		<th><?php echo __('Avance Max'); ?></th>
		<th><?php echo __('Profcorte Min'); ?></th>
		<th><?php echo __('Profcorte Max'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($maquina['Vpcamaquina'] as $vpcamaquina): ?>
		<tr>
			<td><?php echo $vpcamaquina['id']; ?></td>
			<td><?php echo $vpcamaquina['maquina_id']; ?></td>
			<td><?php echo $vpcamaquina['velocidad_min']; ?></td>
			<td><?php echo $vpcamaquina['velocidad_max']; ?></td>
			<td><?php echo $vpcamaquina['avance_min']; ?></td>
			<td><?php echo $vpcamaquina['avance_max']; ?></td>
			<td><?php echo $vpcamaquina['profcorte_min']; ?></td>
			<td><?php echo $vpcamaquina['profcorte_max']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vpcamaquinas', 'action' => 'view', $vpcamaquina['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vpcamaquinas', 'action' => 'edit', $vpcamaquina['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vpcamaquinas', 'action' => 'delete', $vpcamaquina['id']), null, __('Are you sure you want to delete # %s?', $vpcamaquina['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vpcamaquina'), array('controller' => 'vpcamaquinas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
