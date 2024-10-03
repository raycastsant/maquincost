<?php
if(!is_null($informes))
{
?>

    <div class="span4"></div>
    <div class="span"><h4>Control de piezas elaboradas</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 80%;" class="table table-borderedall">
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
    </table></center>
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