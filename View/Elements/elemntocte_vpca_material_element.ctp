<div id="tab_selectores" class="tabbable">
 <!-------------------------------------------- TABS de Operaciones --------------------------------------------->
    <ul class="nav nav-tabs">
    <?php
        $recordsExists = true;       
        if(!is_null($registros) && count($registros)>0)
        {
            $first = true;
            foreach($registros as $registro):
            {
                  if($first === true) 
                  { 
                    echo '<li class="active" id="op'.$registro['operaciones']['id'].'"><a href="#opcontent'.$registro['operaciones']['id'].'" data-toggle="tab">'.$registro['operaciones']['nombre'].'</a></li>';
                    $first = false;
                  }
                  else 
                   echo '<li id="op'.$registro['operaciones']['id'].'"><a href="#opcontent'.$registro['operaciones']['id'].'" data-toggle="tab">'.$registro['operaciones']['nombre'].'</a></li>';
            }
            endforeach;
        }
        else
         $recordsExists = false; 
    ?>
    </ul>
    <!------------------------------------- Contenido de las operaciones ----------------------------------------->
    <div class="tab-content">
    <?php
        if(!is_null($registros) && count($registros)>0)
        {
            $first = true;
            foreach($registros as $registro):
            {
                  if($first === true) 
                  { 
                    //echo '<script>var activeOpId = "'.$registro['operaciones']['id'].'"; //Variable para almacenar el id de la operación activa</script>';
                    echo '<div class="tab-pane active" id="opcontent'.$registro['operaciones']['id'].'">';
                    $first = false;
                  }
                  else 
                   echo '<div class="tab-pane" id="opcontent'.$registro['operaciones']['id'].'">';
    ?>
                  <table class="table table-borderedall table-hover table-condensed" cellspacing="0" cellpadding="0">
                    <thead>
                      <th class="tableheadercolor">&nbsp;</th>
                      <th class="tableheadercolor"><center>Avance</center></th>
                      <th class="tableheadercolor"><center>Velocidad</center></th>
                      <th class="tableheadercolor"><center>Profundiad de corte</center></th>
                    </thead>  
                    <tr>
                       <td><b>Para Afinar</b></td>
                       <td><center>
                         <div>Mínimo: <span class="label label-success"><?php echo $registro['Vpcamaterialeselementoscortante']['av_min_afinar'];?></span></div>
                         <div>Máximo: <span class="label label-success"><?php echo $registro['Vpcamaterialeselementoscortante']['av_max_afinar'];?></span></div>
                       </center></td>
                       <td><center>
                         <div>Mínima: <span class="label label-info"><?php echo $registro['Vpcamaterialeselementoscortante']['vel_min_afinar'];?></span></div>
                         <div>Máxima: <span class="label label-info"><?php echo $registro['Vpcamaterialeselementoscortante']['vel_max_afinar'];?></span></div>
                       </center></td>
                       <td><center>
                         <div>Mínima: <span class="label label-important"><?php echo $registro['Vpcamaterialeselementoscortante']['pfc_min_afinar'];?></span></div>
                         <div>Máxima: <span class="label label-important"><?php echo $registro['Vpcamaterialeselementoscortante']['pfc_max_afinar'];?></span></div>
                       </center></td>
                    </tr>
                    <tr>
                       <td><b>Para Desbastar</b></td>
                       <td><center>
                         <div>Mínimo: <span class="label label-success"><?php echo $registro['Vpcamaterialeselementoscortante']['av_min_desbaste'];?></span></div>
                         <div>Máximo: <span class="label label-success"><?php echo $registro['Vpcamaterialeselementoscortante']['av_max_desbaste'];?></span></div>
                       </center></td>
                       <td><center>
                         <div>Mínima: <span class="label label-info"><?php echo $registro['Vpcamaterialeselementoscortante']['vel_min_desbaste'];?></span></div>
                         <div>Máxima: <span class="label label-info"><?php echo $registro['Vpcamaterialeselementoscortante']['vel_max_desbaste'];?></span></div>
                       </center></td>
                       <td><center>
                         <div>Mínima: <span class="label label-important"><?php echo $registro['Vpcamaterialeselementoscortante']['pfc_min_desbaste'];?></span></div>
                         <div>Máxima: <span class="label label-important"><?php echo $registro['Vpcamaterialeselementoscortante']['pfc_max_desbaste'];?></span></div>
                       </center></td>
                   </tr>
                   <tr>
                       <td><b>Para Viruta</b></td>
                       <td><center>
                         <div>Mínimo: <span class="label label-success"><?php echo $registro['Vpcamaterialeselementoscortante']['av_min_viruta'];?></span></div>
                         <div>Máximo: <span class="label label-success"><?php echo $registro['Vpcamaterialeselementoscortante']['av_max_viruta'];?></span></div>
                       </center></td>
                       <td><center>
                         <div>Mínima: <span class="label label-info"><?php echo $registro['Vpcamaterialeselementoscortante']['vel_min_viruta'];?></span></div>
                         <div>Máxima: <span class="label label-info"><?php echo $registro['Vpcamaterialeselementoscortante']['vel_max_viruta'];?></span></div>
                       </center></td>
                       <td><center>
                         <div>Mínima: <span class="label label-important"><?php echo $registro['Vpcamaterialeselementoscortante']['pfc_min_viruta'];?></span></div>
                         <div>Máxima: <span class="label label-important"><?php echo $registro['Vpcamaterialeselementoscortante']['pfc_max_viruta'];?></span></div>
                       </center></td>
                   </tr>
                  </table>
    <?php               
                   echo "</div>";
            }
            endforeach;
        }
    ?>
    </div>
</div>

<center>
    <a class='btn' href='/maquincost/vpcamaterialeselementoscortantes/add/<?php echo $elementoid; ?>/<?php echo $tmaterialid; ?>'><i class='icon-layout-add'></i>&nbsp;Insertar</a>
    <?php 
        if($recordsExists)
        { 
    ?>
            <a id='btn_edit_operacion' class='btn' href='#'><i class='icon-layout-edit'></i>&nbsp;Editar</a>
            <form id="form_del_operacion" method="post" style="display:none;" name="form_del_operacion" action="#"><input type="hidden" value="POST" name="_method"/></form>
            <a id='btn_del_operacion' class='btn' href='#' onclick="if (confirm(&apos;¿Está seguro que desea eliminar el registro seleccionado?&apos;)) { document.form_del_operacion.submit(); } event.returnValue = false; return false;" title='Eliminar el registro selecionado'><i class='icon-layout-delete'></i>&nbsp;Eliminar</a>
    <?php
	    }
        else
        {  ?>
            <a class='btn disabled' href='#'><i class='icon-layout-edit'></i>&nbsp;Editar</a>
            <a class='btn disabled' href='#' title='Eliminar el selector seleccionado'><i class='icon-layout-delete'></i>&nbsp;Eliminar</a>
    <?php       
        }
    ?>
    <a class="btn btn-link" href="/maquincost/elementoscortantes/index"><i class="icon icon-list"></i>&nbsp;Listar elementos cortantes</a>
</center>

<script>
<?php 
        $firstOp = true;       
        foreach($registros as $registro):
        { 
           if(!isset($activeOp) && $firstOp===true)
           {
              $activeOp = "op".$registro['operaciones']['id'];
             ?>
              $('#btn_edit_operacion').attr('href', '/maquincost/vpcamaterialeselementoscortantes/edit/<?php echo $registro['Vpcamaterialeselementoscortante']['id']; ?>/<?php echo $elementoid; ?>/<?php echo $tmaterialid; ?>');
              $('#form_del_operacion').attr('action', '/maquincost/vpcamaterialeselementoscortantes/delete/<?php echo $registro['Vpcamaterialeselementoscortante']['id']; ?>/<?php echo $elementoid; ?>/<?php echo $tmaterialid; ?>');
       <?php       
           } 
           ?>
                 
            $("#op<?php echo $registro['operaciones']['id']; ?>").bind("click", function (event) 
            {
                //activeOpId = "<?php //echo $registro['operaciones']['id']; ?>";
                $('#btn_edit_operacion').attr('href', '/maquincost/vpcamaterialeselementoscortantes/edit/<?php echo $registro['Vpcamaterialeselementoscortante']['id']; ?>/<?php echo $elementoid; ?>/<?php echo $tmaterialid; ?>');
                $('#form_del_operacion').attr('action', '/maquincost/vpcamaterialeselementoscortantes/delete/<?php echo $registro['Vpcamaterialeselementoscortante']['id']; ?>/<?php echo $elementoid; ?>/<?php echo $tmaterialid; ?>');
            });
 <?php  }
        endforeach;  
        
      if(isset($activeOp))
      {  
     ?>     
          $(document).ready(function () 
          {
              $("#op<?php echo $activeOp; ?>").click();
          })
<?php } ?>     
</script>