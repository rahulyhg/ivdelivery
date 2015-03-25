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
</style>


 

      
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-left">
        
        <!--sidebar-->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div data-spy="affix" data-offset-top="45" data-offset-bottom="90">
          
<br>
<?php //debug($cartData); ?>
	<h3><?php echo __('Grocery List'); ?></h3>

	
	<table class="table table-bordered">

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
		foreach ($cartData as $cartItem) {
	?>
		<?php 
		echo('<tr><td>'); ?>
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
  		<?php echo $this->Html->link(__('Checkout'), array('controller' => 'Orders', 'action' => 'enterdetails', $supermarket['Supermarket']['id']), array('class' => 'btn btn-success btn-lg')); ?>
<br><br> 
			<?php echo $this->Form->postLink(__('Empty Cart'), array('controller' => 'OrdersItems', 'action' => 'emptyCart'), array('class' => 'btn btn-danger btn-sm'), __('Are you sure you want to empty cart')); ?>






           </div>
        </div><!--/sidebar-->
  	
        <!--/main-->
        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">

<?php echo $this->Form->create('Order'); ?>
	<?php //$this->Html->image($supermarket['Supermarket']['img'], array('width'=>'200px')); ?>

<h1>Choose Items from 	<?php echo h($supermarket['Supermarket']['name']); ?></h1>
<br>


	<?php if (!empty($supermarket['Item'])): ?>
	<table class="table table-hover" cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<?php if (!($supermarket['Supermarket']['name'] == 'Costco')) { ?>
		<th><?php echo __('Brand'); ?></th>
		<?php } ?>
		<!--<th><?php echo __('Description'); ?></th>-->
		<th><?php echo __('Cost'); ?></th>
		<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php $x=0; ?>
	<?php foreach ($supermarket['Item'] as $item): ?>
		<tr>
			<td><p id="itemname"><?php echo $item['name']; ?> <br> <?php

				echo $this->Html->image($item['img'], array('alt' => 'CakePHP', 'class' => 'img-thumbnail', 'id' => 'itemimage'));

			//echo $item['img']; ?></p></td>
		<?php if (!($supermarket['Supermarket']['name'] == 'Costco')) { ?>
			<td><?php echo $item['brand']; ?></td>
		<?php } ?>
			<!--<td><?php echo $item['description']; ?></td>-->
			<td><p id="itemname">$<?php echo $item['cost']; ?></p></td>
			<td class="actions">
		<div>
		<?php
		echo $this->Form->hidden('ItemsOrder.' . $x . '.item_id', array('value' => $item['id']));
		?>
		</div>
		<?php
		echo $this->Form->hidden('ItemsOrder.' . $x . '.quantity', array('default' => '0'));
		echo $this->Form->hidden('ItemsOrder.' . $x . '.total', array('default' => '0'));
		?>  

  		<?php echo $this->Html->link(__('Add to cart'), array('controller' => 'ItemsOrders', 'action' => 'addItemsOrder', $item['id']), array('class' => 'btn btn-primary btn-lg')); ?> 
		<?php $x=$x+1; ?>
		</tr>
	<?php endforeach; ?>
		<tr><td colspan="4"></td></tr>
	</table>
	
  		<?php echo $this->Html->link(__('Checkout'), array('controller' => 'Orders', 'action' => 'enterdetails', $supermarket['Supermarket']['id']), array('class' => 'btn btn-success btn-lg', 'id' => 'placeordersubmit')); ?><br><br> 

<?php endif; ?>
<br>
    </div>
  </div><!--/.container-->

