<div class="plananualregistros container well well-not-padding" style = "width:750px">
<?php echo $this->Form->create('Plananualregistro', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar registro de plan anual'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('planesanuale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'hidden', 'value'=>$planId, 'label'=>array('class'=>'control-label', 'text'=>'')));
	?>
        <table cellpadding="3" cellspacing="1" style="width: 720px;" border="0">
            <tr>
                <td style="text-align: right;">Pieza</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Materia prima</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('materiale_id', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Número de Plano</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('numeroplano', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Modelo</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('modelo', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Número de Carta Tecnológica</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('no_molde_disp_etc', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Cantidad de piezas</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('cantpiezas', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Materia prima peso unidad (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprim_pesounidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Materia prima peso total (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprim_pesototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Materia prima largo (mm)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprima_largo', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Materia prima ancho (mm)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprima_ancho', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Pieza terminada peso unidad (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('pieza_pesotunidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Pieza terminada peso total (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('pieza_pesototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Costo unidad</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('costounidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Costo total</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('costototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Fecha en que necesita</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('fecha_necesita', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Fecha en que recibe</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('fecha_recibe', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Observaciones</td>
                <td colspan="3"><?php echo $this->Form->input('observaciones', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'span8', 'type'=>'text', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
        </table>

	</fieldset>
    <hr />
    <div>
        <center>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/planesanuales/edit/<?php echo $planId; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
       </center>
    </div>	
</div>
<br />

<script>
   $("#PlananualregistroFechaNecesita").datepicker();
   $("#PlananualregistroFechaRecibe").datepicker();
</script>