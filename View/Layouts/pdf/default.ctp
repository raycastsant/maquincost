<?php 
    header("Content-type: application/pdf");
    echo "<style>";
    echo $this->element('bootstrap');
?>
    @page { margin: 80px 20px; }
    #header { position: fixed; left: 0px; top: -80px; right: 0px; height: 20px;}
    #footer { position: fixed; left: 0px; bottom: -40px; right: 0px; height: 20px;text-align: right;}
    #footer .page:after { content: counter(page, decimal); } .page{color: #A9BDA8; font-weight: bold; font-size:12.0pt;line-height:115%;font-family:&quot;Arial Black&quot;,&quot;sans-serif&quot;;}
<?php    
    echo "</style>"; 
    echo "<div id='header'>";
    echo $this->element('reportes_encabezado'); 
    echo "</div>";
    echo "<div id='footer'>";    
    echo $this->element('reportes_pie');
    echo "</div>";
    echo "<center>".$content_for_layout."</center>"; 
?>