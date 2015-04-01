<div class="row">
	<div class="col-lg-12">
<div class="orders index">


	<h2>
	<?php echo __('Delivery: ' . $supername . ' ' . $time . ', ' . $date); ?></h2> 
 	<?php //echo $this->Html->link(__('All Orders'), array('controller' => 'orders', 'action' => 'searchresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?>
	<?php echo $this->Html->link(__('Unpaid'), array('controller' => 'Orders', 'action' => 'unpaidresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?>
	<?php echo $this->Html->link(__('Grocery List'), array('controller' => 'ItemsOrders', 'action' => 'resultsitemsorders', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?> 
	<?php echo $this->Html->link(__('Deliveries'), array('controller' => 'Orders', 'action' => 'deliveriesresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?>
	<?php echo $this->Html->link(__('Completed'), array('controller' => 'Orders', 'action' => 'completedresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?><br>
		<br>

	
		<h2><?php echo __('Completed'); ?> (<?php echo($orderCount); ?>)</h2>
	<table cellpadding="0" cellspacing="0" class="table table-responsive table-bordered table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_charge'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_status'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_status'); ?></th>
			<th><?php echo $this->Paginator->sort('driver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><b>
			<?php echo $this->Html->link(($order['User']['last_name'] . ', ' . $order['User']['first_name']), array('controller' => 'orders', 'action' => 'view', $order['Order']['id'])); ?></b>
		</td>
		<td>$<?php echo h($order['Order']['delivery_charge']); ?>&nbsp;</td>
		<td>$<?php echo h($order['Order']['total']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['payment_status']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['delivery_status']); ?>&nbsp;</td>

		<td>
			<?php echo $this->Html->link($order['Driver']['name'], array('controller' => 'drivers', 'action' => 'view', $order['Driver']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['notes']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-primary')); ?><br>

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
</div>
</div>

