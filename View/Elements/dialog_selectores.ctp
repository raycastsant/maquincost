<!---------------- Dialog Selectores ------------------------------------------------------------------------------------------------------->
<div id="selector_dialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="insert_selector_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="insert_selector_label">Insertar selector</h3>
        <h3 id="edit_selector_label" style="display: none;">Editar selector</h3>
    </div>
    <div class="modal-body">
       <form id="SelectoreForm" class="form-horizontal" accept-charset="iso-8859-1" method="post" action="/maquincost/selectores/add/<?php echo $maquinaid; ?>">
    	<fieldset>
            <input id="selectorVelRango" class="input" type="hidden" name="data[Selectore][velocidadrango_id]"/>
            <div class="control-group">
              <label class="control-label" for="selectornombre">Nombre&nbsp;</label>
              <input id="selectornombre" class="span2" type="text" name="data[Selectore][nombre]"/>
            </div>  
    	</fieldset>
        <div class='form-actions'>
           <button id="btn_submit_selector" class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a id='btn_cancel_selectordialog' class='btn' href='#'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
        </div> 
       </form> 
    </div>
</div>