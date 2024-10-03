<?php
if(!is_null($materiales))
{
?>

    <div class="span4"></div>
    <div class="span"><h4>Reporte de gastos de materia prima</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 96%;" class="table table-bordered">
        <tr class="report-table-header">
            <th>Descripción</th>
            <th>Tipo de material</th>
            <th style="text-align: center;">Peso de material utilizado (kg)</th>
        </tr>
<?php
    $total_kg = 0;
    foreach($materiales as $mat):
    {   
        $total_kg += $mat[0]['peso'];
    ?>
        <tr>
            <td><?php echo $mat['materiales']['descripcion']; ?></td>
            <td><?php echo $mat['tiposmateriales']['nombre']; ?></td>
            <td style="text-align: center;"><?php echo $mat[0]['peso']; ?></td>
        </tr>
<?php
    }
    endforeach; 
    ?>
        <tr class="report-table-header">
            <td><b>TOTAL</b></td>
            <td>&nbsp;</td>
            <td style="text-align: center;"><b><?php echo $total_kg; ?></b></td>
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