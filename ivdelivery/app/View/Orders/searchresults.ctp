<div class="orders index">

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

<br>


	<h2><?php echo __($supername . ' ' . $time . ', ' . $date); ?></h2>
	<h4>Order Count: <?php echo($orderCount); ?></h4>
	<h4>Item Count: </h4>
	<?php echo $this->Html->link(__('Item List'), array('controller' => 'itemsorders', 'action' => 'resultsitemsorders', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?> 
	<table cellpadding="0" cellspacing="0" class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('supermarket_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_charge'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_status'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_status'); ?></th>
			<th><?php echo $this->Paginator->sort('driver_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($order['User']['id'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['supermarket_id']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['notes']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['delivery_charge']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['total']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['payment_status']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['delivery_status']); ?>&nbsp;</td>

		<td>
			<?php echo $this->Html->link($order['Driver']['name'], array('controller' => 'drivers', 'action' => 'view', $order['Driver']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-primary')); ?><br><br>
			<?php echo $this->Html->link(__('Paid'), array('action' => 'updatePaymentStatus', $order['Order']['id']), array('class' => 'btn btn-primary')); ?><br><br>
			<?php echo $this->Html->link(__('Delivered'), array('action' => 'updateDeliveryStatus', $order['Order']['id']), array('class' => 'btn btn-primary')); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?> <br><br> <?php
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

<br><br>




<br>




</div>

