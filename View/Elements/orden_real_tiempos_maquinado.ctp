<!-------- Este element es para mostrar los tiempos de maquinado a la hora de gestionar los
                        datos reales de las órdenes de trabajo ------------------------------------------->

<table class="table table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th>Máquina</th>
        <th>Auxiliar</th>
        <th>Corte</th>
        <th style="text-align: right;">Total</th>
        <th colspan="2">&nbsp;</th>
    </tr> 
<?php
    $buttons_disabling = 'if(flag == true)';
    $buttons_disabling .= ' stylevalue = "display: none";';
    $buttons_disabling .= 'else';
    $buttons_disabling .= ' stylevalue = "";';  
    foreach($tiempos as $tiempo):
    {        
        $id = $tiempo['Tiemposmaquinadoreale']['id'];
        ?>
        <tr>
            <td><?php echo $tiempo['Maquina']['nombre']; ?></td>
            <td><?php echo $tiempo['Tiemposmaquinadoreale']['tiempo_auxiliar']; ?> min</td>
            <td><?php echo $tiempo['Tiemposmaquinadoreale']['tiempo_corte']; ?> min</td>
            <td style="text-align: right;"><span class="label label-warning"><?php echo ($tiempo['Tiemposmaquinadoreale']['tiempo_auxiliar'] + $tiempo['Tiemposmaquinadoreale']['tiempo_corte']); ?> min</span></td>
            <td><a class="btn btn-small" id="edit_tiempo<?php echo $id; ?>" href="/maquincost/tiemposmaquinadoreales/edit/<?php echo $id; ?>/<?php echo $tiempo['Tiemposmaquinadoreale']['ordenreal_id']; ?>" title="Editar registro"><i class="icon-pencil"></i></a></td>
            <input type="hidden" name="data[Tiemposmaquinadoreale][id]" class="input" value="<?php echo $id; ?>" id="Tiemposmaquinadoreale<?php echo $id; ?>" />
            <td><a class="btn btn-small" id="del_tiempo<?php echo $id; ?>" href="#" onclick="delete_tiempo_maquinado(<?php echo $id; ?>)" title="Eliminar registro"><i class="icon-minus-sign"></i></a></td>
        </tr>
<?php
        $buttons_disabling .= '$("#edit_tiempo'.$id.'").attr(\'style\', stylevalue);';
        $buttons_disabling .= '$("#del_tiempo'.$id.'").attr(\'style\', stylevalue);';
    }	
    endforeach;
?>
</table>

<script>
   //Elimina un registro de tiempos de maquinado real
    function delete_tiempo_maquinado(id) 
    {
        if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) 
        {
            $.ajax(
            {
                async:true, data:$("#Tiemposmaquinadoreale"+id).serialize(), dataType:"html", 
                success:function (data, textStatus) 
                {
                    if(data == '1')
                     updateTiemposMaquinadoReal();
                }, 
                type:"post", url:"\/maquincost\/tiemposmaquinadoreales\/delete_via_AJAX"
            });
            
            return false;
        }
    };
    
    function disable_tiempos_buttons(flag)
    {
        <?php echo $buttons_disabling; ?>
    }
</script>