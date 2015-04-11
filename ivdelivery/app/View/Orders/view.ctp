
<div class="row">
	<div class="col-lg-12">
			<?php //debug($order); ?>
<h2><?php echo __('Order Details'); ?>: <?php echo($order['Order']['first_name'] . ' ' . $order['Order']['last_name']); ?>, <?php echo($order['Order']['delivery_date'] . ' ' . $order['Order']['delivery_time']); ?></h2><br>
	<dl class="dl-horizontal">
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link(($order['User']['first_name'] . ' ' . $order['User']['last_name']), array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Status'); ?></dt>
		<dd>
			<?php echo h($order['Order']['paypal_transaction_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Status'); ?></dt>
		<dd>
			<?php echo h($order['Order']['delivery_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Charge'); ?></dt>
		<dd>
			$<?php echo h($order['Order']['delivery_charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			$<?php echo h($order['Order']['total']); ?>
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

<br>

	<h3><?php echo __('Shopping List'); ?></h3>
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
		<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($order['Item'] as $item): ?>
	<?php if (!($item['ItemsOrder']['canceled'] == 'true')) { ?>
		<tr>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['brand']; ?></td>
			<td><?php //echo $item['ItemsOrder']['category_id']; ?></td>
			<td>$<?php echo $item['ItemsOrder']['cost']; ?></td>
			<td><?php echo $item['ItemsOrder']['quantity']; ?></td>
			<td>$<?php echo $item['ItemsOrder']['delivery_fee']; ?></td>
			<td>$<?php echo $item['ItemsOrder']['total']; ?></td>
			<td><?php echo $item['ItemsOrder']['purchased']; ?></td>
							<?php if (!($order['Order']['delivery_status'] == "delivered")) { ?>

			<td><?php echo $item['ItemsOrder']['added_to_order']; ?></td>
						<?php } ?>
			<td class="actions">
				<?php if (!($order['Order']['delivery_status'] == "delivered")) { ?>

				<?php echo $this->Html->link(__('Added to Order'), array('controller' => 'ItemsOrders', 'action' => 'updateOrderStatus', $item['ItemsOrder']['id']), array('class' => 'btn btn-primary')); ?>
				<?php //echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
<?php //if ($authUser['role'] == 'master') { ?>

				<?php //echo $this->Html->link(__('Edit Item'), array('controller' => 'ItemsOrders', 'action' => 'edit', $item['ItemsOrder']['id']), array('class' => 'btn btn-warning')); ?>
				<?php echo $this->Html->link(__('Cancel Item'), array('controller' => 'Orders', 'action' => 'calculatevalue', 'itemorderid' => $item['ItemsOrder']['id'], 'orderid' => $order['Order']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to remove %s?', $item['name'])); //} ?>

				<?php } ?>

			<br><br>
			</td>
		</tr>
		<?php } ?>

	<?php endforeach; ?>
	</table>
<br><br>
<br>
<?php endif; ?>
</div>
</div>
