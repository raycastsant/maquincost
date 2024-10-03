<div class="piezas index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/piezas/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></div>
    <h3><center><?php echo __('Listado de Piezas'); ?></center></h3>
    <hr />
   
     <center><table cellpadding='25' cellspacing='25'>
      <?php 
        $tdCount = 0;
        $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];
        
        foreach ($piezas as $pieza):
        {
            $piezaId = $pieza['Pieza']['id'];
            $tdcode = '<td><div class="dropdown"><a class="btn dropdown-toggle" id="pieza'.$piezaId.'" data-toggle="dropdown">';
            $tdcode .= '<img src="/maquincost/img/parts/'.$pieza['Pieza']['imagen'].'" id="pimg'.$piezaId.'" style="width: 60px; height: 60px; cursor: pointer;" class="img-rounded img-polaroid user-data-links" data-toggle="tooltip" title="Haga click para ver opciones..."/></a>';
            $tdcode .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
            $tdcode .= '<li><a class="disabled" href="/maquincost/piezas/edit/'.$piezaId.'" role="button"><i class="icon-pencil"></i>&nbsp;Editar</a></li>';
            $tdcode .= '<form id="form_del_pieza'.$piezaId.'" method="post" style="display:none;" name="form_del_pieza'.$piezaId.'" action="/maquincost/piezas/delete/'.$piezaId.'"><input type="hidden" value="POST" name="_method"></input></form>';
            $tdcode .= '<li><a onclick="if (confirm(&apos;¿Está seguro que desea eliminar la pieza seleccionada y todos los datos relacionados con esta?&apos;)) { document.form_del_pieza'.$piezaId.'.submit(); } event.returnValue = false; return false;" href="#"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a></li>';
            $tdcode .= '<li class="divider"></li>';
            $tdcode .= '<li><a href="/maquincost/cartastecnologicas/view/'.$piezaId.'" role="button"><i class="icon-tags"></i>&nbsp;Cartas tecnológicas</a></li>';            
            $tdcode .= '<li><a href="/maquincost/ordenes/add/'.$piezaId.'" role="button"><i class="icon-qrcode"></i>&nbsp;Emitir orden de trabajo</a></li>';
            $tdcode .= '</ul></div><center><b>'.$pieza['Pieza']['nombre'].'</b></center></td>';
            
            if($tdCount === 0) 
             echo '</tr><tr>'.$tdcode;
            else 
             echo $tdcode; 
             
             $tdCount++;
             if($tdCount === 6)
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
    	foreach ($piezas as $pieza): ?>
         $('#pimg<?php echo $pieza['Pieza']['id']; ?>').tooltip();
  <?php endforeach;
    ?>
</script>