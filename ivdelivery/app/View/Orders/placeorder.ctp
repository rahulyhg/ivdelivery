<style>
#itemimage {
	max-width: 150px !important;
	max-height: 150px !important;

}
#supermarketimage {
	width: 250px !important;
	height: 250px !important;

}
#ordersubmit {
	align: center;
}
#placeordersubmit {
	vertical-align: center !important;
	text-align: center !important;
	margin-left: auto !important;
	margin-right: auto !important;

}
#itemth {
	min-width: 171px !important;
}
#itemname {
	font-size: 18px !important;
}
#controls {
	width: 81px !important;

}
#carttable{
	width: 100% !important;

}

#title1 {

	font-family: Montserrat, sans-serif;

} 
.category { 
	font-size: 18px !important;
	/*text-shadow: -0.5px 0 0px #000 !important; */
}

.btnContactUs {
	background-color: #26BBA4 !important;
	border-color: #23ab96 !important;
	color: #fff;
}
.sidebar-nav-fixed {
    padding: 9px 0;
    position:fixed;
    left:20px;
    top:60px;
    width:250px;
}

.row-fluid > .span-fixed-sidebar {
    margin-left: 290px;
}

</style>


 

<div class="row">
        
        <!--sidebar-->
        <!-- <div class="col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
      


        </div><!--/sidebar-->
        <!--/main--> 
        <div class="col-md-8" data-spy="scroll" data-target="#sidebar-nav">

<?php echo $this->Form->create('Order'); ?>
	<?php //$this->Html->image($supermarket['Supermarket']['img'], array('width'=>'200px')); ?>
<div id="supermarketname">

<h1 id="title1"><?php echo h($supermarket['Supermarket']['name']); ?></h1>
</div>

<br>
<ul class="nav nav-pills">
	<?php //debug($categories); ?>
	<?php foreach ($categories as $category) { ?>
  <li role="presentation"><a href="#<?php echo($category); ?>"><?php echo($category); ?></a></li>
  	<?php } ?>
</ul><br>

	<?php 		//debug($categoriesInfo); ?>
<br>
	<?php foreach($categoriesInfo as $category) { ?>
	<h3 class="category" id="<?php echo($category['name']); ?>"><?php echo($category['name']); ?></h3>
<div class="table-responsive">

	<?php if (!empty($supermarket['Item'])): ?>
	<table class="table table-condensed" cellpadding = "0" cellspacing = "0">
	<!--<tr>
		<th><?php //echo __('Name'); ?></th>
		<?php //if (!($supermarket['Supermarket']['name'] == 'Costco')) { ?>
		<th><?php //echo __('Brand'); ?></th>
		<?php //} ?>
		<!--<th><?php //echo __('Description'); ?></th>-->
		<!--<th><?php //echo __('Cost'); ?></th>
		<th class="actions"><?php //echo __(''); ?></th>
	</tr>-->
	<?php $x=0; ?>
	<?php //debug($supermarket); ?>
	<?php 	$itemCount = count($supermarket['Item']);
			$itemCountCol1 = round($itemCount/2);
			$itemCountCol2 = ($itemCount - $itemCountCol1);
			//debug($itemCount);
	?>

	<?php $itemDisplayCount = 0; 
			$extraItem = 'true';
	?>

	<?php foreach ($supermarket['Item'] as $item): ?>
		<?php if ($item['category_id'] == $category['id']) { ?>
		<?php //debug($item); ?>
			<?php
			if ($x % 2 == 0) {
				?>
						<tr>
			<?php } ?>
		<td>
  		<?php echo $this->Html->link(__('+'), array('controller' => 'ItemsOrders', 'action' => 'addItemsOrder', $item['id']), array('class' => 'btn btn-primary btn-lg')); ?> <br></td>
			<td><p id="itemname"><?php echo $item['name']; ?> <br>($<?php echo $item['cost']; ?>)<br> <?php

				//echo $this->Html->image($item['img'], array('alt' => 'CakePHP', 'class' => 'img-thumbnail', 'id' => 'itemimage'));

			//echo $item['img']; ?></p></td>
			<!--<td><?php echo $item['description']; ?></td>-->
		<div>
		<?php
		echo $this->Form->hidden('ItemsOrder.' . $x . '.item_id', array('value' => $item['id']));
		?>
		</div>
		<?php
		echo $this->Form->hidden('ItemsOrder.' . $x . '.quantity', array('default' => '0'));
		echo $this->Form->hidden('ItemsOrder.' . $x . '.total', array('default' => '0'));
		?>  
		<?php
			$pricebutton = ('$' . $item['cost']); ?>
			<?php
			if (!($x % 2 == 0)) {
				?>
				</tr>
			<?php } ?>
					<?php $x=$x+1; ?>
			<?php
			$extraItem = 'false';
			?>
		<?php } ?>
	<?php endforeach; ?>
<?php
	if (!($x % 2 == 0)) {	
?>
	<td></td></tr>
	
<?php } ?>
	</table>
	</div>
  		<?php //secho $this->Html->link(__('Checkout'), array('controller' => 'Orders', 'action' => 'enterdetails', $supermarket['Supermarket']['id']), array('class' => 'btn btn-success btn-lg', 'id' => 'placeordersubmit')); ?><br><br> 

<?php endif; ?>
<?php } ?>
<br><br><br><br><br>
</div>


     <div class="col-md-4 fixed-top" id="sidebar" role="navigation">
          <div>
          
<br>
<?php //debug($cartData); ?>
	<h2><?php echo __('Grocery List'); ?></h2>

	
	<table class="table table-bordered" id="carttable">

	<tr>
		<th colspan="2" id="itemth">Item</th><th>Qty</th><th>Price</th>
	</tr>

	<?php if ($cartData == NULL) { ?>

	<tr>
		<td colspan="4"><i>Cart is empty</i></td>
	</tr>
	
	<?php } else { 
		$groceryTotal = 0;
		$counter = 0;
		//debug($cartData);
		foreach ($cartData as $cartItem) {
	?>
		<?php 
		echo('<tr><td id="controls">'); ?>
  		<?php //echo $this->Html->link(__('x'), array('controller' => 'ItemsOrders', 'action' => 'deleteFromCart', $cartItem['id']), array('class' => 'btn btn-danger btn-lg')); ?> 
  		<?php echo $this->Html->link(__('-'), array('controller' => 'ItemsOrders', 'action' => 'removeItemsOrder', $cartItem['id']), array('class' => 'btn btn-primary btn-sm')); ?> 
				<?php echo $this->Html->link(__('+'), array('controller' => 'ItemsOrders', 'action' => 'addItemsOrder', $cartItem['id']), array('class' => 'btn btn-primary btn-sm')); ?> 
	<?php
		echo('</td><td>' . $cartItem['name'] . '</td><td>' . $cartItem['quantity']); ?><br>

	<?php echo('</td><td>$' . $cartItem['total'] . '</td></tr>'); ?> 

	<?php   $itemTotal = $cartItem['total'];
		$groceryTotal = ($groceryTotal+$itemTotal); ?>


	<?php } ?>
	<tr><td colspan="4"><b>Item Total: </b>$<?php echo $groceryTotal; ?></td></tr>
	
	<?php } ?>
	</table>
	<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" alt="Buy now with PayPal" /><br><br>
  		<?php echo $this->Html->link(__('Checkout'), array('controller' => 'Orders', 'action' => 'enterdetails', $supermarket['Supermarket']['id']), array('class' => 'btn btn-success btn-lg', 'id' => 'btnContactUs')); ?>
<br><br>



           </div>
        </div><!--/sidebar-->
    </div>