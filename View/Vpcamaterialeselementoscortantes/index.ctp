<div class="well well-not-padding">
    <div><h4><center>Tabla de Velocidades, Avances y Profundidades de Corte, por Materiales y Operaciones</center></h4></div>
    <center><p><b>Elemento cortante: <?php echo $elementname; ?></b></p></center>
    <hr />
          
    <!-- Tabs de los Tipos de Materiales --> 
    <div  id="TabsMateriales" class="tabbable tabs-left">
      <ul class="nav nav-tabs">
          <?php           
            if(!is_null($tmateriales))
            {
                $first = true;
                foreach($tmateriales as $tmaterial):   
                {  
                  if($first === true) 
                  { 
                    echo '<li class="active" id="tmaterial'.$tmaterial['tiposmateriales']['id'].'"><a href="#tmaterialcontent'.$tmaterial['tiposmateriales']['id'].'" data-toggle="tab">'.$tmaterial['tiposmateriales']['nombre'].' '.$tmaterial['tiposmateriales']['resistencia_min'].'-'.$tmaterial['tiposmateriales']['resistencia_max'].' '.$tmaterial['tiposmateriales']['um'].'</a></li>';
                    $first = false;
                  }
                  else
                   echo '<li id="tmaterial'.$tmaterial['tiposmateriales']['id'].'"><a href="#tmaterialcontent'.$tmaterial['tiposmateriales']['id'].'" data-toggle="tab">'.$tmaterial['tiposmateriales']['nombre'].' '.$tmaterial['tiposmateriales']['resistencia_min'].'-'.$tmaterial['tiposmateriales']['resistencia_max'].' '.$tmaterial['tiposmateriales']['um'].'</a></li>';
                }
                endforeach;
            }
          ?>  
      </ul>
      <!------------------------------------------- Contenido de los tabs de Tipos de Materiales --------------------------------------------------------------------->
          <div class="tab-content well well-gray">
            <div id="loading_gif"></div>
            <?php
                $first = true;
                foreach($tmateriales as $tmaterial):    
                {      
                  if($first === true) 
                    echo '<div class="tab-pane active" id="tmaterialcontent'.$tmaterial['tiposmateriales']['id'].'"> </div>'; 
                  else
                    echo '<div class="tab-pane" id="tmaterialcontent'.$tmaterial['tiposmateriales']['id'].'"> </div>';
                }
                endforeach;
            ?>
        </div>
    </div>
</div>

<!---------------------------- Funciones JAVASCRIPT y AJAX --------------------------------------------------------->
 <script>
 //Establecer las llamadas AJAX para el contenido de los TABS de los tipos de materiales 
  <?php 
        $firstMat = true;
        foreach($tmateriales as $tmaterial):   
        { 
           if(!isset($activematerial) && $firstMat===true)
           {
              $activematerial = $tmaterial['tiposmateriales']['id'];
              $firstMat = false;
           } 
           ?>      
            $("#tmaterial<?php echo $tmaterial['tiposmateriales']['id']; ?>").bind("click", function (event) 
            {
                $.ajax({async:true,beforeSend:function (XMLHttpRequest) {vaciarContenido();$('#loading_gif').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                        data:null, dataType:'html', success:function (data, textStatus) 
                        {
                           $('#tmaterial<?php echo $tmaterial['tiposmateriales']['id']; ?>').prop('class', 'active');
                           $('#tmaterialcontent<?php echo $tmaterial['tiposmateriales']['id']; ?>').prop('class', 'tab-pane active');
                           $('#loading_gif').html("");
                           $('#tmaterialcontent<?php echo $tmaterial['tiposmateriales']['id']; ?>').html(data);
                        }, type:'post', url:'\/maquincost\/vpcamaterialeselementoscortantes\/getRegistrosFromMaterial\/<?php echo $elementocteid; ?>\/<?php echo $tmaterial['tiposmateriales']['id']; ?>'}); 
                return false;
            });
 <?php  }
        endforeach;  
     ?>
    
   //Limpia el contenido de los TABS de los tipos de materiales  
    function vaciarContenido()
    {
     <?php foreach($tmateriales as $tmaterial):   
           { 
           ?>   
             $('#tmaterialcontent<?php echo $tmaterial['tiposmateriales']['id']; ?>').html("");
             $('#tmaterial<?php echo $tmaterial['tiposmateriales']['id']; ?>').prop('class', ''); 
             $('#tmaterialcontent<?php echo $tmaterial['tiposmateriales']['id']; ?>').prop('class', 'tab-pane');
     <?php }endforeach;      ?>    
    }
   
   //Ejecutar el tipo de material activo
    $(document).ready(function () 
    {
        $("#tmaterial<?php echo $activematerial; ?>").click();
    })
</script>   