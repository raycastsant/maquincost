<div class="span2">&nbsp;</div>
<div>
<table border="1" style="width: 90%;">
 <tr>
    <td>EMPRESA: <?php echo $informerecepcion['Informerecepcion']['empresa']; ?></td>
    <td rowspan="2"><b>INFORME DE RECEPCIÓN</b></td>
 </tr>
 <tr>
    <td>UNIDAD: <?php echo $informerecepcion['Informerecepcion']['unidad']; ?></td>
 </tr>
</table>
<table border="1" style="width: 90%;">
 <tr>
    <th>Código</th>
    <th>Pieza</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Importe</th>
    <th>Fecha</th>
 </tr>
 <tr>
    <?php 
        echo '<td style="text-align: center;">'.$informerecepcion['Informerecepcion']['codigo'].'</td>
        <td style="text-align: center;">'.$piezanombre.'</td>
        <td style="text-align: center;">'.$informerecepcion['Ordenreal']['piezas_elaboradas'].'</td>
        <td style="text-align: center;">'.$informerecepcion['Ordenreal']['pieza_precio'].'</td>
        <td style="text-align: center;">'.($informerecepcion['Ordenreal']['pieza_precio']*$informerecepcion['Ordenreal']['piezas_elaboradas']).'</td>
        <td style="text-align: center;">'.$informerecepcion['Informerecepcion']['fecha'];'</td>';
    ?>
 </tr>
 <tr>
    <td colspan="6">&nbsp;</td>
 </tr>
</table>
</div>