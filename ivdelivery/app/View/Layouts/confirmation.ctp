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
    <link href="wwww.foodswoop.com/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php echo $this->Html->css('nhanimate.css'); ?>
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
      <?php echo $this->Html->css('nhstyle.css'); ?>
  <link href="www.foodswoop.com/color/default.css" rel="stylesheet">
  <?php //echo $this->Html->color('default.css'); ?>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

   
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">
                    <h1>Food Swoop</h1>

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo $this->Html->link(__('Home'), array('controller' => 'Users', 'action' => 'home')); ?></li>
        <li><a href="#about">Account</a></li>
    <li><a href="#service">Rewards</a></li>
         <?php  //if (!($authUser['role'] == 'admin')) { ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Now <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link(__('Albertsons'), array('controller' => 'orders', 'action' => 'placeorder', '54eea603-9c10-4f74-afd7-04a4c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Costco'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Trader Joes'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a')); ?></li>
          </ul>
        </li>
        <?php // } ?>

       <?php if (isset($authUser)) { ?>

     <?php  if ($authUser['role'] == 'admin') { ?>
        <li><?php echo $this->Html->link(__('Admin'), array('controller' => 'users', 'action' => 'view', $authUser['id'])); ?></li>
        <?php ?>
        <?php } ?>
        <li><?php echo $this->Html->link(__('Log Out'), array('controller' => 'users', 'action' => 'logout', $authUser['id'])); ?></li>
      <?php } else { ?>
  <li class="dropdown">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                      <?php 
                echo $this->Form->create('User', array('class'=>'navbar-form navbar-right','role' => 'form', 'novalidate' => true), array('controller' => 'Users', 'action'=>'login'));
                          echo '<div class="form-group">';
                                  echo $this->Form->input('User.0.username', array('label' => false, 'class'=>'form-control', 'placeholder' => 'Username', 'error' => false));
                          echo '</div>';
                          echo '<div class="form-group">';
                                  echo $this->Form->input('User.0.password',array('label' => false, 'class'=>'form-control', 'placeholder' => 'Password', 'error' => false));
                          echo '<br></div>';
                echo $this->Form->submit(
                    'Sign In', 
                    array('class' => 'btn btn-success btn-lg', 'id' => 'btnContactUs', 'name'=>'btn1')
                );
                      ?>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                <?php } ?>






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
