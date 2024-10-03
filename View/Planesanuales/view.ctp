<div>
<?php
   if(count($plananualregistros) > 0)
   { 
        $planId = $planesanuale['Planesanuale']['id'];
        $cantPiezasTotal = 0;
        $matPrimPesoTotal = 0;
        $piezaPesoTotal = 0;
?>
    <div style="float: right;">
        <a class="btn btn-link" href="/maquincost/planesanuales/edit/<?php echo $planId; ?>"><i class="icon-pencil"></i>&nbsp;Editar</a>
        <a class="btn btn-link" href="/maquincost/planesanuales"><i class="icon-file"></i>&nbsp;Esportar a PDF</a>
        <form action="/maquincost/planesanuales/delete/<?php echo $planId; ?>" name="post_delplananual<?php echo $planId; ?>" id="post_delplananual<?php echo $planId; ?>" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
        <a class="btn btn-link" href="#" onclick="if (confirm('¿Está seguro que desea eliminar el plan anual?')) { document.post_delplananual<?php echo $planId; ?>.submit(); } event.returnValue = false; return false;"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a>
        |
        <a class="btn btn-link" href="/maquincost/planesanuales"><i class="icon-list"></i>&nbsp;Listar planes anuales</a>
    </div>
    <table class="table-borderedall table-borderedall-full table-condenseds" cellpadding="3" cellspacing="3" style="width: 100%;">
        <tr>
            <th colspan="3"><img src="/maquincost/img/logo_envocc.JPG" style="width: 60px; height: 60px;" /></th>
            <th colspan="8" style="font-weight: bold;">PLAN ANUAL DE PIEZAS DE REPUESTO</th>
            <th colspan="5" style="font-size: 12px; font-weight: bold; text-align: left;">
                Empresa <?php echo $planesanuale['Planesanuale']['empresa']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Año <?php echo $planesanuale['Planesanuale']['anno']; ?><br />
                Taller <?php echo $planesanuale['Planesanuale']['taller']; ?>
            </th>
        </tr>
        <tr>
            <th rowspan="4" style="font-size: 12px; font-weight: bold;">No Plano</th>
            <th rowspan="4" style="font-size: 12px; font-weight: bold;">Pieza</th>
            <th rowspan="4" style="font-size: 12px; font-weight: bold;">Modelo</th>
            <th rowspan="4" style="font-size: 12px; font-weight: bold;">No Carta Tecnológica</th>
            <th rowspan="4" style="font-size: 12px; font-weight: bold;">Cant. Piezas</th>  
        </tr>  
        <tr>
            <th colspan="4" style="font-size: 12px; font-weight: bold;">Peso en Kgs</th>
            <th colspan="2" style="font-size: 12px; font-weight: bold;">Materia prima</th>
            <th colspan="2" style="font-size: 12px; font-weight: bold;">Costo</th>
            <th colspan="2" style="font-size: 12px; font-weight: bold;">Fecha en que</th>
            <!-- <th rowspan="3" style="font-size: 12px; font-weight: bold;">Empresa o taller productor</th> -->
            <th rowspan="3" style="font-size: 12px; font-weight: bold;">Observaciones</th>
        </tr>
        <tr>
            <th colspan="2" style="font-size: 12px; font-weight: bold;">Materia prima</th>
            <th colspan="2" style="font-size: 12px; font-weight: bold;">Pieza terminada</th>
            <th rowspan="2" style="font-size: 12px; font-weight: bold;">Denominación</th>
            <th rowspan="2" style="font-size: 12px; font-weight: bold;">Dimensiones</th>
            <th rowspan="2" style="font-size: 12px; font-weight: bold;">Unidad</th>
            <th rowspan="2" style="font-size: 12px; font-weight: bold;">Total</th>
            <th rowspan="2" style="font-size: 12px; font-weight: bold;">Necesita</th>
            <th rowspan="2" style="font-size: 12px; font-weight: bold;">Recibe</th>
        </tr>
        <tr>
            <th style="font-size: 12px; font-weight: bold;">Unidad</th>
            <th style="font-size: 12px; font-weight: bold;">Total</th>
            <th style="font-size: 12px; font-weight: bold;">Unidad</th>
            <th style="font-size: 12px; font-weight: bold;">Total</th>
        </tr> 
                    
    <?php
    if(isset($plananualregistros) && count($plananualregistros)>0)
    {
        $i = 1;        
        foreach($plananualregistros as $row):
        {  
            $id = $row['Plananualregistro']['id'];
            ?>
            <tr> 
                <td style="font-size: 12px;" style="font-size: 12px;"><?php echo $row['Plananualregistro']['numeroplano']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Pieza']['nombre']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['modelo']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['no_molde_disp_etc']; ?></td>
                <td style="font-size: 12px;"><?php 
                        echo $row['Plananualregistro']['cantpiezas']; 
                        $cantPiezasTotal += $row['Plananualregistro']['cantpiezas'];
                    ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['matprim_pesounidad']; ?></td>
                <td style="font-size: 12px;"><?php 
                        echo $row['Plananualregistro']['matprim_pesototal']; 
                        $matPrimPesoTotal += $row['Plananualregistro']['matprim_pesototal'];
                    ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['pieza_pesotunidad']; ?></td>
                <td style="font-size: 12px;"><?php 
                        echo $row['Plananualregistro']['pieza_pesototal']; 
                        $piezaPesoTotal += $row['Plananualregistro']['pieza_pesototal'];
                        ?></td>
                <td style="font-size: 12px;"><?php echo $row['Materiale']['descripcion']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['matprima_largo']." x ".$row['Plananualregistro']['matprima_ancho']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['costounidad']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['costototal']; ?></td>  
                <td style="font-size: 12px;">
                <?php 
                    $y = date("Y", strtotime($row['Plananualregistro']['fecha_necesita'])); 
                    $m = date("m", strtotime($row['Plananualregistro']['fecha_necesita']));
                    $d = date("d", strtotime($row['Plananualregistro']['fecha_necesita']));  
                    echo $d."/".$m."/".$y;
                ?></td>
                <td style="font-size: 12px;">
                <?php 
                    $y = date("Y", strtotime($row['Plananualregistro']['fecha_recibe'])); 
                    $m = date("m", strtotime($row['Plananualregistro']['fecha_recibe']));
                    $d = date("d", strtotime($row['Plananualregistro']['fecha_recibe']));  
                    echo $d."/".$m."/".$y;
                ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['observaciones']; ?></td>
            </tr>       
  <?php 
            $i++;
        }
        endforeach;
    }
    ?>
        <tr>
            <td style="font-size: 12px; font-weight: bold;">Total</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="font-size: 12px; font-weight: bold;"><?php echo $cantPiezasTotal; ?></td>
            <td>&nbsp;</td>
            <td style="font-size: 12px; font-weight: bold;"><?php echo $matPrimPesoTotal; ?></td>
            <td>&nbsp;</td>
            <td style="font-size: 12px; font-weight: bold;"><?php echo $piezaPesoTotal; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>  
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="16" style="font-size: 12px; font-weight: bold;"><span class="span3">Fecha de elaboración</span><span class="span3">
                <?php 
                    $y = date("Y", strtotime($planesanuale['Planesanuale']['fecha_elaboracion'])); 
                    $m = date("m", strtotime($planesanuale['Planesanuale']['fecha_elaboracion']));
                    $d = date("d", strtotime($planesanuale['Planesanuale']['fecha_elaboracion']));  
                    echo $d."/".$m."/".$y; 
                ?></span>
            </td>
        </tr>
</table>
<br />
<?php
   }
?>
</div>