<div class="span4"></div>
<div class="span"><h4>Informe de recepción</h4></div>
<div class="span3" style="float: right;"><a class="btn btn-inverse" target="_blank" href="<?php echo $_SERVER["REQUEST_URI"]."/true.pdf"; ?>"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
<div class="span" style="float: right;"><a class="btn" href="/maquincost/informerecepcions/edit/<?php echo $informerecepcion['Informerecepcion']['id']; ?>"><i class="icon-pencil"></i>&nbsp;Editar</a></div>
<br />
<br />
<br />
<?php
	//print_r($informerecepcion);
?>
<center>
<table border="1" style="width: 80%;">
 <tr>
    <td>EMPRESA: <?php echo $informerecepcion['Informerecepcion']['empresa']; ?></td>
    <td rowspan="2"><b>INFORME DE RECEPCIÓN</b></td>
 </tr>
 <tr>
    <td>UNIDAD: <?php echo $informerecepcion['Informerecepcion']['unidad']; ?></td>
 </tr>
</table>
<table border="1" style="width: 80%;">
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
</center>