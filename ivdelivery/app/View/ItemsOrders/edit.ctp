<div class="row">
	<div class="col-lg-12"

<div class="itemsOrders form">
<?php echo $this->Form->create('ItemsOrder', array(
    'inputDefaults' => array(
        'class' => 'form-control'
    )
)); ?>
	<fieldset>
		<legend><?php echo __('Edit Items Order'); ?></legend>
	<?php
		echo $this->Form->input('id');

		echo $this->Form->input('quantity');
	?>
	</fieldset>
<br>
<?php
echo $this->Form->submit(
    'Submit', 
    array('class' => 'btn btn-success')
);
?>
</div>
</div</div>
