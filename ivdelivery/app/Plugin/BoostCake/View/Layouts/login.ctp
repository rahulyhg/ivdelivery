<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		BoostCake -
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">


	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>
<div class="navbar">
    <div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#" name="top">IV Delivery</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li>
					<?php echo $this->Html->link(__('Home'), array('controller' => 'supermarkets', 'action' => 'home')); ?>
					</li>
					<li class="divider-vertical"></li>
					<li><?php echo $this->Html->link(__('Groceries'), array('controller' => 'supermarkets', 'action' => 'choosemarket')); ?></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-envelope"></i> Messages</a></li>
					<li class="divider-vertical"></li>
 				</ul>
				<ul class="nav pull-right">
					<li>
						<?php echo $this->Html->link(__('Sign Up'), array('controller' => 'users', 'action' => 'signup')); ?>
					</li>
                  	<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">

		<?php echo $this->Form->create('BoostCake', array(
			'inputDefaults' => array(
				'div' => false,
				'label' => false,
				'wrapInput' => false
			),
			'class' => 'well form-inline'
		)); ?>
			<?php echo $this->Form->input('email', array(
				'class' => 'input-small',
				'placeholder' => 'Email'
			)); ?><br>
			<?php echo $this->Form->input('password', array(
				'class' => 'input-small',
				'placeholder' => 'Password'
			)); ?><br>
			<?php echo $this->Form->checkbox('remember', array(
				'label' => 'Remember Me',
				'checkboxDiv' => false
			)); ?> 
				<?php echo $this->Form->label('Remember Me'); ?>
			<br>
			<?php echo $this->Form->submit('Sign in', array(
				'div' => false,
				'class' => 'btn'
			)); ?>
		<?php echo $this->Form->end(); ?>



						</div>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
	<div class="container">

	<fieldset>
		<?php echo $this->fetch('content'); ?>
	</fieldset>

	</div><!-- /container -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
