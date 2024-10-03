<div class="piezas view">
<h2><?php  echo __('Pieza'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pieza['Pieza']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($pieza['Pieza']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pieza'), array('action' => 'edit', $pieza['Pieza']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pieza'), array('action' => 'delete', $pieza['Pieza']['id']), null, __('Are you sure you want to delete # %s?', $pieza['Pieza']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Piezas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pieza'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartastecnologicas'), array('controller' => 'cartastecnologicas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesanuales'), array('controller' => 'planesanuales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesanuale'), array('controller' => 'planesanuales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesmensuales'), array('controller' => 'planesmensuales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesmensuale'), array('controller' => 'planesmensuales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cartastecnologicas'); ?></h3>
	<?php if (!empty($pieza['Cartastecnologica'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Semiproductoforma Id'); ?></th>
		<th><?php echo __('Maquina Id'); ?></th>
		<th><?php echo __('Pieza Id'); ?></th>
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
		foreach ($pieza['Cartastecnologica'] as $cartastecnologica): ?>
		<tr>
			<td><?php echo $cartastecnologica['id']; ?></td>
			<td><?php echo $cartastecnologica['materiale_id']; ?></td>
			<td><?php echo $cartastecnologica['semiproductoforma_id']; ?></td>
			<td><?php echo $cartastecnologica['maquina_id']; ?></td>
			<td><?php echo $cartastecnologica['pieza_id']; ?></td>
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
	<h3><?php echo __('Related Planesanuales'); ?></h3>
	<?php if (!empty($pieza['Planesanuale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pieza Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Numeroplano'); ?></th>
		<th><?php echo __('Modelo'); ?></th>
		<th><?php echo __('No Molde Disp Etc'); ?></th>
		<th><?php echo __('Cantpiezas'); ?></th>
		<th><?php echo __('Matprim Pesounidad'); ?></th>
		<th><?php echo __('Matprim Pesototal'); ?></th>
		<th><?php echo __('Pieza Pesotunidad'); ?></th>
		<th><?php echo __('Pieza Pesototal'); ?></th>
		<th><?php echo __('Matprima Largo'); ?></th>
		<th><?php echo __('Matprima Ancho'); ?></th>
		<th><?php echo __('Costounidad'); ?></th>
		<th><?php echo __('Costototal'); ?></th>
		<th><?php echo __('Fecha Necesita'); ?></th>
		<th><?php echo __('Fecha Recibe'); ?></th>
		<th><?php echo __('Empresa'); ?></th>
		<th><?php echo __('Observaciones'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pieza['Planesanuale'] as $planesanuale): ?>
		<tr>
			<td><?php echo $planesanuale['id']; ?></td>
			<td><?php echo $planesanuale['pieza_id']; ?></td>
			<td><?php echo $planesanuale['materiale_id']; ?></td>
			<td><?php echo $planesanuale['numeroplano']; ?></td>
			<td><?php echo $planesanuale['modelo']; ?></td>
			<td><?php echo $planesanuale['no_molde_disp_etc']; ?></td>
			<td><?php echo $planesanuale['cantpiezas']; ?></td>
			<td><?php echo $planesanuale['matprim_pesounidad']; ?></td>
			<td><?php echo $planesanuale['matprim_pesototal']; ?></td>
			<td><?php echo $planesanuale['pieza_pesotunidad']; ?></td>
			<td><?php echo $planesanuale['pieza_pesototal']; ?></td>
			<td><?php echo $planesanuale['matprima_largo']; ?></td>
			<td><?php echo $planesanuale['matprima_ancho']; ?></td>
			<td><?php echo $planesanuale['costounidad']; ?></td>
			<td><?php echo $planesanuale['costototal']; ?></td>
			<td><?php echo $planesanuale['fecha_necesita']; ?></td>
			<td><?php echo $planesanuale['fecha_recibe']; ?></td>
			<td><?php echo $planesanuale['empresa']; ?></td>
			<td><?php echo $planesanuale['observaciones']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'planesanuales', 'action' => 'view', $planesanuale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'planesanuales', 'action' => 'edit', $planesanuale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'planesanuales', 'action' => 'delete', $planesanuale['id']), null, __('Are you sure you want to delete # %s?', $planesanuale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Planesanuale'), array('controller' => 'planesanuales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Planesmensuales'); ?></h3>
	<?php if (!empty($pieza['Planesmensuale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordene Id'); ?></th>
		<th><?php echo __('Pieza Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Mes'); ?></th>
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
		foreach ($pieza['Planesmensuale'] as $planesmensuale): ?>
		<tr>
			<td><?php echo $planesmensuale['id']; ?></td>
			<td><?php echo $planesmensuale['ordene_id']; ?></td>
			<td><?php echo $planesmensuale['pieza_id']; ?></td>
			<td><?php echo $planesmensuale['materiale_id']; ?></td>
			<td><?php echo $planesmensuale['mes']; ?></td>
			<td><?php echo $planesmensuale['establecimiento']; ?></td>
			<td><?php echo $planesmensuale['cantpiezas']; ?></td>
			<td><?php echo $planesmensuale['costounidad']; ?></td>
			<td><?php echo $planesmensuale['costototal']; ?></td>
			<td><?php echo $planesmensuale['matprim_pesounidad']; ?></td>
			<td><?php echo $planesmensuale['matprim_pesototal']; ?></td>
			<td><?php echo $planesmensuale['matprim_ancho']; ?></td>
			<td><?php echo $planesmensuale['matprim_largo']; ?></td>
			<td><?php echo $planesmensuale['observaciones']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'planesmensuales', 'action' => 'view', $planesmensuale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'planesmensuales', 'action' => 'edit', $planesmensuale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'planesmensuales', 'action' => 'delete', $planesmensuale['id']), null, __('Are you sure you want to delete # %s?', $planesmensuale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Planesmensuale'), array('controller' => 'planesmensuales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
