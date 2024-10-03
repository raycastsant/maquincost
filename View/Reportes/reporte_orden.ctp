<?php
if(!is_null($data))
{
?>
<div class="span4"></div>
<div class="span"><h4>Reporte de orden de trabajo</h4></div>
<div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>

<center><table class="table table-bordered" style="width: 93%;" cellspacing="1" cellpadding="1">
    <tr>
        <td style="width: 170px;">&nbsp;&nbsp;&nbsp;UEB: <?php echo $data[0]['ordenreals']['ueb']?></td>
        <td style="width: 200px;">Responsable: <?php echo $data[0]['ordenreals']['responsable']?></td>
        <td style="width: 230px;">Tipo de trabajo: <?php echo $data[0]['tipotrabajos']['descripcion']?></td>
        <td style="width: 200px;">Equipo: <?php echo $data[0]['ordenreals']['equipo']?></td>
    </tr>
</table> 
<table class="table table-borderedall" style="width: 93%;">
    <tr class="report-table-header">
        <th rowspan="2" style="text-align: center;">&nbsp;</th>
        <th rowspan="2" style="text-align: center; vertical-align: bottom;">Lab (h)</th>
        <th rowspan="2" style="text-align: center; vertical-align: bottom;">Cantidad de piezas</th>
        <th colspan="2" style="text-align: center;">Fecha de ejecución</th>
        <th colspan="3" style="text-align: center;">Costo total de la intervención</th>
    </tr>
    <tr class="report-table-header">
        <th style="text-align: center;">Comienzo</th>
        <th style="text-align: center;">Terminación</th>
        <th style="text-align: center;">Salario</th>
        <th style="text-align: center;">Materiales</th>
        <th style="text-align: center;">Total</th>
    </tr>
    <tr>
        <td><b>Plan</b></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenes']['laboriosidad']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenes']['cant_piezas']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenes']['fecha_inicio']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenes']['fecha_fin']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenes']['salario_plan']?></td>
        <td style="text-align: center;"><?php $gastoMateriales = ($data[0]['ordenes']['costo_pieza'] * $data[0]['ordenes']['cant_piezas']);
                                              echo $gastoMateriales;  ?></td>
        <td style="text-align: center;"><?php echo ($data[0]['ordenes']['salario_plan'] + $gastoMateriales)?></td>
    </tr>
    <tr>
        <td><b>Real</b></td>
        <td style="text-align: center;"><?php echo $data['laboriosidad_real']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenreals']['piezas_elaboradas']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenreals']['fecha_inicio']?></td>
        <td style="text-align: center;"><?php echo $data[0]['ordenreals']['fecha_fin']?></td>
        <td style="text-align: center;"><?php echo $data['salario_real']?></td>
        <td style="text-align: center;"><?php $materiales = $data[0]['ordenreals']['gasto_materiales'];
                                              $cantPiezas = $data[0]['ordenreals']['piezas_elaboradas'];
                                              $piezaCostoUnit = $data[0]['ordenreals']['pieza_costo_unit']; 
                                              $gastoMateriales =  ($materiales + ($cantPiezas * $piezaCostoUnit)); 
                                              echo $gastoMateriales; ?></td>
        <td style="text-align: center;"><?php echo ($gastoMateriales + $data['salario_real']); ?></td>
    </tr>
</table>
</center>
<center><h5>Fuerza de trabajo</h5>
<table class="table table-borderedall" style="width: 93%;">
    <tr class="report-table-header">
        <th>Trabajador</th>
        <th>Fecha Inicio</th>
        <th>Fecha Terminación</th>
        <th>Horas</th>
       <!-- <th>Forma de pago</th> -->
        <th>Tarifa</th>
        <th>Importe</th>
    </tr>
    <?php foreach($fuerzatrabajo as $ft):
          {?>
            <tr>
                <td><?php echo $ft['operarios']['nombre']; ?></td>
                <td><?php echo $ft['fuerzatrabajoordenes']['fechacomienzo']; ?></td>
                <td><?php echo $ft['fuerzatrabajoordenes']['fechaterminacion']; ?></td>
                <td><?php echo $ft['fuerzatrabajoordenes']['totalhoras']; ?></td>
                <td><?php echo $ft['fuerzatrabajoordenes']['tarifa']; ?></td>
                <td><?php echo $ft['fuerzatrabajoordenes']['salario']; ?></td>
            </tr>   
    <?php } 
          endforeach; ?>
</table></center>

<center><h5>Piezas y materiales</h5>
<table class="table table-borderedall" style="width: 93%;">
    <tr class="report-table-header">
        <th>Denominación</th>
        <th>Código</th>
        <th>Unidades</th>
        <th>Precio&nbsp;&nbsp;&nbsp;</th>
        <th>Importe&nbsp;&nbsp;&nbsp;</th>
        <th>Vale entrada</th>
        <th>Vale salida</th>
    </tr>
<?php  
    foreach($piezasmateriales as $vale):
    {        
        ?>
        <tr>
            <td><?php echo $vale['Materiale']['descripcion']; ?></td>
            <td><?php echo $vale['Materiale']['codigo']; ?></td>
            <td><?php echo $vale['Vale']['cantidad']; ?></td>
            <td>$ <?php echo round($vale['Vale']['precio'], 2); ?></td>
            <td style="text-align: right;">$ <?php echo round($vale['Vale']['importe'], 2); ?></td>
            <td><?php echo $vale['Vale']['no_solicitud']; ?></td>
            <td><?php echo $vale['Vale']['no_salida']; ?></td>
        </tr>
<?php
    }	
    endforeach;
?>
</table>
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