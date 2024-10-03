<!------------ Dialog Gestión de Avance ----------------------------------------------------------------------------------------------------------->
<div id="dialog_avances" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="insert_avance_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="insert_avance_label">Inserte el nuevo valor de avance</h3>
        <h3 id="edit_avance_label" style="display: none;">Editar valor de avance</h3>
    </div>
    <div class="modal-body">
        <form id="AvanceForm" class="form-horizontal" accept-charset="iso-8859-1" method="post" action="/maquincost/avances/add/<?php echo $maquinaid; ?>">
        	<fieldset>
                <input id="SelectoreId" class="input" type="hidden" name="data[Avance][selectore_id]"/>
                <div class="control-group">
                  <label class="control-label" for="avance">Avance&nbsp;</label>
                  <input id="avance" class="span2" type="text" name="data[Avance][avance]"/>
                </div>  
        	</fieldset>
            <div class='form-actions'>
               <button id="btn_submit_avance" class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
               <a id='btn_cancel_avancesdialog' class='btn' href='#'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
            </div> 
       </form> 
    </div>
</div>