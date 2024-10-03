<?php
if(!is_null($informes))
{
?>
    <h4>Control de piezas elaboradas</h4>
    
    <table style="width: 90%;" border="1">
        <tr class="report-table-header">
            <th>Empresa</th>
            <th>Unidad</th> 
            <th>Código</th>
            <th>Pieza</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Importe</th>
            <th>Fecha</th>
        </tr>
<?php
    
    foreach($informes as $informe):
    {   
    ?>
       <tr>
        <td><?php echo $informe['informerecepcions']['empresa']; ?></td>
        <td><?php echo $informe['informerecepcions']['unidad']; ?></td>
        <td><?php echo $informe['informerecepcions']['codigo']; ?></td>
        <td><?php echo $informe['piezas']['nombre']; ?></td>
        <td><?php echo $informe['ordenreals']['piezas_elaboradas']; ?></td>
        <td><?php echo round($informe['ordenreals']['pieza_precio'], 2); ?></td>
        <td><?php echo round(($informe['ordenreals']['pieza_precio']*$informe['ordenreals']['piezas_elaboradas']), 2); ?></td>
        <td><?php echo $informe['informerecepcions']['fecha']; ?></td>
       </tr>
<?php
    }
    endforeach; 
    ?>
    </table>
<?php
}
else
{	
?>
    <div class="span4"></div>
    <div class="span"><h4>No se encontraron datos para el reporte</h4></div>
<?php
}
?>