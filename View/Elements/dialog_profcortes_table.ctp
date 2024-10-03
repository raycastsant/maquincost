<!------------ Element para mostrar Dialogo de tablas de profundidades de corte recomendadas de una máquina. 
                            Ver Ctregistros add y edit ------------------------------------------------------------->   
        <?php
            if($errorFlag === '0')
            {
	          ?> 
              <div class="tabbable tabs-left">
                <?php
	               $tdCount = 0;
                   $tdBreak = 10;
                   $html = '<ul class="nav nav-tabs">';
                   $tabsContent = '<div class="tab-content">';
                   $active = 'active';
                   $i = 0;
                   
                  //Recorriendo los rangos 
                   foreach($values as $rango=>$value):
                   {
                     $html .= '<li class="'.$active.'"><a href="#tabpfc'.$i.'" data-toggle="tab">'.$rango.' </a></li>';   
                     $tabsContent .= '<div class="tab-pane '.$active.'" id="tabpfc'.$i.'">';
                                                                                   
                    //Recorriendo los selectores y sus valores asociados  
                     foreach($value as $selector=>$profcortes):
                     {                                   
                        $tabsContent .= '<table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="5" cellpadding="5">';
                        $tabsContent .= '<thead><tr><th class="tableheadercolor" colspan="'.$tdBreak.'"><center>'.$selector.'</center></th></tr></thead>';
                        $tdCount = 0;
                        
                           //Recorriendo las profundidades de corte para el selector en cuestion 
                            foreach($profcortes as $pfc):
                            {
                                $tdcode = '<td><a href="#" onclick="set_profcorte_formValue('.$pfc.')"><span class="badge badge-important">'.$pfc.'</span></a></td>';
                              
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
                         
                        $tabsContent .= "</tr></table></ul>";  
                     }
                     endforeach;
                     
                     $tabsContent .= '</div>';   //Cerrando el div de contenido de los rangos
                     
                     if(strlen($active) > 0)
                      $active = "";
                      
                     $i++; 
                   }
                   endforeach;
                   
                   $html .= '</ul>';
                   $html .= $tabsContent;
                   
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
   //Establece el valor de la profundidad de corte seleccionada en el formulario de Ctregistro
    function set_profcorte_formValue(value)
    {
        $('#dialog_profcortes_table').modal('hide');
        $('#CtregistroProfCorte').prop('value', value);
    }
 </script>