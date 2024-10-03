<!------------------------- Este element es para mostrar los registros del plan mnsual. 
                                 Ver la vista edit de los planes mensuales ------------------------------------------->
<table class="table-borderedall table-condensed table-hover-orange table-striped" style="width: 100%;">
    <tr>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">&nbsp;</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">No Orden</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Pieza</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">&nbsp;</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Cant. Piezas</th>
        <th class="tableheadercolor" colspan="<?php echo count($maquinas); ?>" style="font-size: 12px; font-weight: bold;">Tiempo de maquinado</th>
        
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Costo</th>
        <th class="tableheadercolor" colspan="4" style="font-size: 12px; font-weight: bold;">Peso en Kg</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Tipo material</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Dimensión de la materia prima</th>
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Observaciones</th>
    </tr>  
    <tr>
    <?php   
          foreach($maquinas as $maquina):
          {     ?>
             <th class="tableheadercolor" rowspan="2" valign="top" style="font-size: 10px; font-weight: bold;"><?php print_text_vertical($maquina['Maquina']['nombre']); ?></th>            
    <?php }
          endforeach;
    ?>      
  
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Unidad</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Total</th>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Materia prima</th>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Pieza terminada</th>
    </tr>
    <tr>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">U</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Total</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">U</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Total</th>
    </tr>
    
    <!-- OJO!!. Esto no tiene funcionalidad, pero si no se pone entonces e 1er registro no se elimina 
         Ver posibilidad de eliminar cuando seenecuentre el problema  -->
            <form action="#" name="del_plananualregistro" id="del_plananualregistro" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
            </form> 
    <!------------------------------------------------------------------------------------------------->
                    
    <?php    
    if(isset($planmensualregistros) && count($planmensualregistros)>0)
    {
        $i = 1;        
        foreach($planmensualregistros as $row):
        {  
            $id = $row['planmensualregistros']['id'];
            ?>
            <tr>
             <?php   
                if(is_null($row['ordenes']['id']))
                {
                   $ordenId = -1;  
                   $ordenValue = "<center>-<center>";
                } 
                else
                {
                   $ordenId = $row['ordenes']['id'];
                   $ordenValue = $row['ordenes']['numero'];
                }     
                ?>
                
                 <td rowspan="2">
                    <div class="dropdown">
                      <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" title="Click para ver opciones"><span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="/maquincost/planmensualregistros/edit/<?php echo $id; ?>/<?php echo $this->request->data['Planesmensuale']['id']; ?>/<?php echo $ordenValue; ?>"><i class="icon-pencil"></i>&nbsp;Editar registro</a></li>
                        <form action="/maquincost/planmensualregistros/delete/<?php echo $id; ?>/<?php echo $this->request->data['Planesmensuale']['id']; ?>" name="del_registro<?php echo $id; ?>" id="del_registro<?php echo $id; ?>" style="display:none;" method="post">
                        <input type="hidden" name="_method" value="POST"/>
                        </form>
                        <li><a href="#" onclick="if (confirm('¿Está seguro que desea eliminar el registro?')) { document.del_registro<?php echo $id; ?>.submit(); } event.returnValue = false; return false;"><i class="icon-minus-sign"></i>&nbsp;Eliminar registro</a></li>
                        <li class="divider"></li> 
                <?php   if(!is_null($row['ordenes']['id']))
                        { ?>
                            <li><a href="/maquincost/ordenes/edit/<?php echo $row['ordenes']['id']; ?>"><i class="icon-qrcode"></i>&nbsp;Orden de trabajo</a></li>
                            <!-- <li><a href="/maquincost/planmensualregistros/edit/<?php echo $id; ?>"><i class="icon-qrcode"></i>&nbsp;Emitir orden de trabajo</a></li> -->
                <?php   }
                       /* else
                        {    ?>
                            <li><a href="/maquincost/planmensualregistros/edit/<?php echo $id; ?>"><i class="icon-qrcode"></i>&nbsp;Editar orden de trabajo</a></li>
                <?php   }    */?>      
                      </ul>
                    </div> 
                </td>   
               
                <td style="font-size: 12px;" rowspan="2"><?php echo $ordenValue; ?></td>
                <td style="font-size: 12px;" rowspan="2"><?php echo $row['piezas']['nombre']; ?></td>
                <td style="font-size: 12px; font-weight: bold;">P</td>
                <td style="font-size: 12px;"><?php echo $row['planmensualregistros']['cantpiezas']; ?></td>
            <?php
	            $tiemposmaquinado = $this->requestAction('cartastecnologicas/get_tiempos_maquinado_pieza/'.$row['planmensualregistros']['pieza_id'].'/'.$ordenId);
  
                foreach($maquinas as $maquina):
                {
                    $tdValue = "";
                    
                    foreach($tiemposmaquinado as $tm):
                    {
                        if($tm['cartastecnologicas']['maquina_id'] === $maquina['Maquina']['id'])
                        {
                            $tdValue = ($tm[0]['tcorte']+$tm[0]['tauxiliar']);
                            break;
                        }
                    }   
                    endforeach; ?> 
                    
                    <td style="font-size: 12px;"><?php echo $tdValue; ?></td>
             <?php       
                }
                endforeach;
            ?>
            <td style="font-size: 12px;"><?php echo $row['ordenes']['costo_pieza']; ?></td>
            <td style="font-size: 12px;"><?php echo ($row['ordenes']['costo_pieza'] * $row['planmensualregistros']['cantpiezas']); ?></td>
            <td style="font-size: 12px;"><?php echo $row['planmensualregistros']['matprim_pesounidad']; ?></td>
            <td style="font-size: 12px;"><?php echo $row['planmensualregistros']['matprim_pesototal']; ?></td>
            <td style="font-size: 12px;"><?php echo $row['planmensualregistros']['pieza_pesounidad']; ?></td>
            <td style="font-size: 12px;"><?php echo $row['planmensualregistros']['pieza_pesototal']; ?></td>
            
            <td style="font-size: 12px;" rowspan="2"><?php echo $row['materiales']['descripcion']; ?></td>
            <td style="font-size: 12px;" rowspan="2"><?php echo $row['planmensualregistros']['matprim_ancho']." x ".$row['planmensualregistros']['matprim_largo']; ?></td>
            <td style="font-size: 12px;" rowspan="2"><?php echo $row['planmensualregistros']['observaciones']; ?></td>
        </tr>       
        <tr>
            <td style="font-size: 12px; font-weight: bold;">R</td>
            <td style="font-size: 12px;"><?php echo $row['ordenreals']['piezas_elaboradas']; ?></td>
            <?php
	            $tiemposmaquinadoReales = $this->requestAction('tiemposmaquinadoreales/get_tiempos_maquinado_reales/'.$row['ordenreals']['id']);
  
                foreach($maquinas as $maquina):
                {
                    $tdValue = "";
                    
                    foreach($tiemposmaquinadoReales as $tm):
                    {
                        if($tm['Tiemposmaquinadoreale']['maquina_id'] === $maquina['Maquina']['id'])
                        {
                            $tdValue = ($tm['Tiemposmaquinadoreale']['tiempo_corte'] + $tm['Tiemposmaquinadoreale']['tiempo_auxiliar']);
                            break;
                        }
                    }   
                    endforeach; ?> 
                    
                    <td style="font-size: 12px;"><?php echo $tdValue; ?></td>
             <?php       
                }
                endforeach;
            ?>
            <td style="font-size: 12px;"><?php echo $row['ordenreals']['pieza_costo_unit']; ?></td>
            <td style="font-size: 12px;"><?php echo ($row['ordenreals']['piezas_elaboradas'] * $row['ordenreals']['pieza_costo_unit']); ?></td>
            <td style="font-size: 12px;"><?php echo $row['ordenreals']['mat_prim_peso_unit']; ?></td>
            <td style="font-size: 12px;"><?php echo ($row['ordenreals']['piezas_elaboradas'] * $row['ordenreals']['mat_prim_peso_unit']); ?></td>
            <td style="font-size: 12px;"><?php echo $row['ordenreals']['pieza_peso_unit']; ?></td>
            <td style="font-size: 12px;"><?php echo ($row['ordenreals']['piezas_elaboradas'] * $row['ordenreals']['pieza_peso_unit']); ?></td>
        </tr>
  <?php 
            $i++;
        }
        endforeach;
    }
    else
     echo "<h5>No se encontraron registros para el plan mensual</h5>";
    ?>
</table>
<br /><br /><br /><br /><br /><br />

<?php
	function print_text_vertical($text)
    {
        $jump = 0;
        for($i=0; $i<strlen($text); $i++)
        {
           echo substr($text, $i, 1);
           
           if($jump === 5)
           {
              echo "<br \>";
              $jump = 0;
           }   
           else
            $jump++;
        }
    }
?>