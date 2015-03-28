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
<html lang="en">

<head>
  <style>
  .top-nav-collapse {
    background-color: #FA8072 !important;

  }
  footer {
    background-color: #FA8072 !important;

  }
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Swoop</title>

    <!-- Bootstrap Core CSS -->
  <?php echo $this->Html->css('nhbootstrap.min.css'); ?>

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php echo $this->Html->css('nhanimate.css'); ?>
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
      <?php echo $this->Html->css('nhstyle.css'); ?>
  <link href="color/default.css" rel="stylesheet">
  <?php //echo $this->Html->color('default.css'); ?>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <h1>Food Swoop</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo $this->Html->link(__('Home'), array('controller' => 'supermarkets', 'action' => 'home', $authUser['id'])); ?></li>
        <li><a href="#about">About</a></li>
    <li><a href="#service">Service</a></li>
    <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Now <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link(__('Albertsons'), array('controller' => 'orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Costco'), array('controller' => 'orders', 'action' => 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Trader Joes'), array('controller' => 'orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a')); ?></li>s
          </ul>
        </li>
        <li><?php echo $this->Html->link(__('Profile'), array('controller' => 'users', 'action' => 'view', $authUser['id'])); ?></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<br><br><br>
<div class="container">

  <div id="content">
 
  			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
     <?php     echo $this->Html->script('nhjquery.min');
    echo $this->Html->script('nhbootstrap.min.js');
    echo $this->Html->script('nhjquery.easing.min');
    echo $this->Html->script('nhjquery.scrollTo');
    echo $this->Html->script('nhwow.min'); ?>
  </div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
