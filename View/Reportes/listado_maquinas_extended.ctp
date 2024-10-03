<?php
if(!is_null($maquinas))
{
    //print_r($maquinas);
?>

    <div class="span4"></div>
    <div class="span"><h4>Reporte de máquinas y características</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br /><br /><br />
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
        <center><table style="width: 96%;" class="table table-borderedall">
            <tr class="report-table-header">
                <td style="width: 220px;"><b style="font-size: 18px;">Máquina: </b><?php echo $maquina['Maquina']['nombre']; ?></td>
                <td style="width: 300px;"><b style="font-size: 18px;">Modelo: </b><?php echo $maquina['Maquina']['modelo']; ?></td>
                <td><b style="font-size: 18px;">Coeficiente: </b><?php echo $maquina['Maquina']['coef_pieza']; ?></td>
                <td style="text-align: right;"><img style="width: 30px; height: 30px;" src="/maquincost/img/machines/<?php echo $maquina['Maquina']['imagen']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="4"><b>Operaciones que soporta: </b><?php echo $operaciones; ?></td>
            </tr>
    <?php
        foreach($maquina['rangos'] as $rango):
        {
            $vel_list = array();
            foreach($rango['Velocidade'] as $velocidad):
               $vel_list[] = $velocidad['velocidad'];     
            endforeach;
            
            sort($vel_list);
            $velocidades = "";
            foreach($vel_list as $velocidad):
                $velocidades .= $velocidad." - ";
            endforeach;
            
            /*foreach($rango['Velocidade'] as $velocidad):
                $velocidades .= $velocidad['velocidad']." - ";
            endforeach;*/
            $velocidades = substr($velocidades, 0, strlen($velocidades)-3); 
    ?> 
            <tr>
                <td colspan="4"><div class="span1">&nbsp;</div><b>Rango: </b><?php echo $rango['nombre']." ".$rango['vel_min']." - ".$rango['vel_max']; ?></td>
            </tr>
            <tr>
                <td colspan="4"><div class="span2">&nbsp;</div><b>Velocidades: </b><i><?php echo $velocidades; ?></i></td>
            </tr>
<?php   
            $sel_keys = array();
            foreach($rango['Selectore'] as $selector):
            {
                $selectores[$selector['nombre']] = $selector;
                $sel_keys[] = $selector['nombre'];
            }
            endforeach;
            
            sort($sel_keys);
            
            foreach($sel_keys as $sel_key):   //foreach($rango['Selectore'] as $selector):
            {   
                $selector = $selectores[$sel_key];
                
                $avances_list = array();
                foreach($selector['Avance'] as $avance):
                   $avances_list[] = $avance['avance'];     
                endforeach;
                
                sort($avances_list);
                $avances = "";
                foreach($avances_list as $avance):
                    $avances .= $avance." - ";
                endforeach;
                $avances = substr($avances, 0, strlen($avances)-3); 
                
                $profcortes_list = array();
                foreach($selector['Profcorte'] as $profcorte):
                   $profcortes_list[] = $profcorte['profcorte'];     
                endforeach;
                
                sort($profcortes_list);
                $profcortes = "";
                foreach($profcortes_list as $profcorte):
                    $profcortes .= $profcorte." - ";
                endforeach;
                $profcortes = substr($profcortes, 0, strlen($profcortes)-3); 
                ?>
                <tr>
                    <td valign="top" style="text-align: right;" rowspan="2"><span class="label label-info"><?php echo $selector['nombre']; ?></span></td> 
                    <td colspan="3"><b>Avances: </b><i><?php echo $avances; ?></i></td>
                </tr>
                <tr>
                    <td colspan="3"><b>Profundidades de corte: </b><i><?php echo $profcortes; ?></i></td>
                </tr>
<?php                
            }
            endforeach;
        }
        endforeach;   
    ?>
        </table></center>
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