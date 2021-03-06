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
  <meta name="keywords" content="Groceries, Goleta, Trader Joes, Costco, conveniance, lunch, dinner, delivery, isla vista, college, ucsb, grocery, food, swoop, del playa, dp, iv, service, student, deltopia, halloween, santa barbara, college, california, university, beach, ocean, sun, fraternity, sorority, greek">
<meta name="description" content="Isla Vista / UCSB Grocery Delivery">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Swoop</title>

    <!-- Bootstrap Core CSS -->

    <!-- Fonts -->
    <!-- Squad theme CSS -->
  <?php //echo $this->Html->color('default.css'); ?>
<script type="text/javascript">
  <!--
    if (top.location!= self.location) {
      top.location = self.location.href; 
    }
  //-->
</script>
</head>

<body>

<br><br><br>
<div class="container">
<h1>Please wait a moment as the payment processes</h1>
  <div id="content">
    <br><br><br>
  			<?php //echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
  </div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
   
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
