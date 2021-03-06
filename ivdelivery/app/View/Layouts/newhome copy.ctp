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
	<?php	echo $this->Html->css('nhbootstrap.min.css'); ?>

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<?php	echo $this->Html->css('nhanimate.css'); ?>
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    	<?php	echo $this->Html->css('nhstyle.css'); ?>
	<link href="color/default.css" rel="stylesheet">
	<?php	//echo $this->Html->color('default.css'); ?>

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
        <li class="active"><?php echo $this->Html->link(__('Home'), array('controller' => 'supermarkets', 'action' => 'home')); ?></li>
        <li><a href="#about">About</a></li>
		<li><a href="#service">Service</a></li>
		<li><a href="#contact">Contact</a></li>
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
			                              	<?php 
			 					echo $this->Form->create('User', array('class'=>'navbar-form navbar-right','role' => 'form'), array('controller' => 'Users', 'action'=>'login'));
			                    echo '<div class="form-group">';
			                            echo $this->Form->input('User.username', array('label' => false, 'class'=>'form-control', 'placeholder' => 'Username'));
			                    echo '</div>';
			                    echo '<div class="form-group">';
			                            echo $this->Form->input('User.password',array('label' => false, 'class'=>'form-control', 'placeholder' => 'Password'));
			                    echo '</div>';
								echo $this->Form->submit(
								    'Sign In', 
								    array('class' => 'btn btn-success btn-lg')
								);
			                ?>
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

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>WELCOME TO <span class="text_color">Food Swoop</span> </h2>
			<h4>Now Delivering to Isla Vista</h4>
		</div>
		<div class="page-scroll">
			<a href="#service" class="btn btn-circle">
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
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Who We Are</h2>
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
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Scott Alexander</h5>
                        <p class="subtitle">Co-Founder / Developer</p>
                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Michael Zhang</h5>
                        <p class="subtitle">Co-Founder / Wolfe of DP</p>
                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Charlie Bond</h5>
                        <p class="subtitle">Co-Founder / Dab</p>
                        <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Parker Webster</h5>
                        <p class="subtitle">Co-Founder / Delivery</p>
                        <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
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
            <div class="col-sm-4 col-md-4">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-1.png" alt="" />
					</div>-->
					<div class="service-desc">
						<h3>Albertsons</h3>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
					</div>
					    <button type="submit" class="btn btn-skin" id="btnContactUs">
                            Shop Now</button>
                </div>
				</div>
            </div>
			<div class="col-sm-4 col-md-4">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-2.png" alt="" />
					</div>-->
					<div class="service-desc">
						<h3>Costco</h3>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
					</div>
						<button type="submit" class="btn btn-skin" id="btnContactUs">
                            Shop Now</button>
                </div>
				</div>
            </div>
			<div class="col-sm-4 col-md-4">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<!--<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>-->
					<div class="service-desc">
						<h3>Trader Joes</h3>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
					</div>
						<button type="submit" class="btn btn-skin" id="btnContactUs">
                            Shop Now</button>
                </div>
				</div>
            </div>

        </div>		
		</div>
	</section>
	<!-- /Section: services -->
	

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Sign Up Now</h2>
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
        <div class="col-lg-8">
            <div class="boxed-grey">

            </div>
        </div>
		
		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Main Office</h5>
				
				<address>
				  <strong>Squas Design, Inc.</strong><br>
				  Tower 795 Folsom Ave, Beautiful Suite 600<br>
				  San Francisco, CA 94107<br>
				  <abbr title="Phone">P:</abbr> (123) 456-7890
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">email.name@example.com</a>
				</address>	
				<address>
				  <strong>We're on social networks</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>	
				</address>					
			
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
