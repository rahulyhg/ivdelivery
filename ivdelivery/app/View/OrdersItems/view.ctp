<div class="ordersItems view">
<h2><?php echo __('Orders Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordersItem['OrdersItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersItem['Order']['id'], array('controller' => 'orders', 'action' => 'view', $ordersItem['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $ordersItem['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($ordersItem['OrdersItem']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($ordersItem['OrdersItem']['total']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orders Item'), array('action' => 'edit', $ordersItem['OrdersItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orders Item'), array('action' => 'delete', $ordersItem['OrdersItem']['id']), array(), __('Are you sure you want to delete # %s?', $ordersItem['OrdersItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
