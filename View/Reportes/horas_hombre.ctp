<?php
if(!is_null($operarios))
{
?>

    <div class="span4"></div>
    <div class="span"><h4>Reporte de horas-hombre trabajadas</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 96%;" class="table table-bordered">
        <tr class="report-table-header">
            <th>Nombre del operario</th>
            <th>Categoría ocupacional</th>
            <th style="text-align: center;">Tiempo trabajado (h)</th>
        </tr>
<?php
    $total_horas = 0;
    foreach($operarios as $operario):
    {   
        $total_horas += $operario[0]['horas'];
    ?>
        <tr>
            <td><?php echo $operario['operarios']['nombre']; ?></td>
            <td><?php echo $operario['calificacionoperarios']['nombre']; ?></td>
            <td style="text-align: center;"><?php echo $operario[0]['horas']; ?></td>
        </tr>
<?php
    }
    endforeach; 
    ?>
        <tr class="report-table-header">
            <td><b>TOTAL</b></td>
            <td>&nbsp;</td>
            <td style="text-align: center;"><b><?php echo $total_horas; ?></b></td>
        </tr> 
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