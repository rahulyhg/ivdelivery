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

$cakeDescription = __d('cake_dev', 'Food Swoop');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script>

</script>

	<style>
	.top-nav-collapse {
		background-color: #FA8072 !important;

	}
	footer {
		background-color: #FA8072 !important;

	}
	#signup {
		color: #fff !important;

	}
	#story {
		font-size: 24px !important;

	}
	#mission{
		font-weight: normal !important;

	}
	#servicedescription {
		font-size: 22px !important;

	}

	#btnContactUs {
		background-color: #26BBA4 !important;
		border-color: #23ab96 !important;
		color: #fff;
	}
	#contact {
		  color: #fff;
		  /*background-image: url('<?php echo $this->webroot; ?>/img/img7.jpg') !important;*/
		  background-image: url('http://foodswoop.com/img/img7.jpg') !important;

	}
	#shopnow {
		text-align: center !important;

	}
	.col-centered{
		display: block !important;
		margin: 0 auto !important;
		text-align: center !important;
	}
	#shop {
		margin-left: auto !important;
		margin-right: auto !important;
				text-align: center !important;

	}
	#shop1 {
		margin-left: 70% !important;
	}
		#shop3 {
		margin-right: 70% !important;
	}
	#userhomebuy h3 {
		color: #fff !important;

  color: #FFF;
  text-shadow: none;
  line-height: 60px;
  font-weight: 700;
  font-family: Montserrat, sans-serif;
  background-color: rgba(0, 0, 0, 0);
  text-decoration: none;
  text-transform: uppercase;
  border-width: 0px;
  border-color: #000;
  border-style: none;
  text-shadow: -1px 0 1px #000;
	}


		#about {

	}

	</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Swoop</title>
    <link href="http://foodswoop.com/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://foodswoop.com/color/default.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
	<?php	echo $this->Html->css('nhbootstrap.min.css'); ?>

    <!-- Fonts -->
    <!--<link href="<?php echo $this->webroot; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    		<?php	//echo $this->Html->css('font-awesome.css'); ?>

		<?php	echo $this->Html->css('nhanimate.css'); ?>
    <!-- Squad theme CSS -->
    	<?php	echo $this->Html->css('nhstyle.css'); ?>
	<!--<link href="<?php echo $this->webroot; ?>/color/default.css" rel="stylesheet">-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

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
			<?php echo $this->Session->flash(); ?>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<?php //debug($authUser); ?>
			<h2>WELCOME <?php echo($authUser['first_name']); ?> </h2>
		</div>
		<div id="shop">
					<div class="page-scroll">

 
 <div class="row">
            <div class="col-sm-4 col-md-4" id="userhomebuy">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box" id="shop1">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-1.png" alt="" />
					</div>-->
					<div class="service-desc"><br>
						<br><h3>Albertsons</h3>
					</div>
                            <?php
								echo $this->Html->link("Go Shopping", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea603-9c10-4f74-afd7-04a4c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>
                </div>
				</div>
            </div>
			<div class="col-sm-4 col-md-4" id="userhomebuy">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-2.png" alt="" />
					</div>-->
					<div class="service-desc"><br>
						<br><h3>Costco</h3>
					</div>

                                                        <?php
								echo $this->Html->link("Go Shopping", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>
                </div>
				</div>
            </div>
			<div class="col-sm-4 col-md-4" id="userhomebuy">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box" id="shop3">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>-->
					<div class="service-desc"><br>
						<br><h3>Trader Joes</h3>
					</div>
                                                        <?php
								echo $this->Html->link("Go Shopping", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>
                </div>
				</div>
            </div>

        </div>		


       </div>
        </div>	
    </section>
	<!-- /Section: intro -->

	<!-- Section: about -->
    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Account</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
               

			<?php echo $this->fetch('content'); ?>

            </div>
        </div>		
		</div>

	<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading"><br><br><br>
					<p id="story"></p>

					</div>
					</div>
				</div>
			</div>
	</div>
		
	</section>
	<!-- /Section: about -->
	

	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Rewards</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>


		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
    	
		</div>

	<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading"><br><br><br><br><br><br><br><br>

					<h3>Coming soon!</h3>

					</div>
					</div>
					<br><br><br><br><br><br>
				</div>
			</div>
	</div>


	</section>
	<!-- /Section: services -->
	
	<!-- /Section: contact -->

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

    <!-- Core JavaScript Files -->
    <?php
		echo $this->Html->script('nhjquery.min');
		echo $this->Html->script('nhbootstrap.min.js');
		echo $this->Html->script('nhjquery.easing.min');
		echo $this->Html->script('nhjquery.scrollTo');
		echo $this->Html->script('nhwow.min');
		echo $this->Html->script('nhcustom');

    ?>
<!--    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
   <!-- <script src="js/custom.js"></script> -->

</body>

</html>

