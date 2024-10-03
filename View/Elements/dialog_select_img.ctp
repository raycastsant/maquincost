 <!-- Button to trigger modal 
    <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>  -->
     
    <!-- Modal -->
    <div id="modaldialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Seleccionar icono</h3>
        </div>
        <div class="modal-body">
            <?php
	           $filelist = scandir("img".DS."machines".DS);
               
               if(count($filelist > 2))
               { 
            ?>  
                 <table cellpadding='0' cellspacing='0' class='table table-bordered table-hover table-condensed'>
                  <?php 
                    $tdCount = 0;
                    for($i=2; $i<count($filelist); $i++)
                    {
                        $tdcode = '<td><a id="'.substr($filelist[$i], 0, strlen($filelist[$i])-4).'"><img src="../../img/machines/'.$filelist[$i].'" style="width: 80px; height: 80px; cursor: pointer;" class="img-rounded img-polaroid user-data-links"/></a></td>';
                        
                        if($tdCount === 0) 
                         echo '</tr><tr>'.$tdcode;
                        else 
                         echo $tdcode; 
                         
                         $tdCount++;
                         if($tdCount === 4)
                          $tdCount = 0;
                    }
                    
                    echo '</tr>';
                  ?>
                 </table>
            <?php
               }
            ?>  
        </div>
       <!-- <div class="modal-footer">
            <button class="btn btn-link">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div> --> 
    </div>