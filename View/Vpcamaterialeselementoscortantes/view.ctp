<div class="vpcamaterialeselementoscortantes view">
<h2><?php  echo __('Vpcamaterialeselementoscortante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elementoscortante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vpcamaterialeselementoscortante['Elementoscortante']['id'], array('controller' => 'elementoscortantes', 'action' => 'view', $vpcamaterialeselementoscortante['Elementoscortante']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiposmateriale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vpcamaterialeselementoscortante['Tiposmateriale']['id'], array('controller' => 'tiposmateriales', 'action' => 'view', $vpcamaterialeselementoscortante['Tiposmateriale']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vpcamaterialeselementoscortante['Operacione']['nombre'], array('controller' => 'operaciones', 'action' => 'view', $vpcamaterialeselementoscortante['Operacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Min Viruta'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_min_viruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Max Viruta'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_max_viruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Av Min Viruta'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_min_viruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Av Max Viruta'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_max_viruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pfc Min Viruta'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_min_viruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pfc Max Viruta'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_max_viruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Min Desbaste'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_min_desbaste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Max Desbaste'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_max_desbaste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Av Min Desbaste'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_min_desbaste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Av Max Desbaste'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_max_desbaste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pfc Min Desbaste'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_min_desbaste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pfc Max Desbaste'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_max_desbaste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Min Afinar'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_min_afinar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vel Max Afinar'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_max_afinar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Av Min Afinar'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_min_afinar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Av Max Afinar'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_max_afinar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pfc Min Afinar'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_min_afinar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pfc Max Afinar'); ?></dt>
		<dd>
			<?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_max_afinar']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vpcamaterialeselementoscortante'), array('action' => 'edit', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vpcamaterialeselementoscortante'), array('action' => 'delete', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id']), null, __('Are you sure you want to delete # %s?', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vpcamaterialeselementoscortantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vpcamaterialeselementoscortante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elementoscortantes'), array('controller' => 'elementoscortantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elementoscortante'), array('controller' => 'elementoscortantes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmateriales'), array('controller' => 'tiposmateriales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmateriale'), array('controller' => 'tiposmateriales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operaciones'), array('controller' => 'operaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operacione'), array('controller' => 'operaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
