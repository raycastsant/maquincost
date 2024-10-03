<!-------- Este element es para mostrar el listado de cartas tecnologicas a la hora de gestionar los
                        datos planificados de las ordenes de trabajo ------------------------------------------->

<table class="table table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th><center>Seleccionada</center></th>
        <th>C�digo</th>
        <th>M�quina</th>
        <th colspan="2">&nbsp;</th>
    </tr>
<?php
    foreach($cartas_relacionadas as $carta_sel):
    {        
        ?>
        <tr class="success">
            <td><center><i class="icon-ok-circle"></i></center></td>
            <td><?php echo $carta_sel['Cartastecnologicas']['codigo']; ?></td>
            <td><?php echo $carta_sel['maquinas']['nombre']; ?></td>
            <td>
                <a class="btn btn-small" target="_blank" href="/maquincost/cartastecnologicas/view/<?php echo $piezaId; ?>/<?php echo $carta_sel['Cartastecnologicas']['id']; ?>"><i class="icon-list"></i>&nbsp;Detalles</a>
                <a class="btn btn-small" style="cursor: pointer;" onclick="if(confirm('�Est� seguro que desea quitar la carta tecnol�gica?'+'\n'+'!Esto repercutir� en los dem�s datos de la orden!'))updateCartasList('\/maquincost\/cartastecnologicas\/get_cartas_from_pieza_ordenplan\/<?php echo $piezaId; ?>\/<?php echo $ordenId; ?>\/delete\/<?php echo $carta_sel['Cartastecnologicas']['id']; ?>');" title="Desmarcar la selecci�n de la carta tecnol�gica"><i class="icon-remove"></i>&nbsp;Quitar</a>
            </td>
        </tr>
<?php
    }	
    endforeach;
    
    foreach($cartas_no_relacionadas as $carta_no_sel):
    {        
        ?>
        <tr class="error">
            <td><center><i class="icon-minus"></i></center></td>
            <td><?php echo $carta_no_sel['Cartastecnologicas']['codigo']; ?></td>
            <td><?php echo $carta_no_sel['maquinas']['nombre']; ?></td>
            <td>
                <a class="btn btn-small" target="_blank" href="/maquincost/cartastecnologicas/view/<?php echo $piezaId; ?>/<?php echo $carta_no_sel['Cartastecnologicas']['id']; ?>"><i class="icon-list"></i>&nbsp;Detalles</a>
                <a class="btn btn-small" style="cursor: pointer;" onclick="updateCartasList('\/maquincost\/cartastecnologicas\/get_cartas_from_pieza_ordenplan\/<?php echo $piezaId; ?>\/<?php echo $ordenId; ?>\/add\/<?php echo $carta_no_sel['Cartastecnologicas']['id']; ?>');" title="Agregar la carta tecnol�gica a la selecci�n"><i class="icon-ok"></i>&nbsp;Seleccionar</a>
            </td>
        </tr>
<?php
    }	
    endforeach;
?>
</table>