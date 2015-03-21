<div class="deliveries form">
<?php echo $this->Form->create('Delivery'); ?>
	<fieldset>
		<legend><?php echo __('Add Delivery'); ?></legend>
	<?php
		echo $this->Form->input('driver_id');
		echo $this->Form->input('supermarket_id');
		echo $this->Form->input('date');
		$options = array('12:00:00', '15:00:00', '19:00:00');
		echo $this->Form->label('Delivery Time');
		echo $this->Form->select('time', $options, array('default' => '0', 'timeformat' => '12'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deliveries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Drivers'), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver'), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supermarkets'), array('controller' => 'supermarkets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supermarket'), array('controller' => 'supermarkets', 'action' => 'add')); ?> </li>
	</ul>
</div>
