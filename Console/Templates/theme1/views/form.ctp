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
<div class="<?php echo $pluralVar; ?> container well well-not-padding" style = "width:500px">
<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('class'=>'form-horizontal')); ?>\n"; ?>
	<fieldset>
		<div class="head-form "><h4></a><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h4></div>
        <br />
<?php

		echo "\t<?php\n";
		foreach ($fields as $field) 
        {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				//echo "\t\techo \"<div class='control-group'>\";\n";
				//echo "\t\techo \"<label class='control-label' for='input{$field}'>{$field}</label>\";\n";
				//echo "\t\techo \"<div class='controls'>\";\n";
				echo "\t\techo \$this->Form->input('{$field}', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'{$field}&nbsp;')));\n";
				//echo "\t\techo \"<span class='help-block'>Example block-level help text here.</span>\";\n";
				//echo "\t\techo \"</div>\";\n";
			//	echo "\t\techo \"</div>\";\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
//	echo "<?php echo \$this->Form->end(array('label' => 'Guardar','div' => array('class' => 'form-actions',),'class' => 'btn btn-primary'));
    echo "<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/".strtolower($pluralVar)."'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>"
?>
	
</div>