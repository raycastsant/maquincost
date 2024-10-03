<?php
if(!is_null($surtidos))
{
?>

    <div class="span4"></div>
    <div class="span"><h4>Reporte de cantidad de surtidos</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 96%;" class="table table-bordered">
        <tr class="report-table-header">
            <th rowspan="2">&nbsp;</th>
            <th rowspan="2" style="vertical-align: bottom;">Descripción del surtido</th>
            <th rowspan="2" style="vertical-align: bottom; text-align: center;">Cantidad de surtidos</th>
            <th colspan="2" style="text-align: center;">Cantidad de piezas</th>
        </tr>
        <tr class="report-table-header">
            <th style="text-align: center;">Producidas</th>
            <th style="text-align: center;">Recuperadas</th>
        </tr>  
<?php
    $total_surtidos = 0;
    $total_recuperadas = 0;
    $total_construidas = 0;
    foreach($surtidos as $pieza=>$row):
    { 
        $recuperadas = 0;
        if(array_key_exists('recuperadas', $row))
        {
           $recuperadas = $row['recuperadas'];
           $total_recuperadas += $recuperadas;
        } 
         
        $construidas = 0;
        if(array_key_exists('construidas', $row))
        {
           $construidas = $row['construidas'];
           $total_construidas += $construidas;
        }
        
        $total_surtidos += $row['cantsurtidos'];
    ?>
        <tr>
            <td><img src="/maquincost/img/parts/<?php echo $row['imagen']; ?>" style="height: 30px; width: 30px;"></td>
            <td><?php echo $pieza; ?></td>
            <td style="text-align: center;"><?php echo $row['cantsurtidos']; ?></td>
            <td style="text-align: center;"><?php echo $construidas; ?></td>
            <td style="text-align: center;"><?php echo $recuperadas; ?></td>
        </tr>
<?php
    }
    endforeach; 
    ?>
        <tr class="report-table-header">
            <td>&nbsp;</td>
            <td><b>TOTAL</b></td>
            <td style="text-align: center;"><b><?php echo $total_surtidos; ?></b></td>
            <td style="text-align: center;"><b><?php echo $total_construidas; ?></b></td>
            <td style="text-align: center;"><b><?php echo $total_recuperadas; ?></b></td>
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