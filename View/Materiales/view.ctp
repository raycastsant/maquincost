<div class="materiales view">
<h2><?php  echo __('Materiale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiposmateriale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($materiale['Tiposmateriale']['id'], array('controller' => 'tiposmateriales', 'action' => 'view', $materiale['Tiposmateriale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Um'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['um']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Existencia'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['existencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Mn'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['precio_mn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Mlc'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['precio_mlc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ultima Salida'); ?></dt>
		<dd>
			<?php echo h($materiale['Materiale']['fecha_ultima_salida']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Materiale'), array('action' => 'edit', $materiale['Materiale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Materiale'), array('action' => 'delete', $materiale['Materiale']['id']), null, __('Are you sure you want to delete # %s?', $materiale['Materiale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmateriales'), array('controller' => 'tiposmateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmateriale'), array('controller' => 'tiposmateriales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartastecnologicas'), array('controller' => 'cartastecnologicas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesanuales'), array('controller' => 'planesanuales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesanuale'), array('controller' => 'planesanuales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesmensuales'), array('controller' => 'planesmensuales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesmensuale'), array('controller' => 'planesmensuales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vales'), array('controller' => 'vales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vale'), array('controller' => 'vales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cartastecnologicas'); ?></h3>
	<?php if (!empty($materiale['Cartastecnologica'])): ?>
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
		foreach ($materiale['Cartastecnologica'] as $cartastecnologica): ?>
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
	<h3><?php echo __('Related Planesanuales'); ?></h3>
	<?php if (!empty($materiale['Planesanuale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipopieza Id'); ?></th>
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
		foreach ($materiale['Planesanuale'] as $planesanuale): ?>
		<tr>
			<td><?php echo $planesanuale['id']; ?></td>
			<td><?php echo $planesanuale['tipopieza_id']; ?></td>
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
	<?php if (!empty($materiale['Planesmensuale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ordene Id'); ?></th>
		<th><?php echo __('Tipopieza Id'); ?></th>
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
		foreach ($materiale['Planesmensuale'] as $planesmensuale): ?>
		<tr>
			<td><?php echo $planesmensuale['id']; ?></td>
			<td><?php echo $planesmensuale['ordene_id']; ?></td>
			<td><?php echo $planesmensuale['tipopieza_id']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Vales'); ?></h3>
	<?php if (!empty($materiale['Vale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Materiale Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Unidades'); ?></th>
		<th><?php echo __('Importe'); ?></th>
		<th><?php echo __('No Solicitud'); ?></th>
		<th><?php echo __('No Salida'); ?></th>
		<th><?php echo __('Fecha Solicitud'); ?></th>
		<th><?php echo __('Fecha Salida'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($materiale['Vale'] as $vale): ?>
		<tr>
			<td><?php echo $vale['id']; ?></td>
			<td><?php echo $vale['materiale_id']; ?></td>
			<td><?php echo $vale['cantidad']; ?></td>
			<td><?php echo $vale['unidades']; ?></td>
			<td><?php echo $vale['importe']; ?></td>
			<td><?php echo $vale['no_solicitud']; ?></td>
			<td><?php echo $vale['no_salida']; ?></td>
			<td><?php echo $vale['fecha_solicitud']; ?></td>
			<td><?php echo $vale['fecha_salida']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vales', 'action' => 'view', $vale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vales', 'action' => 'edit', $vale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vales', 'action' => 'delete', $vale['id']), null, __('Are you sure you want to delete # %s?', $vale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vale'), array('controller' => 'vales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
