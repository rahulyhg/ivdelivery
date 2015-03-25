<div class="items form">

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
<br>


<?php echo $this->Form->create('Item', array(
    'inputDefaults' => array(
        'class' => 'form-control',
    )
)); ?>
<br>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('supermarket_id');
		echo $this->Form->input('name');
		echo $this->Form->input('category_id');
		echo $this->Form->input('delivery_fee', array('default' => '0'));
		echo $this->Form->input('img');
		echo $this->Form->input('brand');
		echo $this->Form->input('cost');
		echo $this->Form->input('description');
		echo $this->Form->input('notes');
		echo $this->Form->input('option_1');
		echo $this->Form->input('option_2');
		echo $this->Form->input('option_3');

	?>
	</fieldset>
<br>
<?php
echo $this->Form->submit(
    'Add Item', 
    array('class' => 'btn btn-primary btn-lg')
);
?>
<br>
<br>




</div>

