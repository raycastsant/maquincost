<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('MAQUINCOST'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php                     
		echo $this->Html->meta('icon');    
        echo $this->Html->css('bootstrap');
        //echo $this->Html->css('AutoFill');
        //echo $this->Html->css('jquery.dataTables'); 
        echo $this->Html->css('jquery-ui');
             
        echo $this->Html->script('bootstrap');
        echo $this->Html->script(array('jquery-1.10.2', 'jquery-ui'));
		echo $this->Html->script('bootstrap-dropdown');
        echo $this->Html->script('bootstrap-tab');
        echo $this->Html->script('bootstrap-affix');
        echo $this->Html->script('bootstrap-modal');
        echo $this->Html->script('bootstrap-tooltip');
        echo $this->Html->script('bootstrap-collapse');
        //echo $this->Html->script('AutoFill');
       // echo $this->Html->script('jquery.dataTables');
       // echo $this->Html->script('AutoFill.min');
        //echo $this->Html->script('jquery.dataTables.min');
        echo $this->Html->script('bootstrap-alert');
        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link href="/maquincost/img/timeline_marker.png" type="image/x-icon" rel="shortcut icon">
</head>
 
<body>   
	     <div class="navbar navbar-fixed-top navbar-inverse" id="header">
		  <div class="navbar-inner">
			
		     <div class="span"></div>
			  <div class="nav-collapse">
				<ul class="nav">
				  <li class="active"><a href="/maquincost/main/"><i class="icon-home"></i> <strong>Inicio</strong></a></li>
                    <?php 
                         $user = $this->Session->read("Auth.User");
                         if(isset($user)) 
                          echo $this->element('bar_content'); 
                    ?>
				</ul>
			  </div>
		  </div>
		</div>    
        
      <header class="headercolor" id="overview">
		<div class="span1"></div>
            <div class="span2">
            <br />
            <table>
                <tr>
                     <td><?php echo $this->Html->image('logo.png', array('class' => 'logo')) ?></td>  
                </tr>
            </table>
            </div>
 
    	    <div class="user-data"> 
        		<?php                    
                  if(!isset($user))  
                    echo "<i class=\"icon-user icon-white\"></i> ".$this->Html->link(('Iniciar sesión'), array('controller'=>'users', 'action' => 'login'), array('escape' => false, 'class' => 'user-data-links'));
                  else                    
                    echo "<i class=\"icon-user icon-white\"></i> ".$user['username']." | <i class=\"icon-off icon-white\"></i> <a href=\"/maquincost/users/logout\" class=\"user-data-links\">Cerrar sesión</a>"; ?>
                    
    		</div> 
			<div class="container">
                <div>
    				<h2 style="color: #ffffff;">MAQUINCOST 1.0</h2></center>
    				<p class="lead">Sistema para la Gestión de Costos de Maquinado</p>
					
                </div>
			</div>
		</header>        
	<br />
    
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
    
	<div id="footer">
		<?php /*echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => __('CakePHP: the rapid development php framework'), 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false)
			);*/
		?>
	</div>
    
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>