<div class="maquinas index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/maquinas/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></td></div>
    <h3><center><?php echo __('Listado de Máquinas'); ?></center></h3>
    <hr />
   
     <center><table cellpadding='25' cellspacing='25'>
      <?php 
        $tdCount = 0;
        $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];
        
        foreach ($maquinas as $maquina):
        {
            $maquinaId = $maquina['Maquina']['id'];
            $tdcode = '<td><div class="dropdown"><a class="btn dropdown-toggle" id="maquina'.$maquinaId.'" data-toggle="dropdown">';
            $tdcode .= '<img src="/maquincost/img/machines/'.$maquina['Maquina']['imagen'].'" id="mimg'.$maquinaId.'" style="width: 60px; height: 60px; cursor: pointer;" class="img-rounded img-polaroid user-data-links" data-toggle="tooltip" title="Haga click para ver opciones..."/></a>';
            $tdcode .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
            $tdcode .= '<li><a href="/maquincost/maquinas/edit/'.$maquinaId.'" role="button"><i class="icon-pencil"></i>&nbsp;Editar</a></li>';
            $tdcode .= '<li class="divider"></li>';
            $tdcode .= '<li><a href="/maquincost/maquinasoperaciones/index/'.$maquinaId.'" role="button"><i class="icon-cog"></i>&nbsp;Definir operaciones</a></li>';
            $tdcode .= '<li><a href="/maquincost/velocidadrangos/index/'.$maquinaId.'" role="button"><i class="icon-list"></i>&nbsp;Gestionar tablas</a></li>';
            $tdcode .= '<li class="divider"></li>';
            $tdcode .= '<form id="form_del_maquina'.$maquinaId.'" method="post" style="display:none;" name="form_del_maquina'.$maquinaId.'" action="/maquincost/maquinas/delete/'.$maquinaId.'"><input type="hidden" value="POST" name="_method"></input></form>';
            $tdcode .= '<li><a onclick="if (confirm(&apos;¿Está seguro que desea eliminar la máquina seleccionada?&apos;)) { document.form_del_maquina'.$maquinaId.'.submit(); } event.returnValue = false; return false;" href="#"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a></li>';
            $tdcode .= '</ul></div><center><b>'.$maquina['Maquina']['nombre'].' '.$maquina['Maquina']['modelo'].'</b></center></td>';
            
            if($tdCount === 0) 
             echo '</tr><tr>'.$tdcode;
            else 
             echo $tdcode; 
             
             $tdCount++;
             if($tdCount === 5)
              $tdCount = 0;
        }
        endforeach;
        
        echo '</tr>';
      ?>
     </table></center>
    
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('<center>P&aacute;gina {:page} de {:pages}, mostrando {:current} máquinas de un total de {:count}, comenzando en la {:start}, terminando en la {:end}</center>')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div> 
</div>
<br />

<script>
  //SCRIPTS para poner los tooltips a las imagenes
    <?php
    	foreach ($maquinas as $maquina): ?>
         $('#mimg<?php echo $maquina['Maquina']['id']; ?>').tooltip();
  <?php endforeach;
    ?>
</script>