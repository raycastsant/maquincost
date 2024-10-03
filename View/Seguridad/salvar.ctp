<center>
<form action="/maquincost/seguridad/salvar" class="form-horizontal" method="post">
<div class="alert alert-info" style="width: 600px;">
    <p class="lead">Para realizar una copia de seguridad de la Base de Datos, haga clic en el botón <strong>Realizar Salva</strong>, seguidamente le aparecerá el fichero a descargar.</p>
    <button type="submit" class="btn btn-primary" id="button_save"><i class="icon-download-alt icon-white"></i>&nbsp;Realizar Salva</button>
</div>

</form>
</center>
<div id="textLoad">

</div>
<script>
$('document').ready(function () {
    $(document).ready(function(){
        
        function executeSalva()
        {
            $.ajax({async:true, data:null, dataType:"html", 
            success:function (data, textStatus) 
            {   
            
            }, type:"get", url:"\/maquincost\/seguridad\/salvar\/true"});
        };
        
        executeSalva();
   
        function showText()
        {
            //alert("11");
            $.ajax({async:true, data:null, dataType:"html", 
            success:function (data, textStatus) 
            {   
            //$("#subPeriodoMes").prop("disabled",false);
            $("#textLoad").html(data);
            
            }, type:"get", url:"\/maquincost\/seguridad\/salvar"});
            //$("#textLoad").html(....some codes here...);
        }
        
    });
    
    
    });
</script>