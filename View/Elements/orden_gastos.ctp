<!--------------------- Este element es para mostrar los gastos en lso datos planificados de la orden----------->

<?php
   $costoPiezaUnitario = 0;
   $costoPiezaTotal = 0;
   $gastoSalario = 0;
   //$gastoTotal = 0;
   
   if(!is_null($res))
   {
       $costoPiezaUnitario = round($res['costo'], 2);
       $costoPiezaTotal = round(($costoPiezaUnitario * $cantPiezas), 2);
       $gastoSalario = round($res['salario'], 2);
       //$gastoTotal = round(($costoPiezaTotal + $gastoSalario), 2);
   }                  
?>
<div class="panel span" style="width: 260px;">
 <div class="panel-head">Costo de la pieza</div>   
    <table cellpadding="3" cellspacing="3" style="width: 100%;" border="0"> 
    <tr>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_costo_unitario" title="Costo unitario de la pieza"><b>Unitario: <span id="pieza_costo_unitario" class="label label-success">$ <?php echo $costoPiezaUnitario; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_costo_total" title="Costo total de las piezas"><b>Importe: <span id="pieza_costo_total" class="label label-success">$ <?php echo $costoPiezaTotal; ?></span></b></div></td>
    </tr>
    </table>
</div>    

<div class="panel span" style="width: 460px;">
 <div class="panel-head">Otros</div>   
    <table cellpadding="3" cellspacing="3" style="width: 100%;" border="0"> 
    <tr>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_salario" title="Salario planificado"><b>Salario planificado: <span id="salario_plan" class="label label-success">$ <?php echo $gastoSalario; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_gastos_tot" title="Costo total de materias primas"><b>Costo total de Mat. prima: <span id="pieza_costo_total" class="label label-success">$ <?php echo $costo_total_mat_prim; ?></span></b></div></td>
    </tr>
    </table>
</div> 

 <!-- <table cellpadding="3" cellspacing="3" class="table table-bordered" style="width: 750px;" border="0"> 
    <tr>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_costo_unitario" title="Costo unitario de la pieza"><b>Costo unitario: <span id="pieza_costo_unitario" class="label label-success">$ <?php //echo $costoPiezaUnitario; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_costo_total" title="Costo total de las piezas"><b>Costo total: <span id="pieza_costo_total" class="label label-success">$ <?php //echo $costoPiezaTotal; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_salario" title="Gastos de salario"><b>Salario planificado: <span id="salario_plan" class="label label-success">$ <?php //echo $gastoSalario; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_gastos_tot" title="Gastos totales"><b>Gasto total: <span id="costo_total" class="label label-important">$ <?php //echo $gastoTotal; ?></span></b></div></td> 
    </tr>
 </table> --> 

<script>
    $("#div_costo_unitario").tooltip();
    $("#div_costo_total").tooltip();
    $("#div_salario").tooltip();
    $("#div_gastos_tot").tooltip();
</script>