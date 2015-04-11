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
#confirm {
	//align: center !important;
	//text-align: center !important;
}
#itemth {
	min-width: 171px !important;
}
#cart {
	min-width: 358px !important;
}
#iframe1 {
	margin-left: auto !important;
	margin-right: auto !important;
	text-align: center !important;
}
</style>


<div class="row">
        
        <!--sidebar-->
        <!-- <div class="col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
      
        </div><!--/sidebar-->
        <!--/main--> 
        <div class="col-md-8" data-spy="scroll" data-target="#sidebar-nav">












        		<?php 
		$groceryTotal = 0;
		$counter = 0;
		$deliveryFees=0;
		$itemCount = count($cartData);
		$deliveryRate = 0;
		foreach ($cartData as $cartItem) {
	?>
		
  

	<?php  
		$itemTotal = $cartItem['total'];
		$groceryTotal = ($groceryTotal+$itemTotal); 
		$deliveryFees = ($deliveryFees+$cartItem['delivery_fee']); 
	?>
		

	<?php } ?>
	<?php //calculate delivery fee
	if ($itemCount <= 3) {
		$deliveryRate = 5;
		$deliveryCost=($deliveryRate+$deliveryFees);
		$grandTotal = ($groceryTotal+$deliveryRate+$deliveryFees);
	} elseif ($itemCount > 3 && $itemCount <= 10) {
		$deliveryRate = 10;
		$deliveryCost=($deliveryRate+$deliveryFees);
		$grandTotal = ($groceryTotal+$deliveryRate+$deliveryFees);
	}  elseif ($itemCount > 10 && $itemCount <= 20) {
		$deliveryRate = 15;
		if ($groceryTotal >= 200) {
			$smallCut = ($groceryTotal*.1);
			$deliveryCost = ($deliveryFees+$smallCut);
			$grandTotal = ($groceryTotal+$deliveryCost);
		} else {
			$deliveryCost=($deliveryRate+$deliveryFees);
			$grandTotal = ($groceryTotal+$deliveryCost);
		}
	}  elseif ($itemCount > 20) {
		$deliveryRate = 20;
		if ($groceryTotal >= 200) {
			$smallCut = ($groceryTotal*.1);
			$deliveryCost = ($deliveryFees+$smallCut);
			$grandTotal = ($groceryTotal+$deliveryCost);
		} else {
			$deliveryCost=($deliveryRate+$deliveryFees);
			$grandTotal = ($groceryTotal+$deliveryCost);
		}
	}
?>


<?php echo $this->Form->create('Order', array(
    'inputDefaults' => array(
        'class' => 'form-control'
    )
)); ?>
<br>
<h1>Review Order for <?php echo h($supermarket['Supermarket']['name']); ?>
</h1>
<br>


<fieldset>

	<legend>Total</legend>


<dl class="dl-horizontal">
  <dt>Items Total Cost</dt>
  <dd>$<?php echo $groceryTotal; ?></dd>
  <dt>Delivery Fees</dt>
  <dd>$<?php echo ($deliveryCost); ?></dd>
  <dt>Discount Amount</dt>
  <dd>$<?php 
  if (!(isset($sessionOrderData['promotion_discount_amount']))) {
  	echo('0');
  } else {
  	echo($sessionOrderData['promotion_discount_amount']);  
  }
  	?></dd>
  <dt>Processing Fee</dt>
  <dd> n/a </dd>
  <dt>Total Order Cost</dt>
  <dd>$<?php echo $grandTotal; ?>
</dd>

</dl>
</fieldset>
<br>

<fieldset>

	<legend>Order Details</legend>


<dl class="dl-horizontal">
  <dt>Name</dt>
  <dd><?php echo($sessionOrderData['first_name']); ?> <?php echo($sessionOrderData['last_name']);  ?></dd>
  <dt>Address</dt>
  <dd><?php echo($sessionOrderData['street']);  echo(' ' . $sessionOrderData['street_2']); ?></dd>
  <dt>Phone</dt>
  <dd><?php echo($sessionOrderData['phone']); ?></dd>
  <dt>Email</dt>
  <dd><?php echo($sessionOrderData['email']);  ?></dd>
  <dt>Delivery Time </dt>
  <dd><?php
 echo($sessionOrderData['delivery_date']); echo(' ' . $sessionOrderData['delivery_time']);  ?>
</dd>

</dl>
</fieldset>
<br>

	<legend>Payment Type</legend>

	<fieldset>
<iframe src="<?php echo $paypalUrl; ?>" name="test_iframe" scrolling="no" width="490px" height="550px" id="iframe1"></iframe>

	<?php
	/*	$options1 = array(
			'Cash' => 'Cash',
			'Venmo' => 'Venmo',
		);	
		echo $this->Form->input('Payment.type', array(
			'type' => 'select',
			'options' => $options1,
			'label' => 'Payment Type'
		));
		echo $this->Form->hidden('user_id', array('value' => $authuserid)); ?>

<br>
<?php
		echo $this->Form->input('notes');
		echo $this->Form->hidden('item_total', array('value' => $groceryTotal));
		echo $this->Form->hidden('delivery_charge', array('default' => '1'));
		echo $this->Form->hidden('total', array('default' => '1'));
		echo $this->Form->hidden('driver_id');
		echo $this->Form->hidden('processing_fee', array('default' => '1'));
		//echo $this->Form->input('Item'); */
	?>
	</fieldset>
<br>
<?php
echo $this->Form->submit(
    'Submit Order', 
    array('class' => 'btn btn-success')
);
?>
<br><br><br>
</div>



     <div class="col-md-4 sidebar-offcanvas" id="sidebar" role="navigation">
          <div>


<br>	<br>
<fieldset>
	<h3><?php echo __('Grocery List'); ?></h3>
</fieldset>
	<table class="table table-bordered" id="cart">
	<tr>
		<th id="itemth">Item</th><th>Qty</th><th>Price</th>
	</tr>

	<?php if ($cartData == NULL) { ?>

	<tr>
		<td colspan="3"><i>Cart is empty</i></td>
	</tr>
	
	<?php } else { 
		$groceryTotal = 0;
		$counter = 0;
		$deliveryFees=0;
		$itemCount = count($cartData);
		$deliveryRate = 0;
		foreach ($cartData as $cartItem) {
	?>
		<?php 
		echo('<tr>'); ?>
  
	<?php
		echo('<td>' . $cartItem['name'] . '</td><td>' . $cartItem['quantity'] . '</td><td>$' . $cartItem['total'] . '</td></tr>'); ?> 

	<?php  
		$itemTotal = $cartItem['total'];
		$groceryTotal = ($groceryTotal+$itemTotal); 
		$deliveryFees = ($deliveryFees+$cartItem['delivery_fee']); 
	?>
		

	<?php } ?>
	<?php //calculate delivery fee
	if ($itemCount <= 3) {
		$deliveryRate = 5;
		$deliveryCost=($deliveryRate+$deliveryFees);
		$grandTotal = ($groceryTotal+$deliveryRate+$deliveryFees);
	} elseif ($itemCount > 3 && $itemCount <= 10) {
		$deliveryRate = 10;
		$deliveryCost=($deliveryRate+$deliveryFees);
		$grandTotal = ($groceryTotal+$deliveryRate+$deliveryFees);
	}  elseif ($itemCount > 10 && $itemCount <= 20) {
		$deliveryRate = 15;
		if ($groceryTotal >= 200) {
			$smallCut = ($groceryTotal*.1);
			$deliveryCost = ($deliveryFees+$smallCut);
			$grandTotal = ($groceryTotal+$deliveryCost);
		} else {
			$deliveryCost=($deliveryRate+$deliveryFees);
			$grandTotal = ($groceryTotal+$deliveryCost);
		}
	}  elseif ($itemCount > 20) {
		$deliveryRate = 20;
		if ($groceryTotal >= 200) {
			$smallCut = ($groceryTotal*.1);
			$deliveryCost = ($deliveryFees+$smallCut);
			$grandTotal = ($groceryTotal+$deliveryCost);
		} else {
			$deliveryCost=($deliveryRate+$deliveryFees);
			$grandTotal = ($groceryTotal+$deliveryCost);
		}
	}
	?>
	
	<?php } ?>
	<tr><td colspan="4"><b>Item Total: </b>$<?php echo $groceryTotal; ?></td></tr>

	</table>
  		<?php //echo $this->Html->link(__('Empty Cart'), array('controller' => 'OrdersItems', 'action' => 'emptyCart'), array('class' => 'btn btn-danger btn-lg')); ?> 
  		<?php //echo $this->Html->link(__('Checkout'), array('controller' => 'Orders', 'action' => 'emptyCart'), array('class' => 'btn btn-primary btn-lg')); ?> 
<br>


</div>
</div>
</div>