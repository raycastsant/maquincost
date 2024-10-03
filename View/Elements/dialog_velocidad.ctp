<!------------ Dialog Gestión de Velocidad ----------------------------------------------------------------------------------------------------------->
<div id="vel_dialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="insert_vel_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="insert_vel_label">Inserte el nuevo valor</h3>
        <h3 id="edit_vel_label" style="display: none;">Editar valor</h3>
    </div>
    <div class="modal-body">
        <form id="VelocidadeAddForm" class="form-horizontal" accept-charset="iso-8859-1" method="post" action="/maquincost/velocidades/add/<?php echo $maquinaid; ?>">
        	<fieldset>
                <input id="VelocidadrangoId" class="input" type="hidden" name="data[Velocidade][velocidadrango_id]"/>
                <div class="control-group">
                  <label class="control-label" for="velocidad">Velocidad (rpm)&nbsp;</label>
                  <input id="velocidad" class="span2" type="text" name="data[Velocidade][velocidad]"/>
                </div>  
        	</fieldset>
            <div class='form-actions'>
               <button id="btn_submit_vel" class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
               <a id='btn_cancel_veldialog' class='btn' href='#'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
            </div> 
       </form> 
    </div>
</div>