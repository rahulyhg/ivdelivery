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
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

<style>
#homepic {
	max-width: 900px !important;
	max-height: 350px !important;
	align: center !important;
	padding-left: auto !important;
	padding-right: auto !important;
	display: inline-block !important;
}
#hometron h1 {
	display: inline-block !important;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Small Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
<?php 
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('small-business.css');

?>
    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<? //debug($authUser); ?>

<?php if ((isset($authUser))) { ?>
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

<?php } else { ?>


<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link(__('College Delivers'), array('controller' => 'supermarkets', 'action' => 'home'), array('class' => 'navbar-brand')); ?> 

        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
		<li><?php echo $this->Html->link(__('About'), array('controller' => 'supermarkets', 'action' => 'about')); ?> </li>
		<li><?php echo $this->Html->link(__('Pricing'), array('controller' => 'supermarkets', 'action' => 'pricing')); ?> </li>
		<li><?php echo $this->Html->link(__('Contact Us'), array('controller' => 'supermarkets', 'action' => 'contactus')); ?> </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
                </form>
            </div>
        </center>
    </div>
</div><!--/.navbar -->





<? } ?>

    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
	<div class="jumbotron" id="hometron">
<?php
//echo $this->Html->image('sitelogo.jpg', array('alt' => 'CakePHP', 'class' => 'img-responsive', 'id' => 'homepic'));

?>

		  <h1>College Delivers</h1>
		  <p>Your Favourite Groceries at The Simplest Convenience</p><br><br>
                <?php echo $this->Html->link(__('Sign Up Now!'), array('controller' => 'Users', 'action' => 'signup'), array('class' => 'btn btn-primary btn-lg')); ?> 
		</div>
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Welcome!</h1>
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                <!--<a class="btn btn-primary btn-lg" href="#">Sign Up Now!</a>-->
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <!--<div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    This is a well that is a great spot for a business tagline or phone number for easy access!
                </div>
            </div>
        </div>-->
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2>Costco</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <?php echo $this->Html->link(__('Place Order'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5c6-b7cc-4bfb-97d3-04a5c0aa087a'), array('class' => 'btn btn-danger btn-lg')); ?> 
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Trader Joes</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <?php echo $this->Html->link(__('Place Order'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a'), array('class' => 'btn btn-warning btn-lg')); ?> 
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Albertsons</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <?php echo $this->Html->link(__('Place Order'), array('controller' => 'Orders', 'action' => 'placeorder', '54eea5e8-ecb8-4f34-a80e-0485c0aa087a'), array('class' => 'btn btn-info btn-lg')); ?> 
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
</body>

</html>
