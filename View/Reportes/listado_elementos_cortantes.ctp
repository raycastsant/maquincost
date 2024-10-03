<?php
if(!is_null($elementos))
{
   // print_r($elementos);
?>

    <div class="span4"></div>
    <div class="span"><h4>Reporte de elementos cortantes</h4></div>
    <div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <br /><br /><br />
<?php
    foreach($elementos as $elemento):
    {   
        /*$operaciones = "";
        foreach($elemento['Elementocortanteoperacione'] as $operacion):
        {
            $operaciones .= $operacion['Operacione']['nombre']." - ";
        }
        endforeach;
        
        $operaciones = substr($operaciones, 0, strlen($operaciones)-3);*/
?>

        <center><table style="width: 96%;" class="table table-borderedall">
            <tr class="report-table-header">
                <td style="width: 280px;"><b style="font-size: 18px;">Elemento: </b><?php echo $elemento['Elementoscortante']['nombre']; ?></td>
                <td style="width: 300px;"><b style="font-size: 18px;">Tipo: </b><?php echo $elemento['Tipoelementoscortante']['nombre']; ?></td>
                <td><b style="font-size: 18px;">Material: </b><?php echo $elemento['Materialelemento']['nombre']; ?></td>
            </tr>
            <tr>
                <td><b>Forma de corte: </b><?php echo $elemento['Formascorte']['nombre']; ?></td>
                <td><b>Descripción: </b><?php echo $elemento['Elementoscortante']['descripcion']; ?></td>
                <td><b>Es calzada: </b><?php if($elemento['Elementoscortante']['calzada'] === '1')
                                              echo "Si";
                                             else
                                              echo "No"; ?></td>
            </tr>
            <!-- <tr>
                <td colspan="3"><b>Operaciones que soporta: </b><?php echo $operaciones; ?></td>
            </tr> -->
            
        <?php
	        foreach($elemento['Elementocortanteoperacione'] as $operacion):
            {  ?>
                <tr style="background-color: #FAFFFB;">
                    <td colspan="3"><b>Operación: </b><?php echo $operacion['Operacione']['nombre']; ?></td>
                </tr>
        <?php   
                foreach($operacion['Vpcamaterialeselementoscortante'] as $vpca):
                {   
                    ?>
                    <tr>
                        <td style="text-align: right;"><b>Material: </b><?php echo $vpca['material_name']; ?></td>
                        <td colspan="2">
                            <table class="table table-borderedall" cellspacing="0" cellpadding="0">
                            <thead>
                              <tr class="report-table-header">
                                <th>&nbsp;</th>
                                <th><center>Avance</center></th>
                                <th><center>Velocidad</center></th>
                                <th><center>Profundiad de corte</center></th>
                              </tr>
                            </thead>  
                            <tbody><tr>
                               <td><b>Afinado</b></td>
                               <td><center>
                                 Min: <span class="label label-success"><?php echo $vpca['av_min_afinar']; ?></span>
                                 Max: <span class="label label-success"><?php echo $vpca['av_max_afinar']; ?></span>
                               </center></td>
                               <td><center>
                                 Min: <span class="label label-info"><?php echo $vpca['vel_min_afinar']; ?></span>
                                 Max: <span class="label label-info"><?php echo $vpca['vel_max_afinar']; ?></span>
                               </center></td>
                               <td><center>
                                 Min: <span class="label label-important"><?php echo $vpca['pfc_min_afinar']; ?></span>
                                 Max: <span class="label label-important"><?php echo $vpca['pfc_max_afinar']; ?></span>
                               </center></td>
                            </tr>
                            <tr>
                               <td><b>Desbaste</b></td>
                               <td><center>
                                 Min: <span class="label label-success"><?php echo $vpca['av_min_desbaste']; ?></span>
                                 Max: <span class="label label-success"><?php echo $vpca['av_max_desbaste']; ?></span>
                               </center></td>
                               <td><center>
                                 Min: <span class="label label-info"><?php echo $vpca['vel_min_desbaste']; ?></span>
                                 Max: <span class="label label-info"><?php echo $vpca['vel_max_desbaste']; ?></span>
                               </center></td>
                               <td><center>
                                 Min: <span class="label label-important"><?php echo $vpca['pfc_min_desbaste']; ?></span>
                                 Max: <span class="label label-important"><?php echo $vpca['pfc_max_desbaste']; ?></span>
                               </center></td>
                           </tr>
                           <tr>
                               <td><b>Viruta</b></td>
                               <td><center>
                                 Min: <span class="label label-success"><?php echo $vpca['av_min_viruta']; ?></span>
                                 Max: <span class="label label-success"><?php echo $vpca['av_max_viruta']; ?></span>
                               </center></td>
                               <td><center>
                                 Min: <span class="label label-info"><?php echo $vpca['vel_min_viruta']; ?></span>
                                 Max: <span class="label label-info"><?php echo $vpca['vel_max_viruta']; ?></span>
                               </center></td>
                               <td><center>
                                 Min: <span class="label label-important"><?php echo $vpca['pfc_min_viruta']; ?></span>
                                 Max: <span class="label label-important"><?php echo $vpca['pfc_max_viruta']; ?></span>
                               </center></td>
                           </tr>
                          </tbody></table>
                        </td>
                    </tr>                     
        <?php   }
                endforeach;
        ?>
        <?php
            }
            endforeach;
        ?>
            
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