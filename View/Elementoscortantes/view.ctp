<div class="elementoscortantes view">
<h2><?php  echo __('Elementoscortante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($elementoscortante['Elementoscortante']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materialelemento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($elementoscortante['Materialelemento']['id'], array('controller' => 'materialelementos', 'action' => 'view', $elementoscortante['Materialelemento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formascorte'); ?></dt>
		<dd>
			<?php echo $this->Html->link($elementoscortante['Formascorte']['id'], array('controller' => 'formascortes', 'action' => 'view', $elementoscortante['Formascorte']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipoelementoscortante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($elementoscortante['Tipoelementoscortante']['id'], array('controller' => 'tipoelementoscortantes', 'action' => 'view', $elementoscortante['Tipoelementoscortante']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($elementoscortante['Elementoscortante']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diametro'); ?></dt>
		<dd>
			<?php echo h($elementoscortante['Elementoscortante']['diametro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formasugecion'); ?></dt>
		<dd>
			<?php echo h($elementoscortante['Elementoscortante']['formasugecion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calzada'); ?></dt>
		<dd>
			<?php echo h($elementoscortante['Elementoscortante']['calzada']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Elementoscortante'), array('action' => 'edit', $elementoscortante['Elementoscortante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Elementoscortante'), array('action' => 'delete', $elementoscortante['Elementoscortante']['id']), null, __('Are you sure you want to delete # %s?', $elementoscortante['Elementoscortante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementoscortantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementoscortante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materialelementos'), array('controller' => 'materialelementos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materialelemento'), array('controller' => 'materialelementos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Formascortes'), array('controller' => 'formascortes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Formascorte'), array('controller' => 'formascortes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoelementoscortantes'), array('controller' => 'tipoelementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoelementoscortante'), array('controller' => 'tipoelementoscortantes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ctregistros'), array('controller' => 'ctregistros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ctregistro'), array('controller' => 'ctregistros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementocortanteoperaciones'), array('controller' => 'elementocortanteoperaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementocortanteoperacione'), array('controller' => 'elementocortanteoperaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vpcamaterialeselementoscortantes'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vpcamaterialeselementoscortante'), array('controller' => 'vpcamaterialeselementoscortantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ctregistros'); ?></h3>
	<?php if (!empty($elementoscortante['Ctregistro'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cartastecnologica Id'); ?></th>
		<th><?php echo __('Operacione Id'); ?></th>
		<th><?php echo __('Tipooperacione Id'); ?></th>
		<th><?php echo __('Elementoscortante Id'); ?></th>
		<th><?php echo __('Instrumentosauxiliare Id'); ?></th>
		<th><?php echo __('Instrumentosmedicion Id'); ?></th>
		<th><?php echo __('No Orden Operacion'); ?></th>
		<th><?php echo __('Diametro Ini'); ?></th>
		<th><?php echo __('Diametro Fin'); ?></th>
		<th><?php echo __('Longitud Diametro'); ?></th>
		<th><?php echo __('Longitud'); ?></th>
		<th><?php echo __('Prof Corte'); ?></th>
		<th><?php echo __('Cantidad Pasadas'); ?></th>
		<th><?php echo __('Avance'); ?></th>
		<th><?php echo __('Velocidad'); ?></th>
		<th><?php echo __('Revoluciones'); ?></th>
		<th><?php echo __('Tiempo Corte'); ?></th>
		<th><?php echo __('Tiempo Auxiliar'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($elementoscortante['Ctregistro'] as $ctregistro): ?>
		<tr>
			<td><?php echo $ctregistro['id']; ?></td>
			<td><?php echo $ctregistro['cartastecnologica_id']; ?></td>
			<td><?php echo $ctregistro['operacione_id']; ?></td>
			<td><?php echo $ctregistro['tipooperacione_id']; ?></td>
			<td><?php echo $ctregistro['elementoscortante_id']; ?></td>
			<td><?php echo $ctregistro['instrumentosauxiliare_id']; ?></td>
			<td><?php echo $ctregistro['instrumentosmedicion_id']; ?></td>
			<td><?php echo $ctregistro['no_orden_operacion']; ?></td>
			<td><?php echo $ctregistro['diametro_ini']; ?></td>
			<td><?php echo $ctregistro['diametro_fin']; ?></td>
			<td><?php echo $ctregistro['longitud_diametro']; ?></td>
			<td><?php echo $ctregistro['longitud']; ?></td>
			<td><?php echo $ctregistro['prof_corte']; ?></td>
			<td><?php echo $ctregistro['cantidad_pasadas']; ?></td>
			<td><?php echo $ctregistro['avance']; ?></td>
			<td><?php echo $ctregistro['velocidad']; ?></td>
			<td><?php echo $ctregistro['revoluciones']; ?></td>
			<td><?php echo $ctregistro['tiempo_corte']; ?></td>
			<td><?php echo $ctregistro['tiempo_auxiliar']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ctregistros', 'action' => 'view', $ctregistro['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ctregistros', 'action' => 'edit', $ctregistro['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ctregistros', 'action' => 'delete', $ctregistro['id']), null, __('Are you sure you want to delete # %s?', $ctregistro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ctregistro'), array('controller' => 'ctregistros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Elementocortanteoperaciones'); ?></h3>
	<?php if (!empty($elementoscortante['Elementocortanteoperacione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Operacione Id'); ?></th>
		<th><?php echo __('Elementoscortante Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($elementoscortante['Elementocortanteoperacione'] as $elementocortanteoperacione): ?>
		<tr>
			<td><?php echo $elementocortanteoperacione['id']; ?></td>
			<td><?php echo $elementocortanteoperacione['operacione_id']; ?></td>
			<td><?php echo $elementocortanteoperacione['elementoscortante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'elementocortanteoperaciones', 'action' => 'view', $elementocortanteoperacione['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'elementocortanteoperaciones', 'action' => 'edit', $elementocortanteoperacione['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'elementocortanteoperaciones', 'action' => 'delete', $elementocortanteoperacione['id']), null, __('Are you sure you want to delete # %s?', $elementocortanteoperacione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Elementocortanteoperacione'), array('controller' => 'elementocortanteoperaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Vpcamaterialeselementoscortantes'); ?></h3>
	<?php if (!empty($elementoscortante['Vpcamaterialeselementoscortante'])): ?>
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
		foreach ($elementoscortante['Vpcamaterialeselementoscortante'] as $vpcamaterialeselementoscortante): ?>
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
