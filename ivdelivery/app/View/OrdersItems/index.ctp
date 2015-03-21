<div class="ordersItems index">
	<h2><?php echo __('Orders Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ordersItems as $ordersItem): ?>
	<tr>
		<td><?php echo h($ordersItem['OrdersItem']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ordersItem['Order']['id'], array('controller' => 'orders', 'action' => 'view', $ordersItem['Order']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ordersItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $ordersItem['Item']['id'])); ?>
		</td>
		<td><?php echo h($ordersItem['OrdersItem']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($ordersItem['OrdersItem']['total']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ordersItem['OrdersItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ordersItem['OrdersItem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ordersItem['OrdersItem']['id']), array(), __('Are you sure you want to delete # %s?', $ordersItem['OrdersItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Orders Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
