<!-------- Este element es para mostrar el listado de cartas tecnologicas a la hora de gestionar los 
             registros de los planes mensuales----------------------------------------------------------->

<table class="table-borderedall table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th>Seleccionada</th>
        <th>Carta tecnológica</th>
        <th>&nbsp;</th>
    </tr>
<?php
    $selected_ct = array();
    
    foreach($ct_list as $ct):
    {
        $inputId = 'check'.$ct['Cartastecnologica']['id'];
        $selected_ct[$inputId] = 'false';   
        
        ?>
        <tr>
            <td><center><input type="checkbox" id="<?php echo $inputId; ?>" checked="true" /></center></td>
            <td><?php echo $ct['Cartastecnologica']['codigo']; ?></td>
            <td><a target="_blank" href="/maquincost/cartastecnologicas/view/0/<?php echo $ct['Cartastecnologica']['id']; ?>"><i class="icon-list"></i>&nbsp;Detalles</a></td>
        </tr>
<?php
    }	
    endforeach;
?>
</table>

<hr />
<center>
    <a class="btn btn-inverse" href="#" data-dismiss="modal" aria-hidden="true" onclick="set_selected_cartas(1)">Aceptar</a>
</center>

<script>           
    <?php
	 /*  foreach($selected_ct as $key=>$value):
       {
          ?>
            $("#<?php echo $key; ?>").click(function() 
            {        
                $.ajax(
                {
                    async:true, data:$("#<?php echo $key; ?>").serialize(), dataType:"html", 
                    success:function (data, textStatus) 
                    {
                         $('#dialog_ct_list').modal('hide');
                         alert("ok");
                    }, 
                    type:"post", url:"\/maquincost\/main\/set_sesion_value\/<?php echo $key; ?>\/"+$("#<?php echo $key; ?>").prop('checked');
                });
                
                return false;
            }); 
    <?php
       }
       endforeach;*/
    ?>
    /*function set_selected_cartas(value)
    {    
       $('#dialog_ct_list').modal('hide');

    <?php
	  /* foreach($selected_ct as $key=>$value):
       {  ?>
          alert($("#<?php echo $key; ?>").prop('checked'));
    <?php            
       }
       endforeach;*/
    ?>
    }*/
</script>