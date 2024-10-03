<div class="container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Pieza', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar Carta tecnológica'); ?></h4></div>
        <br />
        
        <?php
	       echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'), 'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Seleccionar pieza&nbsp;')));
        ?>
    </fieldset>
    <hr />
    <div><center>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Insertar</button>
       <a class='btn' href='/maquincost/cartastecnologicas'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </center></div>	
</div>