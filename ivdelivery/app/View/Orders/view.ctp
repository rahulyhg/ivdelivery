
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
			<?php //debug($order); ?>
<h2><?php echo __('Order Details'); ?>: <?php echo($order['Order']['first_name'] . ' ' . $order['Order']['last_name']); ?>, <?php echo($order['Order']['delivery_date'] . ' ' . $order['Order']['delivery_time']); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link(($order['User']['first_name'] . ' ' . $order['User']['last_name']), array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Payment Type'); ?></dt>
		<dd>
			<?php echo h($order['Payment'][0]['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Status'); ?></dt>
		<dd>
			<?php echo h($order['Order']['payment_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Status'); ?></dt>
		<dd>
			<?php echo h($order['Order']['delivery_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Charge'); ?></dt>
		<dd>
			<?php echo h($order['Order']['delivery_charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($order['Order']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Driver'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Driver']['name'], array('controller' => 'drivers', 'action' => 'view', $order['Driver']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($order['Order']['notes']); ?>
			&nbsp;
		</dd>
	</dl>


	<h3><?php echo __('Item List'); ?></h3>
	<?php if (!empty($order['Item'])): ?>
	<?php //debug($order['Item']); ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-responsive table-bordered">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Brand'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Delivery Fee'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Purchased'); ?></th>
		<th><?php echo __('Add to Order'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['brand']; ?></td>
			<td><?php //echo $item['ItemsOrder']['category_id']; ?></td>
			<td>$<?php echo $item['ItemsOrder']['cost']; ?></td>
			<td><?php echo $item['ItemsOrder']['quantity']; ?></td>
			<td>$<?php echo $item['ItemsOrder']['delivery_fee']; ?></td>
			<td>$<?php echo $item['ItemsOrder']['total']; ?></td>
			<td><?php echo $item['ItemsOrder']['purchased']; ?></td>
			<td><?php echo $item['ItemsOrder']['added_to_order']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Added to Order'), array('controller' => 'ItemsOrders', 'action' => 'updateOrderStatus', $item['ItemsOrder']['id']), array('class' => 'btn btn-primary')); ?><br><br>
				<?php //echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), array(), __('Are you sure you want to delete # %s?', $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</div>
