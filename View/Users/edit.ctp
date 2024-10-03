<div class="users container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar usuario'); ?></h4></div>
        <br />
        
	<?php     
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
	    echo $this->Form->input('tipousuario_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nivel&nbsp;')));
		echo $this->Form->input('username', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nombre de usuario&nbsp;')));
		//echo $this->Form->input('password', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Contraseña&nbsp;')));
        //echo $this->Form->input('repassword', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'password', 'label'=>array('class'=>'control-label', 'text'=>'Confirmar contraseña&nbsp;')));
		echo $this->Form->input('nombre_completo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nombre completo&nbsp;')));

        if(!isset($checked))
         $checked = "";
	?>
    
    <div class="control-group">
    <label for="UserChangePassword" class="control-label">Cambiar Contraseña&nbsp;</label>
    <input name="data[User][changePassword]" type="checkbox" id="changePassword" <?php echo $checked; ?> />
    </div>
    
    <div id="divChangePassword" style="display: none" >  
    <?php	
		echo $this->Form->input('password', array('disabled'=>'disabled','div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('text'=>'Contraseña&nbsp;','class'=>'control-label')));
		echo $this->Form->input('repassword', array('disabled'=>'disabled','type'=>'password','div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('text'=>'Confirmar Contraseña&nbsp;','class'=>'control-label')));
     ?>
     </div>
     
	</fieldset>
    
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/users'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>

<script>
function showPasswordInputs()
{
    $("#UserPassword").val("");
    $("#UserRepassword").val("");
    if (!$("#changePassword").prop('checked'))
    {
        $("#divChangePassword").hide();
        $("#UserPassword").attr("disabled","disabled");
        $("#UserRepassword").attr("disabled","disabled");
    }        
    else
    {
        $("#divChangePassword").show();
        $("#UserPassword").removeAttr("disabled");
        $("#UserRepassword").removeAttr("disabled");
    } 
}

$("#changePassword").bind("change", function (event) 
{
    showPasswordInputs();
});

$('document').ready(function () 
{
    showPasswordInputs();    
});
</script>