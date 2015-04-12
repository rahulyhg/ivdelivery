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
	min-width: 230px !important;
}
legend {
	color: #26BBA4 !important;
	font-weight: bold !important;
}
</style>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#datepicker').datepicker({
        dateFormat : 'yy-mm-dd'
    });
});
</script>
<?php
 if (!($cartData == NULL)) { 
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

		

	<?php }} ?>


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
));


 ?>


<h1>Order Details for <?php echo h($supermarket['Supermarket']['name']); ?>
</h1>
<br>
<fieldset>
	<legend>Delivery Information</legend>

	


	<?php

		/* echo $this->Form->input('delivery_date', array(
    'id' => 'datepicker',
    'type' => 'text')); */
	?> 

	<?php

		echo $this->Form->label('Delivery Time');
	?>
	<br>
	<?php

//debug($time);
//$timeval=array_values($time);
//debug($timeval);
				//$newtime=date('H:i', strtotime($time));
				//debug($time);
	
		//$options = array('12:00:00' => '12:00 pm', '15:00:00' => '3:00 pm', '19:00:00' => '7:00 pm');
		//$options = array('12:00 pm' => '12:00:00', '3:00 pm' => '15:00:00', '7:00 pm' => '19:00:00');
		//echo $this->Form->radio('delivery_time', $options, array('type' =>'radio', 'legend' => false));



					/*$time = $this->request->data['Rideoffer']['DepartureTime'];
                    $date = new DateTime($time['hour'] . ':' . $time['min'] . ' ' . $time['meridian']); 

                        $currentDate = strtotime($date['date']); // this line gives error
                        $futureDate = $currentDate+(60*30);
                        $formatDate = date("Y-m-d H:i", $futureDate);*/
 


			$deliveryOptions = array();

			if ($dw == 1) {

				if ($currentTime < '10:30:00') {
					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Tuesday, ' . $dates[1] . ' @' . $times[0]),
							('Tuesday,' . $dates[1] . ' @' . $times[1]),
							('Wednesday, ' . $dates[2] . ' @' . $times[0]),
							('Wednesday, ' . $dates[2] . ' @' . $times[1]),
							('Thursday, ' . $dates[3] . ' @' . $times[0]),
							('Thursday, ' . $dates[3] . ' @' . $times[1]),
							('Friday, ' . $dates[4] . ' @' . $times[0]),
							('Friday, ' . $dates[4] . ' @' . $times[1]),
							('Saturday, ' . $dates[5] . ' @' . $times[0]),
							('Saturday, ' . $dates[5] . ' @' . $times[1]),
							('Sunday, ' . $dates[6] . ' @' . $times[0]),
							('Sunday, ' . $dates[6] . ' @' . $times[1]),
						);
				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[1]),
							('Tuesday, ' . $dates[1] . ' @' . $times[0]),
							('Tuesday, ' . $dates[1] . ' @' . $times[1]),
							('Wednesday, ' . $dates[2] . ' @' . $times[0]),
							('Wednesday, ' . $dates[2] . ' @' . $times[1]),
							('Thursday, ' . $dates[3] . ' @' . $times[0]),
							('Thursday, ' . $dates[3] . ' @' . $times[1]),
							('Friday, ' . $dates[4] . ' @' . $times[0]),
							('Friday, ' . $dates[4] . ' @' . $times[1]),
							('Saturday, ' . $dates[5] . ' @' . $times[0]),
							('Saturday, ' . $dates[5] . ' @' . $times[1]),
							('Sunday, ' . $dates[6] . ' @' . $times[0]),
							('Sunday, ' . $dates[6] . ' @' . $times[1]),
						);

				} else {

					$deliveryOptions = array(
							('Tuesday, ' . $dates[1] . ' @' . $times[0]),
							('Tuesday,' . $dates[1] . ' @' . $times[1]),
							('Wednesday, ' . $dates[2] . ' @' . $times[0]),
							('Wednesday, ' . $dates[2] . ' @' . $times[1]),
							('Thursday, ' . $dates[3] . ' @' . $times[0]),
							('Thursday, ' . $dates[3] . ' @' . $times[1]),
							('Friday, ' . $dates[4] . ' @' . $times[0]),
							('Friday, ' . $dates[4] . ' @' . $times[1]),
							('Saturday, ' . $dates[5] . ' @' . $times[0]),
							('Saturday, ' . $dates[5] . ' @' . $times[1]),
							('Sunday, ' . $dates[6] . ' @' . $times[0]),
							('Sunday, ' . $dates[6] . ' @' . $times[1]),
						);




				}

			} elseif ($dw == 2) {

				if ($currentTime < '10:30:00') {


					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Wednesday, ' . $dates[1] . ' @' . $times[0]),
							('Wednesday, ' . $dates[1] . ' @' . $times[1]),
							('Thursday, ' . $dates[2] . ' @' . $times[0]),
							('Thursday, ' . $dates[2] . ' @' . $times[1]),
							('Friday, ' . $dates[3] . ' @' . $times[0]),
							('Friday, ' . $dates[3] . ' @' . $times[1]),
							('Saturday, ' . $dates[4] . ' @' . $times[0]),
							('Saturday, ' . $dates[4] . ' @' . $times[1]),
							('Sunday, ' . $dates[5] . ' @' . $times[0]),
							('Sunday, ' . $dates[5] . ' @' . $times[1]),
							('Monday, ' . $dates[6] . ' @' . $times[0]),
							('Monday, ' . $dates[6] . ' @' . $times[1]),
						);

				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[1]),
							('Wednesday, ' . $dates[1] . ' @' . $times[0]),
							('Wednesday, ' . $dates[1] . ' @' . $times[1]),
							('Thursday, ' . $dates[2] . ' @' . $times[0]),
							('Thursday, ' . $dates[2] . ' @' . $times[1]),
							('Friday, ' . $dates[3] . ' @' . $times[0]),
							('Friday, ' . $dates[3] . ' @' . $times[1]),
							('Saturday, ' . $dates[4] . ' @' . $times[0]),
							('Saturday, ' . $dates[4] . ' @' . $times[1]),
							('Sunday, ' . $dates[5] . ' @' . $times[0]),
							('Sunday, ' . $dates[5] . ' @' . $times[1]),
							('Monday, ' . $dates[6] . ' @' . $times[0]),
							('Monday, ' . $dates[6] . ' @' . $times[1]),
						);

				} else {
					$deliveryOptions = array(
							('Wednesday, ' . $dates[1] . ' @' . $times[0]),
							('Wednesday, ' . $dates[1] . ' @' . $times[1]),
							('Thursday, ' . $dates[2] . ' @' . $times[0]),
							('Thursday, ' . $dates[2] . ' @' . $times[1]),
							('Friday, ' . $dates[3] . ' @' . $times[0]),
							('Friday, ' . $dates[3] . ' @' . $times[1]),
							('Saturday, ' . $dates[4] . ' @' . $times[0]),
							('Saturday, ' . $dates[4] . ' @' . $times[1]),
							('Sunday, ' . $dates[5] . ' @' . $times[0]),
							('Sunday, ' . $dates[5] . ' @' . $times[1]),
							('Monday, ' . $dates[6] . ' @' . $times[0]),
							('Monday, ' . $dates[6] . ' @' . $times[1]),
						);
				}



			} elseif ($dw == 3) {

				if ($currentTime < '10:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Thursday, ' . $dates[1] . ' @' . $times[0]),
							('Thursday, ' . $dates[1] . ' @' . $times[1]),
							('Friday, ' . $dates[2] . ' @' . $times[0]),
							('Friday, ' . $dates[2] . ' @' . $times[1]),
							('Saturday, ' . $dates[3] . ' @' . $times[0]),
							('Saturday, ' . $dates[3] . ' @' . $times[1]),
							('Sunday, ' . $dates[4] . ' @' . $times[0]),
							('Sunday, ' . $dates[4] . ' @' . $times[1]),
							('Monday, ' . $dates[5] . ' @' . $times[0]),
							('Monday, ' . $dates[5] . ' @' . $times[1]),
							('Tuesday, ' . $dates[6] . ' @' . $times[0]),
							('Tuesday, ' . $dates[6] . ' @' . $times[1]),
						);

				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
								('Today @' . $times[1]),
								('Thursday, ' . $dates[1] . ' @' . $times[0]),
								('Thursday, ' . $dates[1] . ' @' . $times[1]),
								('Friday, ' . $dates[2] . ' @' . $times[0]),
								('Friday, ' . $dates[2] . ' @' . $times[1]),
								('Saturday, ' . $dates[3] . ' @' . $times[0]),
								('Saturday, ' . $dates[3] . ' @' . $times[1]),
								('Sunday, ' . $dates[4] . ' @' . $times[0]),
								('Sunday, ' . $dates[4] . ' @' . $times[1]),
								('Monday, ' . $dates[5] . ' @' . $times[0]),
								('Monday, ' . $dates[5] . ' @' . $times[1]),
								('Tuesday, ' . $dates[6] . ' @' . $times[0]),
								('Tuesday, ' . $dates[6] . ' @' . $times[1]),
							);
				} else {
					$deliveryOptions = array(
								('Thursday, ' . $dates[1] . ' @' . $times[0]),
								('Thursday, ' . $dates[1] . ' @' . $times[1]),
								('Friday, ' . $dates[2] . ' @' . $times[0]),
								('Friday, ' . $dates[2] . ' @' . $times[1]),
								('Saturday, ' . $dates[3] . ' @' . $times[0]),
								('Saturday, ' . $dates[3] . ' @' . $times[1]),
								('Sunday, ' . $dates[4] . ' @' . $times[0]),
								('Sunday, ' . $dates[4] . ' @' . $times[1]),
								('Monday, ' . $dates[5] . ' @' . $times[0]),
								('Monday, ' . $dates[5] . ' @' . $times[1]),
								('Tuesday, ' . $dates[6] . ' @' . $times[0]),
								('Tuesday, ' . $dates[6] . ' @' . $times[1]),
							);
				}



			} elseif ($dw == 4) {

				if ($currentTime < '10:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Friday, ' . $dates[1] . ' @' . $times[0]),
							('Friday,' . $dates[1] . ' @' . $times[1]),
							('Saturday, ' . $dates[2] . ' @' . $times[0]),
							('Saturday, ' . $dates[2] . ' @' . $times[1]),
							('Sunday, ' . $dates[3] . ' @' . $times[0]),
							('Sunday, ' . $dates[3] . ' @' . $times[1]),
							('Monday, ' . $dates[4] . ' @' . $times[0]),
							('Monday, ' . $dates[4] . ' @' . $times[1]),
							('Tuesday, ' . $dates[5] . ' @' . $times[0]),
							('Tuesday, ' . $dates[5] . ' @' . $times[1]),
							('Wednesday, ' . $dates[6] . ' @' . $times[0]),
							('Wednesday, ' . $dates[6] . ' @' . $times[1]),
						);

				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[1]),
							('Friday, ' . $dates[1] . ' @' . $times[0]),
							('Friday, ' . $dates[1] . ' @' . $times[1]),
							('Saturday, ' . $dates[2] . ' @' . $times[0]),
							('Saturday, ' . $dates[2] . ' @' . $times[1]),
							('Sunday, ' . $dates[3] . ' @' . $times[0]),
							('Sunday, ' . $dates[3] . ' @' . $times[1]),
							('Monday, ' . $dates[4] . ' @' . $times[0]),
							('Monday, ' . $dates[4] . ' @' . $times[1]),
							('Tuesday, ' . $dates[5] . ' @' . $times[0]),
							('Tuesday, ' . $dates[5] . ' @' . $times[1]),
							('Wednesday, ' . $dates[6] . ' @' . $times[0]),
							('Wednesday, ' . $dates[6] . ' @' . $times[1]),
							);
				} else {
					$deliveryOptions = array(
							('Friday, ' . $dates[1] . ' @' . $times[0]),
							('Friday, ' . $dates[1] . ' @' . $times[1]),
							('Saturday, ' . $dates[2] . ' @' . $times[0]),
							('Saturday, ' . $dates[2] . ' @' . $times[1]),
							('Sunday, ' . $dates[3] . ' @' . $times[0]),
							('Sunday, ' . $dates[3] . ' @' . $times[1]),
							('Monday, ' . $dates[4] . ' @' . $times[0]),
							('Monday, ' . $dates[4] . ' @' . $times[1]),
							('Tuesday, ' . $dates[5] . ' @' . $times[0]),
							('Tuesday, ' . $dates[5] . ' @' . $times[1]),
							('Wednesday, ' . $dates[6] . ' @' . $times[0]),
							('Wednesday, ' . $dates[6] . ' @' . $times[1]),
					);

					}

			} elseif ($dw == 5) {

				if ($currentTime < '10:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Saturday, ' . $dates[1] . ' @' . $times[0]),
							('Saturday, ' . $dates[1] . ' @' . $times[1]),
							('Sunday, ' . $dates[2] . ' @' . $times[0]),
							('Sunday, ' . $dates[2] . ' @' . $times[1]),
							('Monday, ' . $dates[3] . ' @' . $times[0]),
							('Monday, ' . $dates[3] . ' @' . $times[1]),
							('Tuesday, ' . $dates[4] . ' @' . $times[0]),
							('Tuesday, ' . $dates[4] . ' @' . $times[1]),
							('Wednesday, ' . $dates[5] . ' @' . $times[0]),
							('Wednesday, ' . $dates[5] . ' @' . $times[1]),
							('Thursday, ' . $dates[6] . ' @' . $times[0]),
							('Thursday, ' . $dates[6] . ' @' . $times[1]),
						);

				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[1]),
							('Saturday, ' . $dates[1] . ' @' . $times[0]),
							('Saturday, ' . $dates[1] . ' @' . $times[1]),
							('Sunday, ' . $dates[2] . ' @' . $times[0]),
							('Sunday, ' . $dates[2] . ' @' . $times[1]),
							('Monday, ' . $dates[3] . ' @' . $times[0]),
							('Monday, ' . $dates[3] . ' @' . $times[1]),
							('Tuesday, ' . $dates[4] . ' @' . $times[0]),
							('Tuesday, ' . $dates[4] . ' @' . $times[1]),
							('Wednesday, ' . $dates[5] . ' @' . $times[0]),
							('Wednesday, ' . $dates[5] . ' @' . $times[1]),
							('Thursday, ' . $dates[6] . ' @' . $times[0]),
							('Thursday, ' . $dates[6] . ' @' . $times[1]),
					);
				} else {
					$deliveryOptions = array(
							('Saturday, ' . $dates[1] . ' @' . $times[0]),
							('Saturday, ' . $dates[1] . ' @' . $times[1]),
							('Sunday, ' . $dates[2] . ' @' . $times[0]),
							('Sunday, ' . $dates[2] . ' @' . $times[1]),
							('Monday, ' . $dates[3] . ' @' . $times[0]),
							('Monday, ' . $dates[3] . ' @' . $times[1]),
							('Tuesday, ' . $dates[4] . ' @' . $times[0]),
							('Tuesday, ' . $dates[4] . ' @' . $times[1]),
							('Wednesday, ' . $dates[5] . ' @' . $times[0]),
							('Wednesday, ' . $dates[5] . ' @' . $times[1]),
							('Thursday, ' . $dates[6] . ' @' . $times[0]),
							('Thursday, ' . $dates[6] . ' @' . $times[1]),
					);
				}

			} elseif($dw == 6) {

				if ($currentTime < '10:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Sunday, ' . $dates[1] . ' @' . $times[0]),
							('Sunday, ' . $dates[1] . ' @' . $times[1]),
							('Monday, ' . $dates[2] . ' @' . $times[0]),
							('Monday, ' . $dates[2] . ' @' . $times[1]),
							('Tuesday, ' . $dates[3] . ' @' . $times[0]),
							('Tuesday, ' . $dates[3] . ' @' . $times[1]),
							('Wednesday, ' . $dates[4] . ' @' . $times[0]),
							('Wednesday, ' . $dates[4] . ' @' . $times[1]),
							('Thursday, ' . $dates[5] . ' @' . $times[0]),
							('Thursday, ' . $dates[5] . ' @' . $times[1]),
							('Friday, ' . $dates[6] . ' @' . $times[0]),
							('Friday, ' . $dates[6] . ' @' . $times[1]),
						);

				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[1]),
							('Sunday, ' . $dates[1] . ' @' . $times[0]),
							('Sunday, ' . $dates[1] . ' @' . $times[1]),
							('Monday, ' . $dates[2] . ' @' . $times[0]),
							('Monday, ' . $dates[2] . ' @' . $times[1]),
							('Tuesday, ' . $dates[3] . ' @' . $times[0]),
							('Tuesday, ' . $dates[3] . ' @' . $times[1]),
							('Wednesday, ' . $dates[4] . ' @' . $times[0]),
							('Wednesday, ' . $dates[4] . ' @' . $times[1]),
							('Thursday, ' . $dates[5] . ' @' . $times[0]),
							('Thursday, ' . $dates[5] . ' @' . $times[1]),
							('Friday, ' . $dates[6] . ' @' . $times[0]),
							('Friday, ' . $dates[6] . ' @' . $times[1]),
						);
				} else {
					$deliveryOptions = array(
							('Sunday, ' . $dates[1] . ' @' . $times[0]),
							('Sunday, ' . $dates[1] . ' @' . $times[1]),
							('Monday, ' . $dates[2] . ' @' . $times[0]),
							('Monday, ' . $dates[2] . ' @' . $times[1]),
							('Tuesday, ' . $dates[3] . ' @' . $times[0]),
							('Tuesday, ' . $dates[3] . ' @' . $times[1]),
							('Wednesday, ' . $dates[4] . ' @' . $times[0]),
							('Wednesday, ' . $dates[4] . ' @' . $times[1]),
							('Thursday, ' . $dates[5] . ' @' . $times[0]),
							('Thursday, ' . $dates[5] . ' @' . $times[1]),
							('Friday, ' . $dates[6] . ' @' . $times[0]),
							('Friday, ' . $dates[6] . ' @' . $times[1]),
						);
				}


			} elseif($dw == 0) {

				if ($currentTime < '10:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[0]),
							('Today @' . $times[1]),
							('Monday, ' . $dates[1] . ' @' . $times[0]),
							('Monday, ' . $dates[1] . ' @' . $times[1]),
							('Tuesday, ' . $dates[2] . ' @' . $times[0]),
							('Tuesday, ' . $dates[2] . ' @' . $times[1]),
							('Wednesday, ' . $dates[3] . ' @' . $times[0]),
							('Wednesday, ' . $dates[3] . ' @' . $times[1]),
							('Thursday, ' . $dates[4] . ' @' . $times[0]),
							('Thursday, ' . $dates[4] . ' @' . $times[1]),
							('Friday, ' . $dates[5] . ' @' . $times[0]),
							('Friday, ' . $dates[5] . ' @' . $times[1]),
							('Saturday, ' . $dates[6] . ' @' . $times[0]),
							('Saturday, ' . $dates[6] . ' @' . $times[1]),
						);
				} elseif ($currentTime < '15:30:00') {

					$deliveryOptions = array(
							('Today @' . $times[1]),
							('Monday, ' . $dates[1] . ' @' . $times[0]),
							('Monday, ' . $dates[1] . ' @' . $times[1]),
							('Tuesday, ' . $dates[2] . ' @' . $times[0]),
							('Tuesday, ' . $dates[2] . ' @' . $times[1]),
							('Wednesday, ' . $dates[3] . ' @' . $times[0]),
							('Wednesday, ' . $dates[3] . ' @' . $times[1]),
							('Thursday, ' . $dates[4] . ' @' . $times[0]),
							('Thursday, ' . $dates[4] . ' @' . $times[1]),
							('Friday, ' . $dates[5] . ' @' . $times[0]),
							('Friday, ' . $dates[5] . ' @' . $times[1]),
							('Saturday, ' . $dates[6] . ' @' . $times[0]),
							('Saturday, ' . $dates[6] . ' @' . $times[1]),
						);
				} else {
					$deliveryOptions = array(
							('Monday, ' . $dates[1] . ' @' . $times[0]),
							('Monday, ' . $dates[1] . ' @' . $times[1]),
							('Tuesday, ' . $dates[2] . ' @' . $times[0]),
							('Tuesday, ' . $dates[2] . ' @' . $times[1]),
							('Wednesday, ' . $dates[3] . ' @' . $times[0]),
							('Wednesday, ' . $dates[3] . ' @' . $times[1]),
							('Thursday, ' . $dates[4] . ' @' . $times[0]),
							('Thursday, ' . $dates[4] . ' @' . $times[1]),
							('Friday, ' . $dates[5] . ' @' . $times[0]),
							('Friday, ' . $dates[5] . ' @' . $times[1]),
							('Saturday, ' . $dates[6] . ' @' . $times[0]),
							('Saturday, ' . $dates[6] . ' @' . $times[1]),
						);
					}
			}

//debug($dw);
			// /$dw2 = date("m-d", $dw2['date']);
			//$dd = $date();
			///$dw2 = strtotime($dw1); 
			//$dw2 = date("d-m", $dw1);

			//debug($dw2);
				//debug($currentTime);

			/*$time = "06:58:00";
			$time2 = "00:40:00";

			$secs = strtotime($time2)-strtotime("00:00:00");
			$result = date("H:i:s",strtotime($time)+$secs);
			$deliveryOptions = array();
			$optionAmount = 14;
			for ($x = 0; $x <= $optionAmount; $x++) {
				//$deliveryOptions[$x] = $this->Time->Formatv


				}
*/
	?><?php
	//debug($deliveryOptions); ?>
	<?php
//$options = array('1' => 'Today ', '2' => 'Today', '3' => );
$attributes = array('legend' => false, 'separator' => '</li><br><li>');

echo $this->Form->select('delivery_choice', $deliveryOptions, array('class' => 'form-control'));
?>
	<br>	<?php
		//echo $this->Form->label('Immediate Deliver?');
	?>
	
	<?php /*
		echo $this->Form->checkbox('fast_track', array(
			'label' => false
		));
		echo $this->Form->label('+$20');
		*/
	?>


	<table class="table borderless"><tr><td>
	<?php
		echo $this->Form->hidden('user_id', array('value' => $authuserid)); ?>

<?php
		//echo $this->Form->input('notes');
		echo $this->Form->input('first_name', array('default' => $currentUser['first_name']));
		?></td><td>

		<?php
		echo $this->Form->input('last_name', array('default' => $currentUser['last_name']));
		?></td></tr><tr><td>
		<?php
		echo $this->Form->input('street', array('default' => $currentUser['street']));
		?>
		</td><td>
		<?php
		echo $this->Form->input('street_2', array('default' => $currentUser['street_2']));
		?>
		</td></tr><tr><td>
		<?php
		echo $this->Form->input('phone', array('default' => $currentUser['phone']));
		?>
		</td><td>
		<?php
		echo $this->Form->input('email', array('default' => $currentUser['email']));
		?>
		</td></tr></table>
		<?php
		echo $this->Form->hidden('item_total', array('value' => $groceryTotal));
		echo $this->Form->hidden('delivery_charge', array('default' => $deliveryCost));

		echo $this->Form->hidden('total', array('default' => $grandTotal));
		echo $this->Form->hidden('driver_id');
		echo $this->Form->hidden('processing_fee', array('default' => '0'));
		//echo $this->Form->input('Item');
	?>
	</fieldset>

<legend>Notes</legend>


		<?php
		echo $this->Form->input('notes', array('label' => false, 'placeholder' => 'Leave notes for driver...'));
		?>

<br><br><br>

<?php
echo $this->Form->submit(
    'Add Details', 
    array('class' => 'btn btn-success btn-lg', 'name'=>'btnOrder')
);
								echo $this->Form->end();

?>
</div>





     <div class="col-md-4 sidebar-offcanvas" id="sidebar" role="navigation">
          <div data-spy="affix" data-offset-top="45" data-offset-bottom="90">





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
	<tr><td colspan="3"><b>Item Total: </b>$<?php echo $groceryTotal; ?></td></tr>
	<?php if ($voucherUsed == 'true') { ?>
			<tr><td colspan="3"><b>Discount Reward: </b><?php echo $promotion; ?></td></tr>
	<?php } ?>
	<?php if ($voucherFailed == 'true') { ?>
			<tr><td colspan="3"><b>Invalid Reward Code! </b></td></tr>
	<?php } ?>

	<?php } ?>
	</table>
  		<?php //echo $this->Html->link(__('Empty Cart'), array('controller' => 'OrdersItems', 'action' => 'emptyCart'), array('class' => 'btn btn-danger btn-lg')); ?> 
  		<?php //echo $this->Html->link(__('Checkout'), array('controller' => 'Orders', 'action' => 'emptyCart'), array('class' => 'btn btn-primary btn-lg')); ?> 
<br>
<?php echo $this->Form->create('Promotion', array(
    'inputDefaults' => array(
        'class' => 'form-control'
    )
)); ?>
<?php
	if ($voucherUsed == 'false')	{
?>
<?php
		echo $this->Form->input('Promotion.code');
?><br>
<?php
		echo $this->Form->submit(
		    'Add Voucher', 
		    array('class' => 'btn btn-success btn-lg', 'name'=>'btnPromotion')
		);

	}
									echo $this->Form->end();

?>

</div>
</div>
</div>