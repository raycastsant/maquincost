<!------- Este element es el que muestra la tabla de velocidades, avances y profundidades de corte de una maquina para 
          un rango seleccionado. Ver velocidadrangos/index/. ----------------------------------------------------------->
          
<!------------------------------------------- Tabla de Velocidades --------------------------------------------------------------------->
  <center>
   <table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="0" cellpadding="0" style="width: 600px;">
       <thead>
        <th class="tableheadercolor" colspan="5"><p class="span">Tabla de Velocidades (rpm)</p><a id='btn_add_vel<?php echo $rango['Velocidadrango']['id'];?>' class='btn btn-small' style="float: right;" onclick="insert_velocidad(<?php echo $rango['Velocidadrango']['id'];?>)" href='#vel_dialog' role='button' data-toggle='modal' title='Insertar nuevo valor de velocidad'><i class='icon-plus-sign'></i>&nbsp;Insertar valor</a></th>
       </thead>
       <?php
        $velocidades = $this->requestAction('velocidades/getVelocidadesFromRango/'.$rango['Velocidadrango']['id']);
        $tdCount = 0;
        foreach($velocidades as $velocidad): //Listando las velocidades   
        {
            $tdcode = '<td><div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-info">'.$velocidad['Velocidade']['velocidad'].'&nbsp;<span class="caret"></span></span></a>';
            $tdcode .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
            $tdcode .= '<li><a href="#vel_dialog" role="button" data-toggle="modal" onclick="edit_velocidad('.$velocidad['Velocidade']['velocidad'].', '.$velocidad['Velocidade']['id'].', '.$rango['Velocidadrango']['id'].')"><i class="icon-pencil"></i>&nbsp;Editar</a></li>';
            $tdcode .= '<form id="form_del_velocidad'.$velocidad['Velocidade']['id'].'" method="post" style="display:none;" name="form_del_velocidad'.$velocidad['Velocidade']['id'].'" action="/maquincost/velocidades/delete/'.$velocidad['Velocidade']['id'].'/'.$maquinaid.'"><input type="hidden" value="POST" name="_method"></input></form>';
            $tdcode .= '<li><a onclick="if (confirm(&apos;¿Está seguro que desea eliminar la velocidad seleccionada?&apos;)) {document.form_del_velocidad'.$velocidad['Velocidade']['id'].'.submit(); } event.returnValue = false; return false;" href="#"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a></li></ul></div></td>';
            
            if($tdCount === 0) 
             echo '</tr><tr>'.$tdcode;
            else 
             echo $tdcode; 
             
             $tdCount++;
             if($tdCount === 5)
              $tdCount = 0;
        }
        endforeach;
        
       //Ver si es necesario repintar TD en el ultimo TR creado. Esto es para que quede mejor visualmente la tabla 
        if($tdCount > 0)
        {
            while($tdCount < 5)
            {
                echo "<td>&nbsp;</td>";
                $tdCount++;
            }    
        } 
         
        echo "</tr>";  
       ?>
   </table>
   <hr />
   
<!------------------------------------------- Tabs de selectores --------------------------------------------------------------------->
   <table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="0" cellpadding="0" style="width: 600px;">
     <thead>
        <th class="tableheadercolor" colspan="5"><p class="span">Selectores&nbsp;</p>
            <div style="float: right;">
                <a class='btn btn-small' onclick="insert_selector(<?php echo $rango['Velocidadrango']['id'];?>)" href='#selector_dialog' role='button' data-toggle='modal' title='Insertar selector'><i class='icon-tag-blue-add'></i>&nbsp;Insertar</a>
                <a id='btn_edit_selector' onclick="edit_selector()" class='btn btn-small' href='#selector_dialog' role='button' data-toggle='modal' title='Editar el selector seleccionado'><i class='icon-tag-blue-edit'></i>&nbsp;Editar</a>
                <form id="form_del_selector" method="post" style="display:none;" name="form_del_selector" action="#"><input type="hidden" value="POST" name="_method"/></form>
                <a id='btn_del_selector' class='btn btn-small' href='#' onclick="if (confirm(&apos;¿Está seguro que desea eliminar el selector seleccionado?&apos;)) { document.form_del_selector.submit(); } event.returnValue = false; return false;" title='Eliminar el selector seleccionado'><i class='icon-tag-blue-delete'></i>&nbsp;Eliminar</a>
            </div>  
        </th>
     </thead>
    <tr><td>
        <div id="tab_selectores" class="tabbable">
          <ul class="nav nav-tabs">
              <?php
                $selectores = $this->requestAction('selectores/getSelectoresFromRango/'.$rango['Velocidadrango']['id']); 
                
                if(!is_null($selectores))
                {
                    $firstSel = true;
                    foreach($selectores as $selector):   
                    {          
                      $selectoresIdList[$selector['Selectore']['id']] = $selector['Selectore']['nombre']; 
                       
                      if($firstSel === true) 
                      { 
                        echo '<li class="active" id="selector'.$selector['Selectore']['id'].'"><a href="#selectorcontent'.$selector['Selectore']['id'].'" data-toggle="tab">'.$selector['Selectore']['nombre'].'</a></li>';
                        $firstSel = false;
                      }
                      else 
                       echo '<li id="selector'.$selector['Selectore']['id'].'"><a href="#selectorcontent'.$selector['Selectore']['id'].'" data-toggle="tab">'.$selector['Selectore']['nombre'].'</a></li>';
                    }
                    endforeach;
                }
              ?>  
          </ul>
          <!------------------------------------------- Contenido de los selectores --------------------------------------------------------------------->
          <div class="tab-content">
            <?php
                $firstSel = true;
                $i = 0;
                foreach($selectores as $selector): 
                {      
                  if($firstSel === true) 
                  {
                    echo '<div class="tab-pane active" id="selectorcontent'.$selector['Selectore']['id'].'">';
                    $firstSel = false;
                  }   
                  else
                    echo '<div class="tab-pane" id="selectorcontent'.$selector['Selectore']['id'].'">';   ?>
                    
                    <!------------------------------------------- Tabla de Avances --------------------------------------------------------------------->
                       <center><table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="0" cellpadding="0" style="width: 550px;">
                           <thead>
                            <th class="tableheadercolor" colspan="5"><p class="span">Avances</p><a class='btn btn-small' onclick="insert_avance(<?php echo $selector['Selectore']['id'];?>)" style="float: right;" href='#dialog_avances' role='button' data-toggle='modal' title='Insertar nuevo avance'><i class='icon-plus-sign'></i>&nbsp;Insertar valor</a></th>
                           </thead>
                           <?php
                            $avances = $this->requestAction('avances/getAvancesFromSelector/'.$selector['Selectore']['id']);
                            
                            $tdCount = 0;
                            foreach($avances as $avance): //Listando los avances
                            {
                                $tdcode = '<td><div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success">'.$avance['Avance']['avance'].'&nbsp;<span class="caret"></span></span></a>';
                                $tdcode .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
                                $tdcode .= '<li><a href="#dialog_avances" role="button" data-toggle="modal" onclick="edit_avance('.$avance['Avance']['avance'].', '.$avance['Avance']['id'].', '.$selector['Selectore']['id'].')"><i class="icon-pencil"></i>&nbsp;Editar</a></li>';
                                $tdcode .= '<form id="form_del_avance'.$avance['Avance']['id'].'" method="post" style="display:none;" name="form_del_avance'.$avance['Avance']['id'].'" action="/maquincost/avances/delete/'.$avance['Avance']['id'].'/'.$maquinaid.'"><input type="hidden" value="POST" name="_method"></input></form>';
                                $tdcode .= '<li><a onclick="if (confirm(&apos;¿Está seguro que desea eliminar el avance seleccionado?&apos;)) {document.form_del_avance'.$avance['Avance']['id'].'.submit(); } event.returnValue = false; return false;" href="#"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a></li></ul></div></td>';
                                
                                if($tdCount === 0) 
                                 echo '</tr><tr>'.$tdcode;
                                else 
                                 echo $tdcode; 
                                 
                                 $tdCount++;
                                 if($tdCount === 5)
                                  $tdCount = 0;
                            }
                            endforeach;
                            
                           //Ver si es necesario repintar TD en el ultimo TR creado. Esto es para que quede mejor visualmente la tabla 
                            if($tdCount > 0)
                            {
                                while($tdCount < 5)
                                {
                                    echo "<td>&nbsp;</td>";
                                    $tdCount++;
                                }    
                            } 
                             
                            echo "</tr>";  
                           ?>
                       </table></center>
                       
                    <!------------------------------------------- Tabla de Profundidades de corte --------------------------------------------------------------------->
                       <center><table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="0" cellpadding="0" style="width: 550px;">
                           <thead>
                            <th class="tableheadercolor" colspan="5"><p class="span">Profundidades de Corte</p><a class='btn btn-small' onclick="insert_profcorte(<?php echo $selector['Selectore']['id'];?>)" href='#dialog_profcortes' style="float: right;" role='button' data-toggle='modal' title='Insertar nueva profundidad de corte'><i class='icon-plus-sign'></i>&nbsp;Insertar valor</a></th>
                           </thead>
                           <?php
                            $profcortes = $this->requestAction('profcortes/getProfcortesFromSelector/'.$selector['Selectore']['id']);
                            
                            $tdCount = 0;
                            foreach($profcortes as $profcorte): //Listando las profundidades de corte
                            {
                                $tdcode = '<td><div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-important">'.$profcorte['Profcorte']['profcorte'].'&nbsp;<span class="caret"></span></span></a>';
                                $tdcode .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
                                $tdcode .= '<li><a href="#dialog_profcortes" role="button" data-toggle="modal" onclick="edit_profcorte('.$profcorte['Profcorte']['profcorte'].', '.$profcorte['Profcorte']['id'].', '.$selector['Selectore']['id'].')"><i class="icon-pencil"></i>&nbsp;Editar</a></li>';
                                $tdcode .= '<form id="form_del_profcorte'.$profcorte['Profcorte']['id'].'" method="post" style="display:none;" name="form_del_profcorte'.$profcorte['Profcorte']['id'].'" action="/maquincost/profcortes/delete/'.$profcorte['Profcorte']['id'].'/'.$maquinaid.'"><input type="hidden" value="POST" name="_method"></input></form>';
                                $tdcode .= '<li><a onclick="if (confirm(&apos;¿Está seguro que desea eliminar la profundidad de corte seleccionada?&apos;)) {document.form_del_profcorte'.$profcorte['Profcorte']['id'].'.submit(); } event.returnValue = false; return false;" href="#"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a></li></ul></div></td>';
                                
                                if($tdCount === 0) 
                                 echo '</tr><tr>'.$tdcode;
                                else 
                                 echo $tdcode; 
                                 
                                 $tdCount++;
                                 if($tdCount === 5)
                                  $tdCount = 0;
                            }
                            endforeach;
                            
                           //Ver si es necesario repintar TD en el ultimo TR creado. Esto es para que quede mejor visualmente la tabla 
                            if($tdCount > 0)
                            {
                                while($tdCount < 5)
                                {
                                    echo "<td>&nbsp;</td>";
                                    $tdCount++;
                                }    
                            } 
                             
                            echo "</tr>";  
                           ?>
                       </table></center>
                    
           <?php  echo "</div>";
                }
                endforeach;
            ?>
         </div>
        </div>  
    </td></tr>
   </table>
  </center>
  
  <a class="btn btn-link" href="/maquincost/maquinas/index"><i class="icon icon-list"></i>&nbsp;Listar máquinas</a>
   
  <?php if(isset($selectoresIdList))
  { ?> 
   <script>
     //Para establecer el selector activo cada vez que se de click en un TAB de selector
       <?php 
        $firstSel = true;
        foreach($selectoresIdList as $selectorId=>$selectorName):
        {
            if($firstSel === true)
            {
              $firstSel = false; ?>  
              $('#btn_edit_selector').attr('onclick', "edit_selector(\"<?php echo $selectorName; ?>\", <?php echo $selectorId; ?>, <?php echo $rango['Velocidadrango']['id']; ?>)");
              //$('#btn_del_selector').attr('href', '/maquincost/selectores/delete/<?php echo $selectorId; ?>/<?php echo $maquinaid; ?>');
              $('#form_del_selector').attr('action', '/maquincost/selectores/delete/<?php echo $selectorId; ?>/<?php echo $maquinaid; ?>');
            <?php  
            } 
            ?>
           $("#selector<?php echo $selectorId; ?>").click(function()
           {
              $('#btn_edit_selector').attr('onclick', "edit_selector(\"<?php echo $selectorName; ?>\", <?php echo $selectorId; ?>, <?php echo $rango['Velocidadrango']['id']; ?>)");
              $('#form_del_selector').attr('action', '/maquincost/selectores/delete/<?php echo $selectorId; ?>/<?php echo $maquinaid; ?>');
              //$('#btn_del_selector').attr('href', '/maquincost/selectores/delete/<?php echo $selectorId; ?>/<?php echo $maquinaid; ?>');
           });
       <?php     
        }   
        endforeach;
       ?>
   </script>
  <?php 
   }?>  