<?php
if(!is_null($operarios))
{
?>

    <div class="span4"></div>
    <div class="span"><h4>Reporte de operarios y tarifas</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 96%;" class="table table-bordered">
        <tr class="report-table-header">
            <th>&nbsp;</th>
            <th>Nombre</th>
            <th>Calificador</th>
            <th>Tarifa</th>
            <th>Direcci�n</th>
            <th>CI</th>
        </tr>
<?php
    foreach($operarios as $operario):
    { 
    ?>
        <tr>
            <td><i class="icon-user"></i></td>
            <td><?php echo $operario['Operario']['nombre']; ?></td>
            <td><?php echo $operario['Calificacionoperario']['nombre']; ?></td>
            <td><?php echo $operario['Calificacionoperario']['tarifa']; ?> $/h</td>
            <td><?php echo $operario['Operario']['direcci�n']; ?></td>
            <td><?php echo $operario['Operario']['ci']; ?></td>
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