<!------------ Element para mostrar Dialogo de tablas de velocidades recomendadas de una máquina. 
                                    Ver Ctregistros add y edit -------------------------------------------------->
 <?php
    if($errorFlag === '0')
    {
      ?> 
      <div class="tabbable tabs-left">
        <?php
           $tdBreak = 10;
           $html = '<ul class="nav nav-tabs">';
           $tabsContent = '<div class="tab-content">';
           $active = 'active';
           $i = 0;
           
          //Recorriendo los rangos 
           foreach($values as $rango=>$velocidades):
           {
                $html .= '<li class="'.$active.'"><a href="#tabvel'.$i.'" data-toggle="tab">'.$rango.' </a></li>';   
                $tabsContent .= '<div class="tab-pane '.$active.'" id="tabvel'.$i.'">';
                                               
                $tabsContent .= '<table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="5" cellpadding="5">';
                $tdCount = 0;
                
               //Recorriendo las velocidades para el selector en cuestion 
                foreach($velocidades as $velocidad):
                {
                    $tdcode = '<td><a href="#" onclick="set_velocidad_formValue('.$velocidad.')"><span class="badge badge-info">'.$velocidad.'</span></a></td>';
                  
                    if($tdCount === 0) 
                     $tabsContent .= '</tr><tr>'.$tdcode;
                    else 
                     $tabsContent .= $tdcode; 
                         
                    $tdCount++;
                    if($tdCount === $tdBreak)
                     $tdCount = 0;
                }
                endforeach; 
                 
              //Ver si es necesario repintar TD en el ultimo TR creado. Esto es para que quede mejor visualmente la tabla 
                if($tdCount > 0)
                {
                  while($tdCount < $tdBreak)
                  {
                    $tabsContent .= "<td>&nbsp;</td>";
                    $tdCount++;
                  }    
                } 
                 
                $tabsContent .= "</tr></table>";  
                $tabsContent .= '</div>';   //Cerrando el div de contenido de los rangos
             
                if(strlen($active) > 0)
                 $active = "";
                  
                $i++; 
           }
           endforeach;
           
           $html .= '</ul>';
           $html .= $tabsContent.'</div>';
                      
           echo $html;
        ?>
      </div>
<?php }  
    else
    {  ?> 
        <div class="alert alert-error alert-block">
          <b><?php echo $mesgHead; ?></b><br />
            <?php echo $mesg; ?>
        </div>
<?php
    }  ?>
 
 <script>
   //Establece el valor de la velocidad seleccionada en el formulario de Ctregistro
    function set_velocidad_formValue(value)
    {
        $('#dialog_velocidades_table').modal('hide');
        $('#CtregistroVelocidad').prop('value', value);
    }
 </script>