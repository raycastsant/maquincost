<!--------------------- Este element es para mostrar los gastos en los datos reales de la orden----------->

<?php
   //$costoPiezaUnitario = 0;
   $costoPiezaTotal = 0;
   //$gastoSalario = 0;
   
   /*if(!is_null($res))
   {*/
       //$costoPiezaUnitario = round($costoPiezaUnitario, 2);
       $costoPiezaTotal = round(($costoPiezaUnitario * $cantPiezas), 2);
       //$gastoSalario = round($gastoSalario, 2);
       //$gastoTotal = round(($costoPiezaTotal + $gastoSalario), 2);
   //}                  
?>
<div class="panel span" style="width: 260px;">
 <div class="panel-head">Gasto de la pieza</div>   
    <table cellpadding="3" cellspacing="3" style="width: 100%;" border="0"> 
    <tr>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_costo_unitario" title="Gasto unitario de la pieza"><b>Unitario: <span id="pieza_costo_unitario" class="label label-success">$ <?php echo $costoPiezaUnitario; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_costo_total" title="Gasto total de las piezas"><b>Importe: <span id="pieza_costo_total" class="label label-success">$ <?php echo $costoPiezaTotal; ?></span></b></div></td>
    </tr>
    </table>
</div>    

<div class="panel span" style="width: 445px;">
 <div class="panel-head">Otros gastos</div>   
    <table cellpadding="3" cellspacing="3" style="width: 100%;" border="0"> 
    <tr>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_salario" title="Gasto de salario"><b>Gasto de salario: <span id="salario_plan" class="label label-success">$ <?php echo $gastoSalario; ?></span></b></div></td>
        <td style="text-align: right;"><div data-toggle="tooltip" id="div_gastos_tot" title="Gasto de materiales"><b>Gasto de materiales: <span id="gasto_materiales" class="label label-success">$ <?php echo $gasto_materiales; ?></span></b></div></td>
    </tr>
    </table>
</div> 

<script>
    $("#div_costo_unitario").tooltip();
    $("#div_costo_total").tooltip();
    $("#div_salario").tooltip();
    $("#div_gastos_tot").tooltip();
</script>