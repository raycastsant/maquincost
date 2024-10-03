<!-- Este elementes para mostrar los registros de la carta tecnológica -->

<table class="table-borderedall table-condensed table-hover-orange table-striped" style="width: 100%;">
    <tr>
        <th class="tableheadercolor" rowspan="2" colspan="2" style="font-size: 12px; font-weight: bold;">&nbsp;</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">No</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Operación</th>
        <th class="tableheadercolor" colspan="3" style="font-size: 12px; font-weight: bold;">Instrumentos</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Long. Diámetro (mm)</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Longitud (mm)</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Profundidad (mm)</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Cantidad de pasadas</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Avance (mm/rpm)</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Veloc. de corte (m/min)</th>
        <th class="tableheadercolor" rowspan="2" style="font-size: 12px; font-weight: bold;">Revoluciones (rpm)</th>
        <th class="tableheadercolor" colspan="3" style="font-size: 12px; font-weight: bold;">Tiempos (min)</th>
    </tr>
    <tr>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Cortantes</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Auxiliares</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">Medición</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">TC</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">TA</th>
        <th class="tableheadercolor" style="font-size: 12px; font-weight: bold;">TT</th>
    </tr>
    
    <!-- OJO!!. Esto no tiene funcionalidad, pero si no se pone entonces e 1er registro no se elimina
         Ver posibilidad de eliminar cuando seenecuentre el problema  -->
            <form action="#" name="del_ctregistro" id="del_ctregistro" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
            </form>
    <!------------------------------------------------------------------------------------------------->
                    
    <?php
    if(isset($ctregistros) && count($ctregistros)>0)
    {
        $i = 1;
        foreach($ctregistros as $row):
        {  
            $id = $row['ctregistros']['id'];
            ?>
            <tr>
                <td><a href="/maquincost/ctregistros/edit/<?php echo $id; ?>/<?php echo $this->request->data['Cartastecnologica']['id']; ?>/<?php echo $this->request->data['Materiale']['tiposmateriale_id']; ?>" title="Editar registro"><i class="icon-pencil-green"></i></a></td> 
                <td>
                    <form action="/maquincost/ctregistros/delete/<?php echo $id; ?>" name="del_ctregistro<?php echo $id; ?>" id="del_ctregistro<?php echo $id; ?>" style="display:none;" method="post">
                        <input type="hidden" name="_method" value="POST"/>
                    </form>
                    <a href="#" onclick="if (confirm('¿Está seguro que desea eliminar el registro selecionado?')) { document.del_ctregistro<?php echo $row['ctregistros']['id']; ?>.submit(); } event.returnValue = false; return false;" title="Eliminar registro"><i class="icon-del-red"></i></a> 
                </td>   
                <td><?php echo $i; ?></td>
                <td><?php echo $row['operaciones']['operacion']." ".$row['tipooperaciones']['tipooperacion']." ".$row['ctregistros']['diametro_ini']."-".$row['ctregistros']['diametro_fin']; ?></td>
                <td><?php echo $row['tipoelementoscortante']['tipoelementocortante']." ".$row['elementoscortantes']['elementocortante']; ?></td>
                <td><?php echo $row['instrumentosauxiliares']['inst_auxiliar']; ?></td>
                <td><?php echo $row['instrumentosmedicions']['inst_medicion']; ?></td>
                <td><?php echo $row['ctregistros']['longitud_diametro']; ?></td>
                <td><?php echo $row['ctregistros']['longitud']; ?></td>
                <td><?php echo $row['ctregistros']['prof_corte']; ?></td>
                <td><?php echo $row['ctregistros']['cantidad_pasadas']; ?></td>
                <td><?php echo $row['ctregistros']['avance']; ?></td>
                <td><?php echo $row['ctregistros']['velocidad']; ?></td>
                <td><?php echo $row['ctregistros']['revoluciones']; ?></td>
                <td><?php echo $row['ctregistros']['tiempo_corte']; ?></td>
                <td><?php echo $row['ctregistros']['tiempo_auxiliar']; ?></td>
                <td><?php echo ($row['ctregistros']['tiempo_corte']+$row['ctregistros']['tiempo_auxiliar']); ?></td> 
            </tr>       
  <?php 
            $i++;
        }
        endforeach;
    }
    ?>
</table>