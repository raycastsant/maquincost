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
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		/*echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
        echo $this->Html->script(array('jquery', 'jquery-ui'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');*/
		
		echo $this->Html->meta('icon');    
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('jquery-ui.css');
        //echo $this->Html->css('jquery-ui');      
        echo $this->Html->script('bootstrap');
        echo $this->Html->script(array('jquery', 'jquery-ui'));
		echo $this->Html->script('bootstrap-dropdown');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header class="jumbotron subhead" id="overview">
		<div class = "user-data">
    		<?php 
              $user = $this->Session->read("Auth.User");
              if(!isset($user)) 
                echo $this->Html->link(('Login'), array('controller' => 'users', 'action' => 'login'));
				
			?>	
        </div>			
		</header>          	
		<div id="content">			
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">	
        <?php echo $this->element('sql_dump'); ?>		
		</div>
	</div>
<?php echo $scripts_for_layout; ?>
	<!-- Js writeBuffer -->
	<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>
</body>
</html>
