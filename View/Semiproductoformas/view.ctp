<div class="semiproductoformas view">
<h2><?php  echo __('Semiproductoforma'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($semiproductoforma['Semiproductoforma']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($semiproductoforma['Semiproductoforma']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Semiproductoforma'), array('action' => 'edit', $semiproductoforma['Semiproductoforma']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Semiproductoforma'), array('action' => 'delete', $semiproductoforma['Semiproductoforma']['id']), null, __('Are you sure you want to delete # %s?', $semiproductoforma['Semiproductoforma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Semiproductoformas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Semiproductoforma'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartastecnologicas'), array('controller' => 'cartastecnologicas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cartastecnologicas'); ?></h3>
	<?php if (!empty($semiproductoforma['Cartastecnologica'])): ?>
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
		foreach ($semiproductoforma['Cartastecnologica'] as $cartastecnologica): ?>
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
