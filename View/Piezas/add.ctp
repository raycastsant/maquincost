<div class="piezas container well well-not-padding" style = "width:500px">
    <?php echo $this->Form->create('Pieza', array('class'=>'form-horizontal')); ?>
    	<fieldset>
    		<div class="head-form "><h4></a><?php echo __('Insertar Pieza'); ?></h4></div>
            <br />
            
            <div class="span2"><a href="#modaldialog" role="button" data-toggle="modal"><img id="piezaicon" src="../img/parts/part1.jpg" style="width: 80px; height: 80px;" class="img-rounded img-polaroid" data-toggle="tooltip" title="Click para seleccionar imagen"/></a>
                <input id="PiezaImagen" value="part1.jpg" type="hidden" name="data[Pieza][imagen]"/> 
            </div>
            <br />
        	<?php
        		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>'Nombre&nbsp;')));
        	?>
    	</fieldset>
        
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/piezas'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>

<!-- Dialogo de Imágenes -->
    <div id="modaldialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Seleccionar icono</h3>
        </div>
        <div class="modal-body">
            <?php
	           $filelist = scandir("img".DS."parts".DS);
               
               if(count($filelist > 2))
               { 
            ?>  
                 <table cellpadding='0' cellspacing='0' class='table table-bordered table-condensed'>
                  <?php 
                    $tdCount = 0;
                    for($i=2; $i<count($filelist); $i++)
                    {
                        $tdcode = '<td><a id="'.substr($filelist[$i], 0, strlen($filelist[$i])-4).'"><img src="../img/parts/'.$filelist[$i].'" style="width: 80px; height: 80px; cursor: pointer;" class="img-rounded img-polaroid"/></a></td>';
                        
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
             $("#piezaicon").attr('src', '../img/parts/<?php echo $filelist[$i]?>');
             $("#PiezaImagen").attr('value', '<?php echo $filelist[$i]?>');
             $('#modaldialog').modal('hide');
           });
        <?php
         }  
        ?>   
     </script> 