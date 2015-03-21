<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'College Delivers');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('custom-styles.receipt');
		echo $this->Html->css('bootstrap.receipt');

		echo $this->fetch('meta');
		echo $this->fetch('script');
	?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS
	Four bootstrap links
 -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" id="navbar1">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link(__('College Delivers'), array('controller' => 'supermarkets', 'action' => 'home'), array('class' => 'navbar-brand')); ?> 
        </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
		<li><?php echo $this->Html->link(__('About'), array('controller' => 'supermarkets', 'action' => 'about')); ?> </li>
		<li><?php echo $this->Html->link(__('Pricing'), array('controller' => 'supermarkets', 'action' => 'pricing')); ?> </li>
		<li><?php echo $this->Html->link(__('Contact Us'), array('controller' => 'supermarkets', 'action' => 'contactus')); ?> </li>
                </ul>
<ul class="nav pull-right">
          <li class="dropdown" id="menuLogin">
                <?php echo $this->Html->link(__('Profile'), array('controller' => 'Users', 'action' => 'view', $authUser['id']), array('class' => 'btn btn-primary btn-lg')); ?>
                      </li>
        </ul>
            </div>

    </div>
</div>
<br><br><br>
<div class="container">

  <div id="content">
 
  			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
  </div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
