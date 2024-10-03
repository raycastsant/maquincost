<!---------------- Este element es para mostrar las piezas y materiales gastados en la orden real ------------>

<table class="table table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th>Denominación</th>
        <th>Código</th>
        <th>Unidades</th>
        <th>Precio&nbsp;&nbsp;&nbsp;</th>
        <th>Importe&nbsp;&nbsp;&nbsp;</th>
        <th>Vale entrada</th>
        <th>Vale salida</th>
        <th>&nbsp;</th>
    </tr>
    
<?php  
    $buttons_disabling = 'if(flag == true)';
    $buttons_disabling .= ' stylevalue = "display: none";';
    $buttons_disabling .= 'else';
    $buttons_disabling .= ' stylevalue = "";';  
    foreach($vales as $vale):
    {        
        ?>
        <tr>
            <td><?php echo $vale['Materiale']['descripcion']; ?></td>
            <td><?php echo $vale['Materiale']['codigo']; ?></td>
            <td><?php echo $vale['Vale']['cantidad']; ?></td>
            <td>$ <?php echo round($vale['Vale']['precio'], 2); ?></td>
            <td style="text-align: right;"><span class="label label-success">$ <?php echo round($vale['Vale']['importe'], 2); ?></span></td>
            <td><?php echo $vale['Vale']['no_solicitud']; ?></td>
            <td><?php echo $vale['Vale']['no_salida']; ?></td>
            <td>
                <a class="btn btn-small" id="edit_vale<?php echo $vale['Vale']['id']; ?>" href="/maquincost/vales/edit/<?php echo $vale['Vale']['id']; ?>/<?php echo $ordenRealId; ?>" title="Editar registro"><i class="icon-pencil"></i></a>                                
                <input type="hidden" name="data[Vale][id]" class="input" value="<?php echo $vale['Vale']['id']; ?>" id="Vale<?php echo $vale['Vale']['id']; ?>" />
                <a class="btn btn-small" id="delete_vale<?php echo $vale['Vale']['id']; ?>" style="cursor: pointer;" onclick="delete_vale(<?php echo $vale['Vale']['id']; ?>)" title="Eliminar registro"><i class="icon-minus-sign"></i></a>
            </td> 
        </tr>
<?php
        $buttons_disabling .= '$("#edit_vale'.$vale['Vale']['id'].'").attr(\'style\', stylevalue);';
        $buttons_disabling .= '$("#delete_vale'.$vale['Vale']['id'].'").attr(\'style\', stylevalue);';
    }	
    endforeach;
?>
</table>

<script>
   //Elimina un registro piezas y materiales
    function delete_vale(id) 
    {
        if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) 
        {
            $.ajax(
            {
                async:true, data:$("#Vale"+id).serialize(), dataType:"html", 
                success:function (data, textStatus) 
                {
                    if(data = '1')
                     updatePiezasMaterialesList();
                }, 
                type:"post", url:"\/maquincost\/vales\/delete_via_AJAX"
            });
            
            return false;
        }
    };
    
    function disable_piezas_materiales_buttons(flag)
    {
        <?php echo $buttons_disabling; ?>
    }
</script>