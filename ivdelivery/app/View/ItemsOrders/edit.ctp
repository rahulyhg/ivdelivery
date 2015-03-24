<div class="itemsOrders form">
<?php echo $this->Form->create('ItemsOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Items Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('total');
		echo $this->Form->input('cost');
		echo $this->Form->input('delivery_fee');
		echo $this->Form->input('collected');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ItemsOrder.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ItemsOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
