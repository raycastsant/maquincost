    <div class="span"><h4>Reporte de tiempo de operación de las máquinas</h4></div>
    <br />
    
    <center><table style="width: 96%;" class="table table-bordered">
        <tr class="report-table-header">
            <th>&nbsp;</th>
            <th>Máquina</th>
            <th>Tiempo auxiliar (h)</th>
            <th>Tiempo de operación (h)</th>
            <th>Tiempo total (h)</th>
        </tr>
<?php
    $tauxiliar_TOTAL = 0;
    $toperacion_TOTAL = 0;
 
    foreach($maquinas as $maq):
    { 
        $tauxiliar = $maq[0]['tauxiliar'];
        $toperacion = $maq[0]['toperacion'];
        $tauxiliar_TOTAL += $tauxiliar;
        $toperacion_TOTAL += $toperacion;
    ?>
        <tr>
            <td><img src="/maquincost/img/machines/<?php echo $maq['maquinas']['imagen']; ?>" style="height: 30px; width: 30px;"></td>
            <td><?php echo $maq[0]['maquina']; ?></td>
            <td style="text-align: center;"><?php echo round($tauxiliar, 2); ?></td>
            <td style="text-align: center;"><?php echo round($toperacion, 2); ?></td>
            <td style="text-align: center;"><?php echo round(($tauxiliar+$toperacion), 2); ?></td>
        </tr>
<?php
    }
    endforeach; 
    ?>
        <tr class="report-table-header">
            <td>&nbsp;</td>
            <td><b>TOTAL</b></td>
            <td style="text-align: center;"><b><?php echo round($tauxiliar_TOTAL, 2); ?></b></td>
            <td style="text-align: center;"><b><?php echo round($toperacion_TOTAL, 2); ?></b></td>
            <td style="text-align: center;"><b><?php echo round($tauxiliar_TOTAL+$toperacion_TOTAL, 2); ?></b></td>
        </tr>
    </table></center>