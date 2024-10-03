<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?> index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/<?php echo strtolower($pluralVar); ?>/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo "<?php echo __('Listado de {$pluralHumanName}'); ?>"; ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
	<?php  foreach ($fields as $field): 
				if ($field === 'id')
					{			
	?>
		<th><?php echo "<?php echo __('No.'); ?>"; } else {?>
				
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; } ?></th>
	<?php endforeach; ?>
		<th class="actions"><?php echo "<?php echo __('Acciones'); ?>"; ?></th>
	</tr>
	<?php
	/*$arrayParams = $this->Paginator->params();
	$pageCurrent = $arrayParams['page'];*/
	echo "\t\t<?php \$arrayParams = \$this->Paginator->params();  \$page = \$arrayParams['page']; \$pageLimit = \$arrayParams['limit'];?>\n";
	echo "<?php
	\$counter = (\$page-1)*\$pageLimit;
	foreach (\${$pluralVar} as \${$singularVar}): 
	\$counter +=1; ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			
			if ($isKey !== true) {
				if ($field === 'id')
				{
					echo "\t\t<td><?php echo \$counter;?>&nbsp;</td>\n";
				}
				else
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Html->link(__('Ver'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Html->link(__('Editar'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Form->postLink(__('Eliminar'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</table>
	<p>
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('<center>P&aacute;gina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, comenzando en el {:start}, terminando en el {:end}</center>')
	));
	?>"; ?>
	</p>
	<div class="paging">
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));\n";
		echo "\t\techo \$this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));\n";
		echo "\t?>\n";
	?>
	</div>
</div>