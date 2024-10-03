<!------------------------- Este element es para mostrar los registros del plan anual. 
                                 Ver la vista edit de los planes anuales ------------------------------------------->

<table class="table-borderedall table-condensed table-hover-orange table-striped" style="width: 100%;">
    <tr>
        <th class="tableheadercolor" colspan="2" rowspan="4" style="font-size: 12px; font-weight: bold;">&nbsp;</th>
        <th class="tableheadercolor" rowspan="4" style="font-size: 12px; font-weight: bold;">No Plano</th>
        <th class="tableheadercolor" rowspan="4" style="font-size: 12px; font-weight: bold;">Pieza</th>
        <th class="tableheadercolor" rowspan="4" style="font-size: 12px; font-weight: bold;">Modelo</th>
        <th class="tableheadercolor" rowspan="4" style="font-size: 12px; font-weight: bold;">No Carta Tecnológica</th>
        <th class="tableheadercolor" rowspan="4" style="font-size: 12px; font-weight: bold;">Cant. Piezas</th>  
    </tr>  
    <tr>
        <th class="tableheadercolor" colspan="4" style="font-size: 12px; font-weight: bold;">Peso en Kgs</th>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Materia prima</th>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Costo</th>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Fecha en que</th>
        <!-- <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Empresa o taller productor</th> -->
        <th class="tableheadercolor" rowspan="3" style="font-size: 12px; font-weight: bold;">Observaciones</th>
    </tr>
    <tr>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Materia prima</th>
        <th class="tableheadercolor" colspan="2" style="font-size: 12px; font-weight: bold;">Pieza terminada</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Denominación</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Dimensiones</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Unidad</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Total</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Necesita</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Recibe</th>
    </tr>
    <tr>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Unidad</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Total</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Unidad</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Total</th>
    </tr> 
    
    <!-- OJO!!. Esto no tiene funcionalidad, pero si no se pone entonces e 1er registro no se elimina 
         Ver posibilidad de eliminar cuando seenecuentre el problema  -->
            <form action="#" name="del_plananualregistro" id="del_plananualregistro" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
            </form> 
    <!------------------------------------------------------------------------------------------------->
                    
    <?php
    if(isset($plananualregistros) && count($plananualregistros)>0)
    {
        $i = 1;        
        foreach($plananualregistros as $row):
        {  
            $id = $row['Plananualregistro']['id'];
            ?>
            <tr>
                <td><a href="/maquincost/plananualregistros/edit/<?php echo $id; ?>/<?php echo $this->request->data['Planesanuale']['id']; ?>" title="Editar registro"><i class="icon-pencil-green"></i></a></td> 
                <td>
                    <form action="/maquincost/plananualregistros/delete/<?php echo $id; ?>" name="del_ctregistro<?php echo $id; ?>" id="del_ctregistro<?php echo $id; ?>" style="display:none;" method="post">
                        <input type="hidden" name="_method" value="POST"/>
                    </form>
                    <a href="#" onclick="if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) { document.del_ctregistro<?php echo $id; ?>.submit(); } event.returnValue = false; return false;" title="Eliminar registro"><i class="icon-del-red"></i></a> 
                </td>   
                <td style="font-size: 12px;" style="font-size: 12px;"><?php echo $row['Plananualregistro']['numeroplano']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Pieza']['nombre']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['modelo']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['no_molde_disp_etc']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['cantpiezas']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['matprim_pesounidad']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['matprim_pesototal']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['pieza_pesotunidad']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['pieza_pesototal']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Materiale']['descripcion']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['matprima_largo']." x ".$row['Plananualregistro']['matprima_ancho']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['costounidad']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['costototal']; ?></td>  
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['fecha_necesita']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['fecha_recibe']; ?></td>
                <td style="font-size: 12px;"><?php echo $row['Plananualregistro']['observaciones']; ?></td>
            </tr>       
  <?php 
            $i++;
        }
        endforeach;
    }
    ?>
</table>
<br />