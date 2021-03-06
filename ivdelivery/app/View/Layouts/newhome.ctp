<?php if (!(isset($authUser))) { ?>

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
	 <?php
 header("Access-Control-Allow-Origin: *"); ?>
<script>

</script>
  <meta name="keywords" content="Isla Vista Grocery Delivery, Groceries, Goleta, Trader Joes, Costco, Conveniance, Lunch, Dinner, Delivery, Isla Vista, College, UCSB, Grocery, Food, Swoop, Del Playa, DP, IV, Service, Student, Deltopia, Halloween, Santa Barbara, California, University, Beach, Ocean, Sun, Fraternity, Sorority, Greek, Cool, Extravaganza">
<meta name="description" content="Isla Vista / UCSB Grocery Delivery">
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
		  background-image: url('https://foodswoop.com/img/img7.jpg') !important;

	}
	#terms {
		font-weight: bold !important;
		font-size: 18px !important;
		display: inline !important;
	}
	#check {
		display: inline !important;
		text-align: center !important;
		padding-left: auto !important;
		padding-right: auto !important;
		vertical-align: center !important;
	}
	#checko {
		min-width: 50px !important;
	}
	#homeic {
		display: inline !important;
		text-align: center !important;
		padding-left: auto !important;
		padding-right: auto !important;
		vertical-align: center !important;
	}


	</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Swoop</title>

    <!-- Bootstrap Core CSS -->
	<?php	echo $this->Html->css('nhbootstrap.min.css'); ?>

    <!-- Fonts -->
    <!--<link href="<?php echo $this->webroot; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    		<?php	//echo $this->Html->css('font-awesome.css'); ?>

		<?php	echo $this->Html->css('nhanimate.css'); ?>
    <!-- Squad theme CSS -->
    	<?php	echo $this->Html->css('nhstyle.css'); ?>
	<!--<link href="<?php echo $this->webroot; ?>/color/default.css" rel="stylesheet">-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="https://foodswoop.com/color/default.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=869140499816984&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <h1>Food Swoop</h1>

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <!--<li><a href="#about">About</a></li>-->
        <li><a href="#service">Service</a></li>
		<li><a href="#contact">Sign Up</a></li>


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
			                              	<?php 
			 					echo $this->Form->create('User', array('class'=>'navbar-form navbar-right','role' => 'form'), array('controller' => 'Users', 'action'=>'login'));
			                    echo '<div class="form-group">';
			                            echo $this->Form->input('User.0.email', array('label' => false, 'class'=>'form-control', 'placeholder' => 'Email', 'error' => false));
			                    echo '</div>';
			                    echo '<div class="form-group">';
			                            echo $this->Form->input('User.0.password',array('label' => false, 'class'=>'form-control', 'placeholder' => 'Password', 'error' => false));
			                    echo '<br></div>';
								echo $this->Form->submit(
								    'Sign In', 
								    array('class' => 'btn btn-success btn-lg', 'id' => 'btnContactUs', 'name'=>'btn1')
								);
								echo $this->Form->end();
			                ?>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                <?php } ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Now <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link(__('Costco'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a')); ?></li>
            <li><?php echo $this->Html->link(__('Trader Joes'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a')); ?></li>
          </ul>
        </li>





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
			<h2>WELCOME TO <span class="text_color">Food Swoop</span> </h2>
			<h4>NOW Delivering to Isla Vista</h4>
			
			<a class="twitter-follow-button"
  href="https://twitter.com/food_swoop"
  data-show-count="false"
  data-lang="en">
Follow Us
</a>
<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script><br><br>

<div class="fb-like" data-href="https://www.facebook.com/foodswoopk" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div><br>
		</div>
		<div class="page-scroll">
			<a href="#about" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->

	<!-- Section: about -->
    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.1s">
					<div class="section-heading">
					<h2>How it works</h2>
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
            <div class="col-xs-12 col-sm-4 col-md-4">
				<div class="wow bounceInUp" data-wow-delay="0.1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h3>1. Order</h3>
						                                         <div class="avatar">
       <?php	echo $this->Html->image('team/6.jpg', array('alt' => 'CakePHP', 'class' => 'img-responsive img-circle', 'id'=>'homeic'));	?></div>

                        <p class="subtitle">Choose a store and fill out your shopping cart. Schedule a delivery for the same day or up to a week in advance. Food Swoop accepts credit card payments through PayPal and the site is in full compliance with PCI-DSS Standards to ensure security.</p>



                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h3>2. Pickup</h3>
						                        <div class="avatar">

						                        <?php	echo $this->Html->image('team/7.jpg', array('alt' => 'CakePHP', 'class' => 'img-responsive img-circle', 'id' => 'homeic'));	?></div>

                        <p class="subtitle">Drivers pickup orders from specific grocery stores. The driver may call the customer's phone number with questions regarding the order. During transport, perishable items are stored in cooling units and temperatures are recorded for quality assurance.  </p>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div class="wow bounceInUp" data-wow-delay="0.3s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h3>3. Delivery</h3>
						                                                <div class="avatar">
<?php	echo $this->Html->image('team/8.jpg', array('alt' => 'CakePHP', 'class' => 'img-responsive img-circle', 'id' => 'homeic'));	?></div>

                        <p class="subtitle">Food Swoop services Isla Vista and UCSB campus. Orders are delivered up to an hour following the schedueled delivery time. Written and photographed receipts are available upon request. Final order prices may be adjusted to match actual receipt.</p>
          

                    </div>
                </div>
				</div>
            </div>
        </div>		
		</div>

	<div class="container">
	</div>
		
	</section>
	<!-- /Section: about -->
	

	
	<!-- /Section: services -->
		<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.1s">
					<div class="section-heading">
					<h2>Our Services</h2>
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
        				<div class="col-sm-4 col-md-4"></div>
			<div class="col-sm-4 col-md-4">
				<div class="wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-box">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>-->
									                        <?php	echo $this->Html->image('logo.jpg', array('alt' => 'CakePHP', 'class' => 'img-responsive img-rounded'));	?>

                                                        <?php
								//echo $this->Html->link("Shop Trader Joes", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>
                </div>
				</div>
            </div>
			<div class="col-sm-4 col-md-4"></div>

        </div>		
		</div>

	<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.1s">
					<div class="section-heading"><br><br>
					<p id="servicedescription">Food Swoop shops at local grocery stores and delivers to Isla Vista / UCSB every day from 12pm to 1pm and 5pm to 6pm. The delivery fee consists of a $7.50 flat rate plus 5% of the total item cost.</p><br>
  

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
        				<div class="col-sm-4 col-md-4"></div>
			<div class="col-sm-4 col-md-4">
				<div class="wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-box">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>-->
					<div class="service-desc">
					</div>
                                                 <?php
								echo $this->Html->link("Shop Costco", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>       <br><br><br>
                                                                                 <?php
								echo $this->Html->link("Shop Trader Joes", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>
                </div>
				</div>
            </div>
			<div class="col-sm-4 col-md-4"></div>

        </div>		
		</div>




	</section>

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center" class="signup">
			<div class="heading-contact">
				<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.1s">
						<div class="section-heading">
						<h2>Sign Up!</h2>
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
		        			<div class="wow fadeInUp" data-wow-delay="0.1s">
							<div class="users form" id="signupform">
							<?php echo $this->Form->create('User', array(
							    'inputDefaults' => array(
							        'class' => 'form-control',
							        //'novalidate' => true
							    ),  array('controller' => 'Users', 'action'=>'login', 'btn2')
							)); ?>
								<fieldset>
								<table class="table">
								<tr><td>
								<?php
									echo $this->Form->hidden('User.1.type', array(
										'value' => 'customer'	
									));
									echo $this->Form->input('User.1.first_name');
								?>
								</td><td>
								<?php
									echo $this->Form->input('User.1.last_name');
								?></td></tr><tr><td><?php
									echo $this->Form->input('User.1.phone');
								?></td><td><?php

									echo $this->Form->input('User.1.street');
								?></td></tr><tr><td><?php

									echo $this->Form->input('User.1.street_2');
								?></td><td><?php

									echo $this->Form->input('User.1.zip');
								?></td></tr><tr><td><?php

									echo $this->Form->input('User.1.email');
								?></td><td><?php

									echo $this->Form->input('User.1.password');

								?></td></tr>
								<tr><td colspan="2">
							><?php

									echo $this->Form->input('User.1.signup_referral_code');

								?></td></tr>
								<tr><td colspan="2"> <br>
									<table><tr><td id="checko">
								<?php echo $this->Form->checkbox('User.1.termsagreed', array('label' => false, 'class' => 'form-control', 'default' => '0', 'required' => true
								)); ?></td><td>
								<p id="terms">Agree to <?php echo $this->Html->link(__('Terms of Service'), array('controller' => 'supermarkets', 'action' => 'termsprivacy')); ?></p>
										</td></tr></table></td></tr>
								</table>
								</fieldset>
							<?php
							echo $this->Form->submit(
							    'Submit',
							    array('class' => 'btn btn-success btn-lg', 'id' => 'btnContactUs', 'name' => 'btn2')
							);
							echo $this->Form->end();
							?>

							</div>
						</div>
		        </div>
			</div>

		</div>
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.2s">
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

<?php } else { ?>


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

<meta name="keywords" content="Groceries, Goleta, Trader Joes, Costco, conveniance, lunch, dinner, delivery, isla vista, college, ucsb, grocery, food, swoop, del playa, dp, iv, service, student">
<meta name="description" content="Isla Vista / UCSB Grocery Delivery">

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
	.borderless td, .borderless th {
	    border: none !important;
	}
	</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Swoop</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
                <a class="navbar-brand" href="/">
                    <h1>Food Swoop</h1>

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="#about">Account</a></li>
		     <?php  //if (!($authUser['role'] == 'admin')) { ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop Now <b class="caret"></b></a>
          <ul class="dropdown-menu">
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
			<?php //echo $this->Session->flash(); ?>

	<!-- Section: intro -->
    <section id="intro" class="intro text-center">
	
		<div class="slogan">
			<?php //debug($authUser); ?>
			<h2>WELCOME <?php echo($authUser['first_name']); ?> </h2>
		</div>
		<div id="shop">
					<div class="page-scroll">

 
 <div class="row">
			<div class="col-lg-8 col-lg-offset-2" id="userhomebuy">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box text-center">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-2.png" alt="" />
					</div>-->
					<div class="service-desc text-center"><br>
						<br>
						<table class="table borderless">
							<tr><td>  <?php
								echo $this->Html->link("Shop Trader Joes", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?><br><br><br>
                            <?php
								echo $this->Html->link("Shop Costco", array('controller' => 'Orders', 'action'=> 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a'), array('id' => 'btnContactUs', 'class' => 'btn btn-skin btn-lg'))
                            ?>





                        </td></tr>
							</table>
					</div>
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
	</div>
		
	</section>
	<!-- /Section: about -->
	

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

<?php } ?>
