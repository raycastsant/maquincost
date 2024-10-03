<!------------ Element para mostrar Dialogo de tablas de avances recomendados de una máquina. Ver Ctregistros add y edit --------------------->

<!-- <div id="dialog_avances_table" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="insert_avance_label" aria-hidden="true"> 
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="insert_avance_label">Avances recomendados</h3>
        <h3 id="edit_avance_label" style="display: none;">Editar valor de avance</h3>
    </div>
    <div class="modal-body"> -->
    
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
                   //$k = 0;
                   
                  //Recorriendo los rangos 
                   foreach($values as $rango=>$value):
                   {
                     $html .= '<li class="'.$active.'"><a href="#tab'.$i.'" data-toggle="tab">'.$rango.' </a></li>';   
                     $tabsContent .= '<div class="tab-pane '.$active.'" id="tab'.$i.'">';
                                         
                     /*$htmlSelectores = '<ul class="nav nav-tabs">';
                     $tabsContentSelectores = '<div class="tab-content">';
                     $activeSelectores = 'active';*/
                                          
                    //Recorriendo los selectores y sus valores asociados  
                     foreach($value as $selector=>$avances):
                     {           
                        //$tabsContent .= '<ul class="breadcrumb"><ul class="nav nav-pills" style="margin-bottom: 0px; margin-top: 0px;"><li class="active"><a>'.$selector.'</a></li></ul>';
                        
                       /* $htmlSelectores .= '<li class="'.$activeSelectores.'"><a href="#tabsel'.$k.'" data-toggle="tab">'.$selector.' </a></li>';
                        $tabsContentSelectores .= '<div class="tab-pane '.$activeSelectores.'" id="tabsel'.$k.'">';
                        $tabsContentSelectores .= $k;
                        
                        $tabsContentSelectores .= '<table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="5" cellpadding="5">';
                        */
                        
                        $tabsContent .= '<table class="table table-borderedall table-hover table-condensed dropdown" cellspacing="5" cellpadding="5">';
                        $tabsContent .= '<thead><tr><th class="tableheadercolor" colspan="'.$tdBreak.'"><center>'.$selector.'</center></th></tr></thead>';
                        $tdCount = 0;
                        
                           //Recorriendo los avances para el selector en cuestion 
                            foreach($avances as $avanceValue):
                            {
                                $tdcode = '<td><a href="#" onclick="set_avance_formValue('.$avanceValue.')"><span class="badge badge-success">'.$avanceValue.'</span></a></td>';
                              
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
                         
                       /* if(strlen($activeSelectores) > 0)
                         $activeSelectores = "";
                         
                        $k++; */
                     }
                     endforeach;
                     
                     /*$htmlSelectores .= '</ul>';
                     $tabsContentSelectores .= '</div>';   //Cerrando el div de contenido de los selectores
                     $tabsContent .= '<div class="tabbable">'.$htmlSelectores.$tabsContentSelectores.'</div>';*/
                     
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
            
 <!--   </div>
 </div> -->
 
 <script>
   //Establece el valor del avance seleccionado en el formulario de Ctregistro
    function set_avance_formValue(value)
    {
        $('#dialog_avances_table').modal('hide');
        $('#CtregistroAvance').prop('value', value);
    }
 </script>