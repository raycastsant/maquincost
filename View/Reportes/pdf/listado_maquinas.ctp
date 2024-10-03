<?php
if(!is_null($maquinas))
{
    //print_r($maquinas);
?>

    <center><h4>Reporte de máquinas y características</h4></center>
    <br />
<?php
     foreach($maquinas as $maquina):
    {   
        $operaciones = "";
        foreach($maquina['operaciones'] as $operacion):
        {
            $operaciones .= $operacion['Operacione']['nombre']." - ";
        }
        endforeach;
        
        $operaciones = substr($operaciones, 0, strlen($operaciones)-3);
        ?>
        <table style="width: 100%;" class="table-borderedall">
            <tr class="report-table-header">
                <td style="width: 5%;"><img style="width: 30px; height: 30px;" src="/img/machines/<?php echo $maquina['Maquina']['imagen']; ?>" /></td>
                <td style="width: 35%"><b style="font-size: 18px;"><?php echo $maquina['Maquina']['nombre']; ?></b></td>
                <td style="width: 30%;"><b style="font-size: 18px;">Modelo: </b><?php echo $maquina['Maquina']['modelo']; ?></td>
                <td><b style="font-size: 18px;">Coeficiente: </b><?php echo $maquina['Maquina']['coef_pieza']; ?></td>
            </tr>
            <tr>
                <td colspan="4"><b>Operaciones que soporta: </b><?php echo $operaciones; ?></td>
            </tr>
    <?php
        foreach($maquina['rangos'] as $rango):
        {
    ?> 
            <tr>
                <td>&nbsp;</td>
                <td><b>Rango de velocidades: </b><?php echo $rango[0]['rango']; ?></td>
                <td><b>Avances: </b><?php echo $rango[0]['avance_min']; ?> - <?php echo $rango[0]['avance_max']; ?></td>
                <td><b>Profundidades de corte: </b><?php echo $rango[0]['profcorte_min']; ?> - <?php echo $rango[0]['profcorte_max']; ?></td>
            </tr>
<?php                
        }
        endforeach;   
    ?>
        </table>
        <br />
<?php
    }
    endforeach;
}
else
{	
?>
    <div class="span4"></div>
    <div class="span"><h4>No se encontraron datos para el reporte</h4></div>
<?php
}
?>