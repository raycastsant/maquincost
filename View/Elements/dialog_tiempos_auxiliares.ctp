<!------------ Element para mostrar Dialogo de tiempos auxiliares. Ver Ctregistros add y edit -------------------->

 <?php
    if($errorFlag === '0')
    {
      ?> 
        <table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="5" cellpadding="5">
            <thead><tr>
                <th class="tableheadercolor"><center>Tiempo</center></th>
                <th class="tableheadercolor">Descripción</th>
                <th class="tableheadercolor">&nbsp;</th>
            </tr></thead>
        <?php
           foreach($values as $tiempo):
           { ?>
                <tr>
                    <td><center><?php echo $tiempo['Tiemposauxiliare']['tiempo']; ?></center></td>
                    <td><?php echo $tiempo['Tiemposauxiliare']['descripcion']; ?></td>
                    <td><center><a href="#" onclick="set_tauxiliar_formValue(<?php echo $tiempo['Tiemposauxiliare']['tiempo']; ?>)"><span class="badge badge-warning">seleccionar</span></a></center></td>
                </tr>
            <?php
           }
           endforeach;
        ?>
        </table>
<?php }  
      else
      {  ?> 
        <div class="alert alert-error alert-block">
          <b><?php echo $mesgHead; ?></b><br />
            <?php echo $mesg; ?>
        </div>
<?php
      }  ?>
 
 <script>
   //Establece el valor del tiempo auxiliar seleccionado en el formulario de Ctregistro
    function set_tauxiliar_formValue(value)
    {
        $('#dialog_tauxiliares').modal('hide');
        $('#CtregistroTiempoAuxiliar').prop('value', value);
    }
 </script>