<!--<div class="form-horizontal">
<?php //echo $this->Session->flash('auth'); ?>
<?php //echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php //echo __('Introduzca su nombre de usuario y contraseña'); ?></legend>
        <?php //echo $this->Form->input('username',array('width' =>'10','length'=>'10'));
        //echo $this->Form->input('password');
    ?>
    </fieldset>
<?php //echo $this->Form->end(__('Entrar')); ?>
</div>-->

<div class="login container well well-not-padding well-white" style = "width:500px">
<?php
    echo $this->Session->flash('auth'); 
    echo $this->Form->create('User', array('class'=>'form-horizontal')); ?>
    
	<fieldset>
		<div class="head-form "><?php echo __('Introduzca su nombre de usuario y contraseña'); ?></div>
        <br />
	<?php
		echo $this->Form->input('username', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Usuario&nbsp;')));
		echo $this->Form->input('password', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Contraseña&nbsp;')));
	?>
	</fieldset>
    
    <div class="form-actions">
    <button type="submit" class="btn btn-primary btn-large"><i class="icon-ok-sign icon-white"></i>&nbsp;Entrar</button>
    </div>
<?php 
        //echo $this->Form->end(array('label' => __('Entrar'),'div' => array('class' => 'form-actions',), 'class' => 'btn btn-primary btn-large'));
?>