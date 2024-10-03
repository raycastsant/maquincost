<?php
if(!is_null($valor_prod))
{
?>

   <center><h4>Valor de la producción realizada</h4>
    
    <table style="width: 80%;" border="1">
        <tr class="report-table-header">
            <th rowspan="2" style="text-align: center; vertical-align: bottom;">Valor de la producción</th>
            <th rowspan="2" style="text-align: center; vertical-align: bottom;">Costo x peso producción</th> 
            <th colspan="2" style="text-align: center;">Gastos</th>
        </tr>
        <tr class="report-table-header">
            <th style="text-align: center;">Materiales</th>
            <th style="text-align: center;">Salario</th>
        </tr>
        <tr>
            <td style="text-align: center;"><?php echo round($valor_prod[0][0]['valor_prod'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($valor_prod[0][0]['costo_peso'],2 ); ?></td>
            <td style="text-align: center;"><?php echo round($valor_prod[0][0]['materiales'], 2); ?></td>
            <td style="text-align: center;"><?php echo '$ '.round($valor_prod[0][0]['salario'], 2); ?></td>
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