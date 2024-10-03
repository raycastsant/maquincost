<?php
if(!is_null($ordenes) && !is_null($laboriosidad))
{
    $labKeys = array_keys($laboriosidad);
    sort($labKeys);
?>

    <div class="span4"></div>
    <div class="span"><h4>Registro de órdenes de trabajo</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 99%;" class="table table-borderedall">
        <tr class="report-table-header">
            <th rowspan="2" style="vertical-align: bottom;">No. Orden</th>
            <th rowspan="2" style="vertical-align: bottom;">Pieza</th>
            <th rowspan="2" style="vertical-align: bottom;">Cantidad</th>
            <th rowspan="2" style="vertical-align: bottom;">Fecha inicio</th>
            <th rowspan="2" style="vertical-align: bottom;">Fecha cierre</th>
            <th rowspan="2" style="vertical-align: bottom;">Cerrada</th>
            <th rowspan="2" style="vertical-align: bottom;">Tipo trabajo</th>
            <th colspan="<?php echo count($labKeys); ?>" style="text-align: center;">Laboriosidad</th>
            <th colspan="3" style="text-align: center;">Gastos</th>
        </tr>
        <tr class="report-table-header">
            <?php
	           for($i=0; $i<count($labKeys); $i++)
               {
                    ?>
                  <th style="font-size: 12px; vertical-align: bottom;"><?php echo $labKeys[$i]; ?></th>
            <?php
               }
            ?>
            <th style="vertical-align: bottom;">Salario</th>
            <th style="vertical-align: bottom;">Materiales</th>
            <th style="vertical-align: bottom;">Total</th>
        </tr>
<?php
    $total_salario = 0;
    $total_materiales = 0;
    foreach($ordenes as $orden):
    {   
        $ordennumero = $orden['ordenes']['numero'];
    ?>
        <tr>
            <td><a href="/maquincost/ordenreals/edit/<?php echo $orden['ordenreals']['id']; ?>" target="_blank"><?php echo $ordennumero; ?></a></td>
            <td><?php echo $orden['piezas']['nombre']; ?></td>
            <td style="text-align: center;"><?php echo $orden['ordenreals']['piezas_elaboradas']; ?></td>
            <td><?php echo $orden['ordenreals']['fecha_inicio']; ?></td>
            <td><?php echo $orden['ordenreals']['fecha_cierre']; ?></td>
            <td><?php if($orden['ordenreals']['cerrada'] == '1')
                       echo "Si";
                      else
                       echo "No";  ?></td>
            <td><?php echo $orden['tipotrabajos']['descripcion']; ?></td>
        <?php
	       for($i=0; $i<count($labKeys); $i++)
           {
              $key = $labKeys[$i];
              if(array_key_exists($ordennumero, $laboriosidad[$key]))
               echo "<td style='text-align: center;'>".$laboriosidad[$key][$ordennumero]."</td>";
              else
               echo "<td style='text-align: center;'>0</td>"; 
           }
           
           $salario = $orden[0]['salario'];
           $materiales = $orden['ordenreals']['gasto_materiales'];
           $total_salario += $salario;
           $total_materiales += $materiales; 
        ?>
            <td style="text-align: center;"><?php echo $salario; ?></td>
            <td style="text-align: center;"><?php echo $materiales; ?></td>
            <td style="text-align: center;"><?php echo ($salario + $materiales); ?></td>
        </tr>
<?php
    }
    endforeach; 
    ?>
        <tr class="report-table-header">
            <td colspan="<?php echo 7+count($labKeys); ?>"><b>TOTAL</b></td>
            <td style="text-align: center;"><b><?php echo $total_salario; ?></b></td>
            <td style="text-align: center;"><b><?php echo $total_materiales; ?></b></td>
            <td style="text-align: center;"><b><?php echo ($total_salario + $total_materiales); ?></b></td>
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