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

    #brand {
    color: #fff !important;

  }

  .navbar navbar-custom navbar-fixed-top {
    background-color: #FA8072 !important;

  }
  #signup {
    color: #fff !important;

  }

  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Swoop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <?php echo $this->Html->css('nhbootstrap.min.css'); ?>

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" />
    <?php echo $this->Html->css('nhanimate.css'); ?>
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
      <?php echo $this->Html->css('nhstyle.css'); ?>
  <link href="color/default.css" rel="stylesheet">
  <?php //echo $this->Html->color('default.css'); ?>

</head>

  <!-- Preloader -->

    <nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">
                    <h1 id="brand">Food Swoop</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'supermarkets', 'action' => 'home')); ?></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Now <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link(__('Albertsons'), array('controller' => 'orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Costco'), array('controller' => 'orders', 'action' => 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Trader Joes'), array('controller' => 'orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a')); ?></li>
          </ul>
        </li>
        <?php if (isset($authUser)) { ?>


        <li><?php echo $this->Html->link(__('Profile'), array('controller' => 'users', 'action' => 'view', $authUser['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Log Out'), array('controller' => 'users', 'action' => 'logout', $authUser['id'])); ?></li>
      <?php } else { ?>
         <li class="dropdown">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <?php echo $this->Html->link(__('Sign Up'), array('controller' => 'users', 'action' => 'signup', $authUser['id']), array('class' => 'btn btn-primary', 'id' => 'signup')); ?>
                           
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
    <br><br><br>
  			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
  </div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="wow shake" data-wow-delay="0.4s">
          <div class="page-scroll marginbot-30">
            <a href="#intro" id="totop" class="btn btn-circle">
              <i class="fa fa-angle-double-up animated"></i>
            </a>
          </div>
          </div>
          <p>&copy;Copyright 2015 - Food Swoop. All rights reserved.</p>
        </div>
      </div>  
    </div>
  </footer>
    <?php
    echo $this->Html->script('nhjquery.min');
    echo $this->Html->script('nhbootstrap.min.js');
    echo $this->Html->script('nhjquery.easing.min');
    echo $this->Html->script('nhjquery.scrollTo');
    echo $this->Html->script('nhwow.min');
    //echo $this->Html->script('nhcustom');

    ?>
</html>
