<div class="supermarkets form">
<?php echo $this->Form->create('Supermarket'); ?>
	<fieldset>
		<legend><?php echo __('Edit Supermarket'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('street');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone');
		echo $this->Form->input('img');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Supermarket.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Supermarket.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Supermarkets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
