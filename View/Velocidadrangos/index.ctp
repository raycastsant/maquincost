<div id="table_div" class="well well-not-padding">
 <h4><center><?php echo $maquinanombre; ?> - Gestión de Rangos, Tabla de Velocidades, de Avances y Profundidades de Corte</center></h4>
 <hr />
 <!-- Botones de gestión de los rangos Rangos -->
  <a class='btn btn-primary' href="/maquincost/velocidadrangos/add/<?php echo $maquinaid; ?>/<?php echo $maquinanombre; ?>"><i class='icon-plus-sign icon-white'></i>&nbsp;Nuevo rango</a>
  <a class='btn' id='btn_edit_rango' href='#'><i class='icon-pencil'></i>&nbsp;Editar rango</a>
  <form id="form_del_rango" method="post" style="display:none;" name="form_del_rango" action="#"><input type="hidden" value="POST" name="_method"/></form>
  <a class='btn' id='btn_delete_rango' href='#' onclick="if (confirm(&apos;¿Está seguro que desea eliminar el rango seleccionado?&apos;)) { document.form_del_rango.submit(); } event.returnValue = false; return false;"><i class='icon-minus-sign'></i>&nbsp;Eliminar rango</a>
  <br />
  <br />
      
    <!-- Tabs de los rangos --> 
    <div  id="myTabContent" class="tabbable tabs-left">
      <ul class="nav nav-tabs">
          <?php 
            $selectoresIdList = array(); // Esta variable es para almacenar los ID de los selectores, para al final crear los SCRIPTS correspondientes
            
            if(!is_null($rangos))
            {
                $first = true;
                foreach($rangos as $rango):   
                {  
                  $rangoTitle = $rango['Velocidadrango']['nombre']." ".$rango['Velocidadrango']['vel_min']." - ".$rango['Velocidadrango']['vel_max']." (rpm)";
                  //$rangoActions = "<a class='btn' href='/maquincost/velocidadrangos/edit/".$rango['Velocidadrango']['id']."'><i class='icon-pencil'></i></a>";
                  
                  if($first === true) 
                  { 
                    echo '<li class="active" id="rango'.$rango['Velocidadrango']['id'].'"><a href="#rangocontent'.$rango['Velocidadrango']['id'].'" data-toggle="tab">'.$rangoTitle.'</a></li>';
                    $first = false;
                  }
                  else
                   echo '<li id="rango'.$rango['Velocidadrango']['id'].'"><a href="#rangocontent'.$rango['Velocidadrango']['id'].'" data-toggle="tab">'.$rangoTitle.'</a></li>';
                }
                endforeach;
            }
              ?>  
      </ul>
      <!------------------------------------------- Contenido de los rangos --------------------------------------------------------------------->
          <div class="tab-content well well-gray">
            <div id="loading_gif"></div>
            <?php
                $first = true;
                foreach($rangos as $rango):   //Listando los rangos   
                {      
                  if($first === true) 
                    echo '<div class="tab-pane active" id="rangocontent'.$rango['Velocidadrango']['id'].'"> </div>'; 
                  else
                    echo '<div class="tab-pane divcontent" id="rangocontent'.$rango['Velocidadrango']['id'].'"> </div>';
                }
                endforeach;
            ?>
        </div>
    </div> 
</div>

<!-- Cargar element del dialogo de velocidad -->
<?php echo $this->element('dialog_velocidad'); ?>

<!-- Cargar element del dialogo de selectores -->
<?php echo $this->element('dialog_selectores'); ?>

<!-- Cargar element del dialogo de avances -->
<?php echo $this->element('dialog_avances'); ?>

<!-- Cargar element del dialogo de profundidades de corte -->
<?php echo $this->element('dialog_profcortes'); ?>

<!---------------------------- Funciones JAVASCRIPT y AJAX --------------------------------------------------------->
 <script>
 //Establecer las llamadas AJAX para el contenido de los TABS de los rangos 
  <?php $firstRango = true;
        foreach($rangos as $rango):   
        { 
           if(!isset($activerango) && $firstRango===true)
           {
              $activerango = $rango['Velocidadrango']['id'];
              $firstRango = false;
           } 
           ?>      
            $("#rango<?php echo $rango['Velocidadrango']['id']; ?>").bind("click", function (event) 
            {
                $.ajax({async:true, beforeSend:function (XMLHttpRequest) {vaciarContenido();$('#loading_gif').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                        data:null, dataType:'html', success:function (data, textStatus) 
                        {
                           $('#rango<?php echo $rango['Velocidadrango']['id']; ?>').prop('class', 'active');
                           $('#rangocontent<?php echo $rango['Velocidadrango']['id']; ?>').prop('class', 'tab-pane active');
                           $('#loading_gif').html("");
                           $('#rangocontent<?php echo $rango['Velocidadrango']['id']; ?>').html(data);
                           $('#btn_edit_rango').attr('href', '/maquincost/velocidadrangos/edit/<?php echo $rango['Velocidadrango']['id']; ?>/<?php echo $maquinaid; ?>/<?php echo $maquinanombre; ?>');
                           $('#form_del_rango').attr('action', '/maquincost/velocidadrangos/delete/<?php echo $rango['Velocidadrango']['id']; ?>/<?php echo $maquinaid; ?>');
                           //$('#btn_delete_rango').attr('href', '/maquincost/velocidadrangos/delete/<?php //echo $rango['Velocidadrango']['id']; ?>/<?php echo $maquinaid; ?>');
                           
                        }, type:'post', url:'\/maquincost\/velocidadrangos\/getDataFromRangosAJAX\/<?php echo $rango['Velocidadrango']['id']; ?>\/<?php echo $maquinaid; ?>'}); 
                return false;
            });
 <?php  }
        endforeach;  
     ?>
    
   //Limpia el contenido de los TABS de los rangos  
    function vaciarContenido()
    {
     <?php foreach($rangos as $rango):   
           { 
           ?>   
             $('#rangocontent<?php echo $rango['Velocidadrango']['id']; ?>').html("");
             $('#rango<?php echo $rango['Velocidadrango']['id']; ?>').prop('class', ''); 
             $('#rangocontent<?php echo $rango['Velocidadrango']['id']; ?>').prop('class', 'tab-pane');
     <?php }endforeach;      ?>    
    }
   
   //Ejecutar el rango activo 
    $(document).ready(function () 
    {
        $("#rango<?php echo $activerango; ?>").click();
    })
    
    // Boton cancelar del dialogo de velocidad 
       $("#btn_cancel_veldialog").click(function()
       {
          $('#vel_dialog').modal('hide');
       });
       
    //Establece el valor del formulario de velocidad al insertar un valor 
       function insert_velocidad(rangoId)
       {
         $('#velocidad').attr('value', '');
         $('#VelocidadrangoId').attr('value', rangoId);
         $('#insert_vel_label').attr('style', '');
         $('#edit_vel_label').attr('style', 'display: none;');
         var formaction = "/maquincost/velocidades/add/<?php echo $maquinaid; ?>";
         $('#VelocidadeAddForm').attr('action', formaction);
       }
       
      //Establece el valor del formulario de velocidad al editar un valor 
       function edit_velocidad(vel, velid, rangoId)
       {
         $('#velocidad').attr('value', vel);
         $('#VelocidadrangoId').attr('value', rangoId);
         $('#insert_vel_label').attr('style', 'display: none;');
         $('#edit_vel_label').attr('style', '');
         var formaction = "/maquincost/velocidades/edit/"+velid+"/<?php echo $maquinaid; ?>";
         $('#VelocidadeAddForm').attr('action', formaction);
       }
              
     //Boton cancelar del dialogo de selectores 
       $("#btn_cancel_selectordialog").click(function()
       {
          $('#selector_dialog').modal('hide');
       });
       
     //Establece el valor del formulario de selectores al insertar un valor 
       function insert_selector(rangoId)
       {
         $('#selectornombre').attr('value', '');
         $('#selectorVelRango').attr('value', rangoId);
         $('#insert_selector_label').attr('style', '');
         $('#edit_selector_label').attr('style', 'display: none;');
         var formaction = "/maquincost/selectores/add/<?php echo $maquinaid; ?>";
         $('#SelectoreForm').attr('action', formaction);
       }
       
     //Editar un selector 
       function edit_selector(selectorname, selectorid, rangoId)
       {
         $('#selectornombre').attr('value', selectorname);
         $('#selectorVelRango').attr('value', rangoId);
         $('#insert_selector_label').attr('style', 'display: none;');
         $('#edit_selector_label').attr('style', '');
         var formaction = "/maquincost/selectores/edit/"+selectorid+"/<?php echo $maquinaid; ?>";
         $('#SelectoreForm').attr('action', formaction);
       }
       
     //Boton cancelar del dialogo de avances 
       $("#btn_cancel_avancesdialog").click(function()
       {
          $('#dialog_avances').modal('hide');
       });
       
     //Establece el valor del formulario de avances al insertar un valor 
       function insert_avance(selectorId)
       {
         $('#avance').attr('value', '');
         $('#SelectoreId').attr('value', selectorId);
         $('#insert_avance_label').attr('style', '');
         $('#edit_avance_label').attr('style', 'display: none;');
         var formaction = "/maquincost/avances/add/<?php echo $maquinaid; ?>";
         $('#AvanceForm').attr('action', formaction);
       }
       
    //Establece el valor del formulario de avances al editar un valor 
       function edit_avance(avance, avanceId, selectorId)
       {
         $('#avance').attr('value', avance);
         $('#SelectoreId').attr('value', selectorId);
         $('#insert_avance_label').attr('style', 'display: none;');
         $('#edit_avance_label').attr('style', '');
         var formaction = "/maquincost/avances/edit/"+avanceId+"/<?php echo $maquinaid; ?>";
         $('#AvanceForm').attr('action', formaction);
       }
       
     //Boton cancelar del dialogo de profundidades de corte 
       $("#btn_cancel_pcortedialog").click(function()
       {
          $('#dialog_profcortes').modal('hide');
       });
       
     //Establece el valor del formulario de profundidades de corte al insertar un valor 
       function insert_profcorte(selectorId)
       {
         $('#profcorte').attr('value', '');
         $('#SelectoreIdPc').attr('value', selectorId);
         $('#insert_profcorte_label').attr('style', '');
         $('#edit_profcorte_label').attr('style', 'display: none;');
         var formaction = "/maquincost/profcortes/add/<?php echo $maquinaid; ?>";
         $('#ProfcorteForm').attr('action', formaction); 
       }
       
     //Establece el valor del formulario de profundidades de corte al editar un valor 
       function edit_profcorte(profcorte, profcorteId, selectorId)
       {
         $('#profcorte').attr('value', profcorte);
         $('#SelectoreIdPc').attr('value', selectorId);
         $('#insert_profcorte_label').attr('style', 'display: none;');
         $('#edit_profcorte_label').attr('style', '');
         var formaction = "/maquincost/profcortes/edit/"+profcorteId+"/<?php echo $maquinaid; ?>";
         $('#ProfcorteForm').attr('action', formaction);
       }
 </script>    
