<?php
if(!is_null($ordenes) && !is_null($laboriosidad))
{
    $labKeys = array_keys($laboriosidad);
    sort($labKeys);
?>

    <div class="span"><h4>Registro de órdenes de trabajo</h4></div>
    
    <center><table style="width: 100%;" class="table-borderedall" cellspacing="0" cellpadding="0">
        <tr class="report-table-header">
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">No. Orden</th>
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">Pieza</th>
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">Cantidad</th>
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">Fecha inicio</th>
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">Fecha cierre</th>
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">Cerrada</th>
            <th rowspan="2" style="font-size: 10px;vertical-align: bottom;">Tipo trabajo</th>
            <th colspan="<?php echo count($labKeys); ?>" style="font-size: 10px; text-align: center;">Laboriosidad</th>
            <th colspan="3" style="font-size: 10px; text-align: center;">Gastos</th>
        </tr>
        <tr class="report-table-header">
            <?php
	           for($i=0; $i<count($labKeys); $i++)
               {
                    ?>
                  <th style="font-size: 10px; vertical-align: bottom;"><?php echo $labKeys[$i]; ?></th>
            <?php
               }
            ?>
            <th style="font-size: 10px; vertical-align: bottom;">Salario</th>
            <th style="font-size: 10px; vertical-align: bottom;">Materiales</th>
            <th style="font-size: 10px; vertical-align: bottom;">Total</th>
        </tr>
<?php
    $total_salario = 0;
    $total_materiales = 0;
    foreach($ordenes as $orden):
    {   
        $ordennumero = $orden['ordenes']['numero'];
    ?>
        <tr>
            <td style="font-size: 10px;"><?php echo $ordennumero; ?></td>
            <td style="font-size: 10px;"><?php echo $orden['piezas']['nombre']; ?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $orden['ordenreals']['piezas_elaboradas']; ?></td>
            <td style="font-size: 10px;"><?php echo $orden['ordenreals']['fecha_inicio']; ?></td>
            <td style="font-size: 10px;"><?php echo $orden['ordenreals']['fecha_cierre']; ?></td>
            <td style="font-size: 10px;"><?php if($orden['ordenreals']['cerrada'] == '1')
                       echo "Si";
                      else
                       echo "No";  ?></td>
            <td style="font-size: 10px;"><?php echo $orden['tipotrabajos']['descripcion']; ?></td>
        <?php
	       for($i=0; $i<count($labKeys); $i++)
           {
              $key = $labKeys[$i];
              if(array_key_exists($ordennumero, $laboriosidad[$key]))
               echo "<td style='font-size: 10px; text-align: center;'>".$laboriosidad[$key][$ordennumero]."</td>";
              else
               echo "<td style='font-size: 10px; text-align: center;'>0</td>"; 
           }
           
           $salario = $orden[0]['salario'];
           $materiales = $orden['ordenreals']['gasto_materiales'];
           $total_salario += $salario;
           $total_materiales += $materiales; 
        ?>
            <td style="font-size: 10px; text-align: center;"><?php echo $salario; ?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $materiales; ?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo ($salario + $materiales); ?></td>
        </tr>
<?php
    }
    endforeach; 
    ?>
        <tr class="report-table-header">
            <td colspan="<?php echo 7+count($labKeys); ?>"><b>TOTAL</b></td>
            <td style="font-size: 10px; text-align: center;"><b><?php echo $total_salario; ?></b></td>
            <td style="font-size: 10px; text-align: center;"><b><?php echo $total_materiales; ?></b></td>
            <td style="font-size: 10px; text-align: center;"><b><?php echo ($total_salario + $total_materiales); ?></b></td>
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