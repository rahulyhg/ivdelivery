

<?php if ($authUser['role'] == 'admin') { ?>


<div class="row">
	<div class="col-lg-12">
<h2><?php echo __('Admin Options'); ?></h2>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
<br>
<?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'adminindex'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('Add Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('Search Delivery'), array('controller' => 'orders', 'action' => 'searchorders'), array('class' => 'btn btn-default')); ?> 



	</div>
</div>



<?php } ?>



<div class="row">
	<div class="col-lg-12">

<br><br>
<div class="orders form">

<?php echo $this->Form->create('Order', array(
    'inputDefaults' => array(
        'class' => 'form-control'
    )
)); ?>
	<fieldset>
		<legend><?php echo __('Search Orders'); ?></legend>
	<?php
		echo $this->Form->input('delivery_date');
	?>
	<br>
	<?php
		echo $this->Form->label('Delivery Time');
		echo ('<br>');
		$options = array('12:00:00' => '12:00 pm', '15:00:00' => '3:00 pm', '19:00:00' => '7:00 pm');
		//$options = array('12:00 pm' => '12:00:00', '3:00 pm' => '15:00:00', '7:00 pm' => '19:00:00');
		//$options = array('12:00:00' => '12:00 pm', '15:00:00' => '3:00 pm', '19:00:00' => '7:00 pm');
		echo $this->Form->select('delivery_time', $options);
	?>
	<br>	
	<br>
	<?php
		echo $this->Form->input('supermarket');

	?>
	</fieldset>
<br><br>
<?php
echo $this->Form->submit(
    'Search Orders', 
    array('class' => 'btn btn-primary btn-md')
);
?>
<br><br><br><br>
</div>
</div>
</div>
