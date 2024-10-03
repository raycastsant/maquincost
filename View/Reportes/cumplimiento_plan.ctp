<?php
if(!is_null($data))
{
  echo "<br />";
  echo "<br />";
  echo "<br />";
?>

    <div class="span4"></div>
    <div class="span"><h4>Cumplimiento del plan</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br />
    
    <center><table style="width: 95%;" class="table table-borderedall">
        <tr class="report-table-header">
            <th colspan="9">Mes: <?php echo $data['mes']; ?></th>
        </tr>
        <tr class="report-table-header">
            <th colspan="2" style="text-align: center; vertical-align: bottom;">Plan <?php echo $data['anno']; ?></th>
            <th style="text-align: center; vertical-align: bottom;">Plan Mensual</th>
            <th colspan="2" style="text-align: center; vertical-align: bottom;">Real mes</th>
            <th colspan="2" style="text-align: center; vertical-align: bottom;">Real acumulado</th>
            <th rowspan="2" style="text-align: center; vertical-align: bottom;">% Cumplimiento mensual</th>
            <th rowspan="2" style="text-align: center; vertical-align: bottom;">% Cumplimiento acumulado</th>
        </tr>
        <tr class="report-table-header">
            <th style="text-align: center; vertical-align: bottom;">U</th>
            <th style="text-align: center; vertical-align: bottom;">MP</th>
            <th style="text-align: center; vertical-align: bottom;">U</th>
            <th style="text-align: center; vertical-align: bottom;">U</th>
            <th style="text-align: center; vertical-align: bottom;">MP</th>
            <th style="text-align: center; vertical-align: bottom;">U</th>
            <th style="text-align: center; vertical-align: bottom;">MP</th>
        </tr>
        <tr>
            <td style="text-align: center;"><?php echo round($data['uanual'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($data['mp_anual'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($data['u_mensual'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($data['u_real_mes'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($data['mp_real_mes'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($data['u_real_acum'], 2); ?></td>
            <td style="text-align: center;"><?php echo round($data['mp_real_acum'], 2); ?></td>
            <td style="text-align: center;">
                <?php if($data['u_mensual'] > 0)
                       echo round(($data['u_real_mes']/$data['u_mensual'])*100, 2); 
                      else
                       echo "0"; ?></td>
            <td style="text-align: center;">
                <?php if($data['uanual'] > 0)
                       echo round(($data['u_real_acum']/$data['uanual'])*100, 2); 
                      else
                       echo "0"; ?></td>
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