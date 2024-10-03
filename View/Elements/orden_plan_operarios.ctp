<!-------- Este element es para mostrar las horas trabajadas por lso operarios a la hora de gestionar los
                        datos planificados de las órdenes de trabajo ------------------------------------------->

<!-- <center><a class="btn btn-small btn-primary" href="/maquincost/ordenesplanoperarios/add/<?php //echo $ordenId; ?>"><i class="icon-plus-sign icon-white"></i>Insertar</a></center>-->
<table class="table table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th>Nombre</th>
        <th>Horas</th>
        <th>Otros</th>
        <th>Tarifa</th>
        <th>Inicio</th>
        <th>Terminación</th>
        <th>Importe</th>
        <th>&nbsp;</th>
    </tr>
    
            <form action="#" name="post_delopo" id="post_delopo" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
            </form>
<?php
    foreach($operarios as $operario):
    {        
        ?>
        <tr>
            <td><a target="_blank" href="/maquincost/operarios/view/<?php echo $operario['operarios']['id']; ?>" title="Ver detalles del operario"><?php echo $operario['operarios']['nombre']; ?></a></td>
            <td><?php echo $operario['ordenesplanoperarios']['horas']; ?> h</td>
            <td><?php echo $operario['ordenesplanoperarios']['otros_tiempos']; ?> h</td>
            <td><?php echo $operario['ordenesplanoperarios']['tarifa']; ?> $/h</td>
            <td><?php echo $operario['ordenesplanoperarios']['fecha_inicio']; ?></td>
            <td><?php echo $operario['ordenesplanoperarios']['fecha_terminacion']; ?></td>
            <td><?php echo "\$ ".(($operario['ordenesplanoperarios']['horas']+$operario['ordenesplanoperarios']['otros_tiempos']) * $operario['ordenesplanoperarios']['tarifa']); ?></td>
            <td>
                <a class="btn btn-small" href="/maquincost/ordenesplanoperarios/edit/<?php echo $operario['ordenesplanoperarios']['id']; ?>/<?php echo $ordenId; ?>" title="Editar registro"><i class="icon-pencil"></i></a>
                
                <!-- <form action="/maquincost/ordenesplanoperarios/delete/<?php //echo $operario['ordenesplanoperarios']['id']; ?>/<?php //echo $ordenId; ?>" name="post_delopo<?php //echo $ordenId; ?>" id="post_delopo<?php //echo $ordenId; ?>" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
                <a class="btn btn-small" href="#" onclick="if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) { document.post_delopo<?php //echo $ordenId; ?>.submit(); } event.returnValue = false; return false;" title="Eliminar registro"><i class="icon-minus-sign"></i></a> -->
                
                <input type="hidden" name="data[Ordenplanoperario][id]" class="input" value="<?php echo $operario['ordenesplanoperarios']['id']; ?>" id="OrdenePlanOp<?php echo $operario['ordenesplanoperarios']['id']; ?>" />
                <a class="btn btn-small" href="#" onclick="delete_plan_operario(<?php echo $operario['ordenesplanoperarios']['id']; ?>)" title="Eliminar registro"><i class="icon-minus-sign"></i></a>
            </td>
        </tr>
<?php
    }	
    endforeach;
?>
</table>

<script>
   //Elimina un registro de horas trabajadas via AJAX
    function delete_plan_operario(id) 
    {
        if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) 
        {
            $.ajax(
            {
                async:true, data:$("#OrdenePlanOp"+id).serialize(), dataType:"html", 
                success:function (data, textStatus) 
                {
                    if(data = '1')
                     updateOperariosList();
                }, 
                type:"post", url:"\/maquincost\/ordenesplanoperarios\/delete_via_AJAX"
            });
            
            return false;
        }
    };
</script>