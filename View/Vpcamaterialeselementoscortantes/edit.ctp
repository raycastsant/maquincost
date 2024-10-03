<div class="vpcamaterialeselementoscortantes container well well-not-padding" style = "width:780px">
<?php echo $this->Form->create('Vpcamaterialeselementoscortante', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar registro de Avances, Velocidades y Profundidades de corte'); ?></h4>
        <p>Elemento Cortante: <?php echo $elementoName; ?></p>
        <p>Material: <?php echo $tmaterialData['Tiposmateriale']['nombre']." ".$tmaterialData['Tiposmateriale']['resistencia_min']."-".$tmaterialData['Tiposmateriale']['resistencia_max']." ".$tmaterialData['Tiposmateriale']['um']; ?></p></div>
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
        echo $this->Form->input('elementocortanteoperacione_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'style'=>'width: 250px', 'text'=>'Operaci�n&nbsp;')));
        
        //echo $this->Form->input('elementoscortante_id', array('class'=>'input', 'value'=>$elementoid, 'type'=>'hidden'));
        //echo $this->Form->input('operacione_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'style'=>'width: 250px', 'text'=>'Operaci�n&nbsp;')));
		//echo $this->Form->input('tiposmateriale_id', array('class'=>'input', 'value'=>$tmaterialData['Tiposmateriale']['id'], 'type'=>'hidden'));    
    ?>
    
        <table cellspacing="0" cellpadding="0" class="table table-striped table-borderedall">
            <thead>
                <th>&nbsp;</th>
                <th><center><h5>Avance</h5></center></th>
                <th><center><h5>Velocidad</h5></center></th>
                <th><center><h5>Profundidad de Corte</h5></center></th>
            </thead>
            <tr>
                <td><b>Para Afinar</b></td>
                <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="AvMinAfinar">M�nimo&nbsp;</label>
                        <input id="AvMinAfinar" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][av_min_afinar]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['av_min_afinar']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="AvMaxAfinar">M�ximo&nbsp;</label>
                        <input id="AvMaxAfinar" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][av_max_afinar]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['av_max_afinar']; ?>"/>
                    </div>
                </td>
                 <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="VelMinAfinar">M�nima&nbsp;</label>
                        <input id="VelMinAfinar" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][vel_min_afinar]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['vel_min_afinar']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="VelMaxAfinar">M�xima&nbsp;</label>
                        <input id="VelMaxAfinar" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][vel_max_afinar]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['vel_max_afinar']; ?>"/>
                    </div>
                </td>
                <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="PfcMinAfinar">M�nima&nbsp;</label>
                        <input id="PfcMinAfinar" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][pfc_min_afinar]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['pfc_min_afinar']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="PfcMaxAfinar">M�xima&nbsp;</label>
                        <input id="PfcMaxAfinar" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][pfc_max_afinar]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['pfc_max_afinar']; ?>"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Para Desbastar</b></td>
                <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="AvMinDesbaste">M�nimo&nbsp;</label>
                        <input id="AvMinDesbaste" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][av_min_desbaste]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['av_min_desbaste']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="AvMaxDesbaste">M�ximo&nbsp;</label>
                        <input id="AvMaxDesbaste" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][av_max_desbaste]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['av_max_desbaste']; ?>"/>
                    </div>
                </td>
                 <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="VelMinDesbaste">M�nima&nbsp;</label>
                        <input id="VelMinDesbaste" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][vel_min_desbaste]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['vel_min_desbaste']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="VelMaxDesbaste">M�xima&nbsp;</label>
                        <input id="VelMaxDesbaste" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][vel_max_desbaste]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['vel_max_desbaste']; ?>"/>
                    </div>
                </td>
                <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="PfcMinDesbaste">M�nima&nbsp;</label>
                        <input id="PfcMinDesbaste" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][pfc_min_desbaste]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['pfc_min_desbaste']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="PfcMaxDesbaste">M�xima&nbsp;</label>
                        <input id="PfcMaxDesbaste" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][pfc_max_desbaste]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['pfc_max_desbaste']; ?>"/>
                    </div>
                </td>
                </tr>
                <tr>
                <td><b>Para Viruta</b></td>
                <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="AvMinViruta">M�nimo&nbsp;</label>
                        <input id="AvMinViruta" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][av_min_viruta]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['av_min_viruta']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="AvMaxViruta">M�ximo&nbsp;</label>
                        <input id="AvMaxViruta" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][av_max_viruta]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['av_max_viruta']; ?>"/>
                    </div>
                </td>
                 <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="VelMinViruta">M�nima&nbsp;</label>
                        <input id="VelMinViruta" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][vel_min_viruta]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['vel_min_viruta']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="VelMaxViruta">M�xima&nbsp;</label>
                        <input id="VelMaxViruta" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][vel_max_viruta]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['vel_max_viruta']; ?>"/>
                    </div>
                </td>
                <td>
                    <div class="control-group required">
                        <label class="control-label-my" for="PfcMinViruta">M�nima&nbsp;</label>
                        <input id="PfcMinViruta" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][pfc_min_viruta]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['pfc_min_viruta']; ?>"/>
                    </div>
                    <div class="control-group required">
                        <label class="control-label-my" for="PfcMaxViruta">M�xima&nbsp;</label>
                        <input id="PfcMaxViruta" class="span1" type="number" step="any" name="data[Vpcamaterialeselementoscortante][pfc_max_viruta]" value="<?php echo $this->request->data['Vpcamaterialeselementoscortante']['pfc_max_viruta']; ?>"/>
                    </div>
                </td>
            </tr>
        </table>
	</fieldset>
    <div>
        <center>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/vpcamaterialeselementoscortantes/index/<?php echo $elementoid; ?>/<?php echo $tmaterialData['Tiposmateriale']['id']; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
        </center>
    </div>	
</div>