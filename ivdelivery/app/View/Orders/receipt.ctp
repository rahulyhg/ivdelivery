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
</style>

<div class="orders form" id="confirm">
<?php //debug($savedOrder); ?>


     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
<h2>Sucess! Order submitted for delivery!</h2>

                <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
         <h4>  <strong>Customer Information</strong></h4>
           <strong> <?php echo($savedOrder['Order']['first_name'] . ' ' . $savedOrder['Order']['last_name']); ?></strong>
             <br />
                  <b>Address :</b> <?php echo $savedOrder['Order']['street']; ?><br> <?php echo $savedOrder['Order']['street_2']; ?>

              <br />
                 United States.
             <br />
             <b>Call :</b><?php echo $savedOrder['Order']['phone']; ?>

              <br />
             <b>E-mail :</b> <?php echo $savedOrder['Order']['email']; ?>

         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <h4>  <strong>Delivery Date </strong></h4>

               Delivery Date :  <?php echo ($savedOrder['Order']['delivery_time'] . ', ' . $savedOrder['Order']['delivery_date']); ?>              <br />
               Purchase Date : <?php $savedOrder['Order']['created']; ?>
               <h4>  <strong>Payment Details </strong></h4>
            <b>Bill Amount :  990 USD </b>
              <br />
               Bill Date : <?php echo $savedOrder['Order']['created']; ?>              <br />
               <b>Payment Status :  Paid </b>
               <br />

         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
<br>
           <div class="table-responsive">




	<fieldset>
		<legend><?php echo __('Grocery List'); ?></legend>
	</fieldset>
		
		<table class="table table-striped table-bordered table-hover">
		<tr>
			<td colspan = "4"><b>Details</b></td>
		</tr>
		<tr>
			<th>Item</th><th>Qty</th><th>Price</th>
		</tr>

		<?php if ($cartData == NULL) { ?>

		<tr>
			<td colspan="4"><i>Cart is empty</i></td>
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
		
		?>
			

		<?php } ?>
		<?php //calculate delivery fee




		?>
		
		<?php } ?>
		</table>

               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Grocery Total Amount: $<?php echo $savedOrder['Order']['item_total']; ?> </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Delivery Fee: $<?php echo $savedOrder['Order']['delivery_charge']; ?></h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Total Order Cost: $<?php echo $savedOrder['Order']['total']; ?></strong> </h4>
             </div>
         </div>
     </div>

      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
    <strong> Important: Please contact (XXX) XXX-XXXX with any concerns</strong>

             </div>
         </div>


