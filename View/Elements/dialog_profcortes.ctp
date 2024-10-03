<!------------ Dialog Gestión de Profundidad de corte ----------------------------------------------------------------------------------------------------------->
<div id="dialog_profcortes" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="insert_profcorte_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="insert_profcorte_label">Inserte la nueva profundidad de corte</h3>
        <h3 id="edit_profcorte_label" style="display: none;">Editar profundidad de corte</h3>
    </div>
    <div class="modal-body">
        <form id="ProfcorteForm" class="form-horizontal" accept-charset="iso-8859-1" method="post" action="/maquincost/profcortes/add/<?php echo $maquinaid; ?>">
        	<fieldset>
                <input id="SelectoreIdPc" class="input" type="hidden" name="data[Profcorte][selectore_id]"/>
                <div class="control-group">
                  <label class="control-label" for="profcorte">Profundidad de corte&nbsp;</label>
                  <input id="profcorte" class="span2" type="text" name="data[Profcorte][profcorte]"/>
                </div>  
        	</fieldset>
            <div class='form-actions'>
               <button id="btn_submit_profcorte" class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
               <a id='btn_cancel_pcortedialog' class='btn' href='#'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
            </div> 
       </form> 
    </div>
</div>