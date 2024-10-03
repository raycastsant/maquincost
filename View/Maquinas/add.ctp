<div class="maquinas container well well-not-padding" style="width: 500px;">
<?php echo $this->Form->create('Maquina', array('class'=>'form-horizontal')); ?>
<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar Máquina'); ?></h4></div>  
        <br />
	<?php
//		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'nombre&nbsp;')));
//		echo $this->Form->input('modelo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'modelo&nbsp;')));
	?> 
    
<div class="span2">
    <a href="#modaldialog" role="button" data-toggle="modal"><img id="machineicon" src="../img/machines/torno2.png" style="width: 80px; height: 80px;" class="img-rounded img-polaroid" data-toggle="tooltip" title="Seleccionar imagen"/></a>
    <input id="MaquinaImagen" value="torno2.png" type="hidden" name="data[Maquina][imagen]"/>
    <br /><br /><br />
</div> 
<div>
    <label class="control-label-my" for="MaquinaNombre">Nombre&nbsp;</label>
    <div class="controls">
        <input id="MaquinaNombre" class="span3" type="text" maxlength="100" name="data[Maquina][nombre]"/>
    </div>
    <br />
    <label class="control-label-my" for="MaquinaModelo">Modelo&nbsp;</label>
    <div class="controls">
        <input id="MaquinaModelo" class="span3" type="text" maxlength="50" name="data[Maquina][modelo]"/>
    </div>
    <br /> 
    <label class="control-label-my" for="MaquinaCoefPieza">Coeficiente&nbsp;</label>
    <div class="controls">
        <input id="MaquinaCoefPieza" class="span2" type="number" maxlength="5" name="data[Maquina][coef_pieza]"/>
    </div>
    <br /> 
</div>

</fieldset>

<div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/maquinas'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
</div>	
</div>

 <!-- Modal -->
    <div id="modaldialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Seleccionar icono</h3>
        </div>
        <div class="modal-body">
            <?php
	           $filelist = scandir("img".DS."machines".DS);
               
               if(count($filelist > 2))
               { 
            ?>  
                 <table cellpadding='0' cellspacing='0' class='table table-bordered table-hover table-condensed'>
                  <?php 
                    $tdCount = 0;
                    for($i=2; $i<count($filelist); $i++)
                    {
                        $tdcode = '<td><a id="'.substr($filelist[$i], 0, strlen($filelist[$i])-4).'"><img src="../img/machines/'.$filelist[$i].'" style="width: 80px; height: 80px; cursor: pointer;" class="img-rounded img-polaroid user-data-links"/></a></td>';
                        
                        if($tdCount === 0) 
                         echo '</tr><tr>'.$tdcode;
                        else 
                         echo $tdcode; 
                         
                         $tdCount++;
                         if($tdCount === 4)
                          $tdCount = 0;
                    }
                    
                    echo '</tr>';
                  ?>
                 </table>
            <?php
               }
            ?>  
        </div>
       <!-- <div class="modal-footer">
            <button class="btn btn-link">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div> --> 
    </div>
    
    <script>
       $(document).ready(function() 
       {
          $('#machineicon').tooltip();
       });
              
       <?php
         for($i=2; $i<count($filelist); $i++)
         {
        ?>
           $("#<?php echo substr($filelist[$i], 0, strlen($filelist[$i])-4)?>").click(function()
           {
             $("#machineicon").attr('src', '../img/machines/<?php echo $filelist[$i]?>');
             $("#MaquinaImagen").attr('value', '<?php echo $filelist[$i]?>');
             $('#modaldialog').modal('hide');
           });
        <?php
         }  
        ?>   
     </script> 