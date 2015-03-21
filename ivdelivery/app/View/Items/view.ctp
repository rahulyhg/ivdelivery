<div class="items view">
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supermarket'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['Supermarket']['name'], array('controller' => 'supermarkets', 'action' => 'view', $item['Supermarket']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo h($item['Item']['brand']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($item['Item']['cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($item['Item']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($item['Item']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option 1'); ?></dt>
		<dd>
			<?php echo h($item['Item']['option_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option 2'); ?></dt>
		<dd>
			<?php echo h($item['Item']['option_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option 3'); ?></dt>
		<dd>
			<?php echo h($item['Item']['option_3']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), array(), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supermarkets'), array('controller' => 'supermarkets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supermarket'), array('controller' => 'supermarkets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($item['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Time Stamp'); ?></th>
		<th><?php echo __('Delivery Time'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Delivery Charge'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Driver Id'); ?></th>
		<th><?php echo __('Processing Fee'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['time_stamp']; ?></td>
			<td><?php echo $order['delivery_time']; ?></td>
			<td><?php echo $order['notes']; ?></td>
			<td><?php echo $order['delivery_charge']; ?></td>
			<td><?php echo $order['total']; ?></td>
			<td><?php echo $order['driver_id']; ?></td>
			<td><?php echo $order['processing_fee']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array(), __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
