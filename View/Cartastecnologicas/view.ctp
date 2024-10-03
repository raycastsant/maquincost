<div class="cartastecnologicas well well-not-padding">
<?php
 if(count($cartas) > 0)
 { ?>
   <div class="tabbable">
    <ul class="nav nav-tabs">
<?php
    $active = "active";
    foreach($cartas as $carta):
    {   ?>
        <li class="<?php echo $active; ?>"><a href="#carta<?php echo $carta['Cartastecnologica']['id']; ?>" data-toggle="tab"><?php echo $carta['Cartastecnologica']['codigo']; ?></a></li>
<?php     
        $active = "";   
    }
    endforeach; ?>
        
    </ul>
    <div class="tab-content">
<?php    
    $active = "active";
    foreach($cartas as $carta):
    {
        $cartaId = $carta['Cartastecnologica']['id'];
        $cartaData = $this->requestAction('cartastecnologicas/getTiemposAndCtregistros/'.$cartaId);
?>
    <div class="tab-pane <?php echo $active; ?>" id="carta<?php echo $cartaId; ?>">
        <div style="float: right;">
            <a class="btn btn-link" href="/maquincost/cartastecnologicas/add/<?php echo $piezaid; ?>" title="Crear una nueva carta tecnológica"><i class="icon-plus-sign"></i>&nbsp;Insertar</a>
            |
            <a class="btn btn-link" href="/maquincost/cartastecnologicas/edit/<?php echo $cartaId; ?>"  title="Editar los datos de la carta tecnológica"><i class="icon-pencil"></i>&nbsp;Editar</a>
            <a class="btn btn-link" href="/maquincost/cartastecnologicas" title="Exportar la carta tecnológica a formato PDF"><i class="icon-file"></i>&nbsp;Esportar a PDF</a>
            <form action="/maquincost/cartastecnologicas/delete/<?php echo $cartaId; ?>/<?php echo $piezaid; ?>" title="Eliminar la carta tecnológica" name="post_delcarta<?php echo $cartaId; ?>" id="post_delcarta<?php echo $cartaId; ?>" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>
            <a class="btn btn-link" href="#" onclick="if (confirm('¿Está seguro que desea eliminar la carta tecnológica?')) { document.post_delcarta<?php echo $cartaId; ?>.submit(); } event.returnValue = false; return false;"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a>
            |
            <a class="btn btn-link" href="/maquincost/piezas"><i class="icon-list"></i>&nbsp;Listar piezas</a>
        </div>
       <br />
       <br /> 
             
       <table class="table-borderedall table-borderedall-full table-condensed table-striped" style="width: 100%;">
            <tr>
                <td rowspan="3" style="text-align: center;"><h4>Carta Tecnológica de Maquinado</h4></td>
            </tr>
            <tr>
                <td colspan="3"><b>Código del plano</b>&nbsp;<?php echo $carta['Cartastecnologica']['codigoplano']; ?></td>
                <td colspan="2"><b>Código de la carta</b>&nbsp;<?php echo $carta['Cartastecnologica']['codigo']; ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>Nombre de la pieza</b>&nbsp;<?php echo $carta['Pieza']['nombre']; ?></td>
                <td colspan="2"><b>Cantidad</b>&nbsp;<?php echo $carta['Cartastecnologica']['cantpiezas']; ?></td>
            </tr>
            <tr>
                <td rowspan="4" style="text-align: center;"><img src="/maquincost/img/planos/<?php echo $carta['Cartastecnologica']['urlplano']; ?>" style="width: 250px; height: 200px;" /></td>
            </tr> 
            <tr>
                <td><b>Material</b>&nbsp;<?php echo $carta['Materiale']['descripcion']; ?></td>
                <td colspan="2"><b>Semiproducto Forma</b>&nbsp;<?php echo $carta['Semiproductoforma']['nombre']; ?></td>
                <td><b>Peso neto</b>&nbsp;<?php echo $carta['Cartastecnologica']['semiproducto_peso_neto']; ?></td>
                <td><b>Peso bruto</b>&nbsp;<?php echo $carta['Cartastecnologica']['semiproducto_peso_bruto']; ?></td>
            </tr>
            <tr>
                <td><b>Diámetro</b>&nbsp;<?php echo $carta['Cartastecnologica']['semiproducto_diametro']; ?>&nbsp;mm</td>
                <td><b>Ancho</b>&nbsp;<?php echo $carta['Cartastecnologica']['semiproducto_ancho']; ?>&nbsp;mm</td>
                <td><b>Largo</b>&nbsp;<?php echo $carta['Cartastecnologica']['semiproducto_largo']; ?>&nbsp;mm</td>
                <td><b>Máquina</b>&nbsp;<?php echo $carta['Maquina']['nombre']; ?></td>
                <td><b>Modelo</b>&nbsp;<?php echo $carta['Maquina']['modelo']; ?></td>
            </tr>
            <tr>
                <td><b>T. Corte</b>&nbsp;<?php echo $cartaData['tcorte']; ?>&nbsp;min</td>
                <td><b>T. Preparación</b>&nbsp;<?php echo $carta['Cartastecnologica']['timpo_prep']; ?>&nbsp;min</td>
                <td><b>T. Auxiliar</b>&nbsp;<?php echo $cartaData['tauxiliar']; ?>&nbsp;min</td>
                <td colspan="2"><b>T. Total</b>&nbsp;<?php echo ($cartaData['tcorte']+$carta['Cartastecnologica']['timpo_prep']+$cartaData['tauxiliar']); ?>&nbsp;min</td>
            </tr>
        </table>
        <table class="table-borderedall table-borderedall-full table-condensed table-striped" style="width: 100%;">
            <tr>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">No</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Operación</th>
                <th colspan="3" style="font-size: 12px; font-weight: bold;">Instrumentos</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Long. Diámetro (mm)</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Longitud (mm)</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Profundidad (mm)</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Cantidad de pasadas</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Avance (mm/rpm)</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Veloc. de corte (m/min)</th>
                <th rowspan="2" style="font-size: 12px; font-weight: bold;">Revoluciones (rpm)</th>
                <th colspan="3" style="font-size: 12px; font-weight: bold;">Tiempos (min)</th>
            </tr>
            <tr>
                <th style="font-size: 12px; font-weight: bold;">Cortantes</th>
                <th style="font-size: 12px; font-weight: bold;">Auxiliares</th>
                <th style="font-size: 12px; font-weight: bold;">Medición</th>
                <th style="font-size: 12px; font-weight: bold;">TC</th>
                <th style="font-size: 12px; font-weight: bold;">TA</th>
                <th style="font-size: 12px; font-weight: bold;">TT</th>
            </tr>
            
            <?php
            $i = 1;
            foreach($cartaData['ctregistros'] as $row):
            {  
                ?>
                <tr>
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
        ?>
        </table> 
    </div>
<?php
     $active = "";  
    }
    endforeach;
  ?>
    </div>
  </div>
<?php
 }
 else
 {
?>
        <br />
        <center><h4>No se ha definido ninguna carta tecnológica para la pieza</h4>
        <a class="btn btn-primary" id="btn_insert_ct" href="/maquincost/cartastecnologicas/add/<?php echo $piezaid; ?>" title="Crear una nueva Carta Tecnológica para la pieza seleccionada" data-toggle="tooltip" data-placement="bottom"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></center>
        <br />
     <?php
  }
?>
</div>
<br />

<script>
    $("#btn_insert_ct").tooltip();
</script>