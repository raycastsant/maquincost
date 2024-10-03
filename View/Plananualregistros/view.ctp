<div class="plananualregistros view">
<h2><?php  echo __('Plananualregistro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Planesanuale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($plananualregistro['Planesanuale']['anno'], array('controller' => 'planesanuales', 'action' => 'view', $plananualregistro['Planesanuale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pieza'); ?></dt>
		<dd>
			<?php echo $this->Html->link($plananualregistro['Pieza']['nombre'], array('controller' => 'piezas', 'action' => 'view', $plananualregistro['Pieza']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materiale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($plananualregistro['Materiale']['descripcion'], array('controller' => 'materiales', 'action' => 'view', $plananualregistro['Materiale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numeroplano'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['numeroplano']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['modelo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Molde Disp Etc'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['no_molde_disp_etc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantpiezas'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['cantpiezas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprim Pesounidad'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['matprim_pesounidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprim Pesototal'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['matprim_pesototal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pieza Pesotunidad'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['pieza_pesotunidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pieza Pesototal'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['pieza_pesototal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprima Largo'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['matprima_largo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matprima Ancho'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['matprima_ancho']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costounidad'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['costounidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costototal'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['costototal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Necesita'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['fecha_necesita']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Recibe'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['fecha_recibe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($plananualregistro['Plananualregistro']['observaciones']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plananualregistro'), array('action' => 'edit', $plananualregistro['Plananualregistro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plananualregistro'), array('action' => 'delete', $plananualregistro['Plananualregistro']['id']), null, __('Are you sure you want to delete # %s?', $plananualregistro['Plananualregistro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Plananualregistros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plananualregistro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planesanuales'), array('controller' => 'planesanuales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Planesanuale'), array('controller' => 'planesanuales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Piezas'), array('controller' => 'piezas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pieza'), array('controller' => 'piezas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiale'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
	</ul>
</div>
