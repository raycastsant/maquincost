<div class="ctregistros view">
<h2><?php  echo __('Ctregistro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cartastecnologica'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ctregistro['Cartastecnologica']['id'], array('controller' => 'cartastecnologicas', 'action' => 'view', $ctregistro['Cartastecnologica']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ctregistro['Operacione']['id'], array('controller' => 'operaciones', 'action' => 'view', $ctregistro['Operacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipooperacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ctregistro['Tipooperacione']['id'], array('controller' => 'tipooperaciones', 'action' => 'view', $ctregistro['Tipooperacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elementoscortante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ctregistro['Elementoscortante']['id'], array('controller' => 'elementoscortantes', 'action' => 'view', $ctregistro['Elementoscortante']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instrumentosauxiliare'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ctregistro['Instrumentosauxiliare']['id'], array('controller' => 'instrumentosauxiliares', 'action' => 'view', $ctregistro['Instrumentosauxiliare']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instrumentosmedicion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ctregistro['Instrumentosmedicion']['id'], array('controller' => 'instrumentosmedicions', 'action' => 'view', $ctregistro['Instrumentosmedicion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Orden Operacion'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['no_orden_operacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diametro Ini'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['diametro_ini']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diametro Fin'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['diametro_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud Diametro'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['longitud_diametro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['longitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prof Corte'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['prof_corte']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad Pasadas'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['cantidad_pasadas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avance'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['avance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Velocidad'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['velocidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Revoluciones'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['revoluciones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo Corte'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['tiempo_corte']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiempo Auxiliar'); ?></dt>
		<dd>
			<?php echo h($ctregistro['Ctregistro']['tiempo_auxiliar']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ctregistro'), array('action' => 'edit', $ctregistro['Ctregistro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ctregistro'), array('action' => 'delete', $ctregistro['Ctregistro']['id']), null, __('Are you sure you want to delete # %s?', $ctregistro['Ctregistro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ctregistros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ctregistro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartastecnologicas'), array('controller' => 'cartastecnologicas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartastecnologica'), array('controller' => 'cartastecnologicas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operaciones'), array('controller' => 'operaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacione'), array('controller' => 'operaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipooperaciones'), array('controller' => 'tipooperaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipooperacione'), array('controller' => 'tipooperaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementoscortantes'), array('controller' => 'elementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementoscortante'), array('controller' => 'elementoscortantes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instrumentosauxiliares'), array('controller' => 'instrumentosauxiliares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instrumentosauxiliare'), array('controller' => 'instrumentosauxiliares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instrumentosmedicions'), array('controller' => 'instrumentosmedicions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instrumentosmedicion'), array('controller' => 'instrumentosmedicions', 'action' => 'add')); ?> </li>
	</ul>
</div>
