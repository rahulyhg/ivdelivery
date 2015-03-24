<div class="itemsOrders view">
<h2><?php echo __('Items Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itemsOrder['Order']['id'], array('controller' => 'orders', 'action' => 'view', $itemsOrder['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itemsOrder['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemsOrder['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Fee'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['delivery_fee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Collected'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['collected']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($itemsOrder['ItemsOrder']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Items Order'), array('action' => 'edit', $itemsOrder['ItemsOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Items Order'), array('action' => 'delete', $itemsOrder['ItemsOrder']['id']), array(), __('Are you sure you want to delete # %s?', $itemsOrder['ItemsOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Items Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
