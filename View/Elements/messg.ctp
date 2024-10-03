<!--<div class="alert container <?php echo $message['type']?>" style="width: 500px;text-align: center;">
	<button type="button" class="close" data-dismiss="alert">x</button>
    <?php echo $message['text']; ?>
</div>-->

<!--<div id="myAlert" class="alert alert-success fade in">
  <p><strong>Well done!</strong> You successfully read this alert message.</p>
</div>

<script>
function showAlert()
{
  $("#myAlert").addClass("in")
};

$('document').ready(function () 
{
   $('#myAlert').click();
});
</script>-->

<div id="saveAlert" class="alert <?php echo $message['type']?> hide container" data-alert="alert" style="width: 700px; text-align: center;">
    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-circle"></i></button>
    <?php echo $message['text']; ?>
</div>

<script>
    <?php
    	if($message['type'] === 'alert-error')
         echo "var fadetime = 70000;";
        else  
         echo "var fadetime = 30000;";
    ?>
    $("#saveAlert").fadeIn(1000);
    $(".alert").fadeOut(fadetime);
</script>