<!-------- Este element es para mostrar los tiempos de maquinado a la hora de gestionar los
                        datos planificados de las órdenes de trabajo ------------------------------------------->

<table class="table table-condensed table-hover table-striped" style="width: 100%;">
    <tr>
        <th>Máquina</th>
        <th>Auxiliar</th>
        <th>Corte</th>
        <th style="text-align: right;">Total</th>
    </tr> 
<?php
    foreach($tiempos as $tiempo):
    {        
        ?>
        <tr>
            <td><?php echo $tiempo['maquinas']['nombre']; ?></td>
            <td><?php echo $tiempo[0]['tcorte']; ?> min</td>
            <td><?php echo $tiempo[0]['tauxiliar']; ?> min</td>
            <td style="text-align: right;"><span class="label label-warning"><?php echo ($tiempo[0]['tcorte'] + $tiempo[0]['tauxiliar']); ?> min</span></td>
        </tr>
<?php
    }	
    endforeach;
?>
</table>