<!-------- Este element es para mostrar las horas trabajadas por lso operarios a la hora de gestionar los
                        datos reales de las órdenes de trabajo ------------------------------------------->

<table class="table table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th>Nombre</th>
        <th>Horas</th>
        <th>Tarifa</th>
        <th>Inicio</th>
        <th>Terminación</th>
        <th>Importe</th>
        <th>&nbsp;</th>
    </tr>
    
<?php  
    $buttons_disabling = 'if(flag == true)';
    $buttons_disabling .= ' stylevalue = "display: none";';
    $buttons_disabling .= 'else';
    $buttons_disabling .= ' stylevalue = "";';  
    foreach($operarios as $operario):
    {        
        ?>
        <tr>
            <td><a target="_blank" href="/maquincost/operarios/view/<?php echo $operario['Fuerzatrabajoordene']['operario_id']; ?>" title="Ver detalles del operario"><?php echo $operario['operarios']['nombre']; ?></a></td>
            <td><?php echo $operario['Fuerzatrabajoordene']['totalhoras']; ?> h</td>
            <td><?php echo $operario['Fuerzatrabajoordene']['tarifa']; ?> $/h</td>
            <td><?php echo $operario['Fuerzatrabajoordene']['fechacomienzo']; ?></td>
            <td><?php echo $operario['Fuerzatrabajoordene']['fechaterminacion']; ?></td>
            <td><?php echo "\$ ".($operario['Fuerzatrabajoordene']['totalhoras'] * $operario['Fuerzatrabajoordene']['tarifa']); ?></td>
            <td>
                <a class="btn btn-small" id="edit_op<?php echo $operario['Fuerzatrabajoordene']['id']; ?>" href="/maquincost/fuerzatrabajoordenes/edit/<?php echo $operario['Fuerzatrabajoordene']['id']; ?>/<?php echo $ordenrealId; ?>" title="Editar registro"><i class="icon-pencil"></i></a>                                
                <input type="hidden" name="data[Fuerzatrabajoordene][id]" class="input" value="<?php echo $operario['Fuerzatrabajoordene']['id']; ?>" id="OrdenRealOp<?php echo $operario['Fuerzatrabajoordene']['id']; ?>" />
                <a class="btn btn-small" id="delete_op<?php echo $operario['Fuerzatrabajoordene']['id']; ?>" href="#" onclick="delete_real_operario(<?php echo $operario['Fuerzatrabajoordene']['id']; ?>)" title="Eliminar registro"><i class="icon-minus-sign"></i></a>
            </td>
        </tr>
<?php
        $buttons_disabling .= '$("#edit_op'.$operario['Fuerzatrabajoordene']['id'].'").attr(\'style\', stylevalue);';
        $buttons_disabling .= '$("#delete_op'.$operario['Fuerzatrabajoordene']['id'].'").attr(\'style\', stylevalue);';
    }	
    endforeach;
?>
</table>

<script>
   //Elimina un registro de horas trabajadas via AJAX
    function delete_real_operario(id) 
    {
        if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) 
        {
            $.ajax(
            {
                async:true, data:$("#OrdenRealOp"+id).serialize(), dataType:"html", 
                success:function (data, textStatus) 
                {
                    if(data = '1')
                     updateOperariosRealList();
                }, 
                type:"post", url:"\/maquincost\/fuerzatrabajoordenes\/delete_via_AJAX"
            });
            
            return false;
        }
    };
    
    function disable_horas_buttons(flag)
    {
        <?php echo $buttons_disabling; ?>
    }
</script>