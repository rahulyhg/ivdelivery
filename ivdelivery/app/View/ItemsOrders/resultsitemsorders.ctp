<div class="row">
	<div class="col-lg-12">
		<?php //debug($categories); ?>
<div class="itemsOrders index">
<?php //debug($namedparams);
		//unset($namedparams['sort']);
		//unset($namedparams['direction']);

	//echo $this->Html->link(__('Back to search results'), array('controller' => 'orders', 'action' => 'searchresults', '?' => $namedparams), array('class' => 'btn btn-default')); ?> 
<h2><?php echo __('Delivery: ' . $supername . ' ' . $time . ', ' . $date); ?></h2> 
 	<?php //echo $this->Html->link(__('All Orders'), array('controller' => 'orders', 'action' => 'searchresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?>
	<?php echo $this->Html->link(__('All Orders'), array('controller' => 'Orders', 'action' => 'unpaidresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?>
	<?php echo $this->Html->link(__('Grocery List'), array('controller' => 'ItemsOrders', 'action' => 'resultsitemsorders', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?> 
	<?php echo $this->Html->link(__('Deliveries'), array('controller' => 'Orders', 'action' => 'deliveriesresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?>
	<?php echo $this->Html->link(__('Completed'), array('controller' => 'Orders', 'action' => 'completedresults', 'date' => $date1, 'time' => $time, 'supermarket_id' => $supermarket_id), array('class' => 'btn btn-default')); ?><br>
		<br>




	<?php $itemsCount=count($itemsOrders); ?>
	<h2><?php echo __('Shopping List'); ?> (<?php echo($itemsCount); ?>)</h2>
	<table cellpadding="0" cellspacing="0" class="table table-responsive table-bordered table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cost'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
   			<th><?php echo $this->Paginator->sort('purchased'); ?></th>
			<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
		<?php //debug($itemsOrders); ?>
	<?php foreach ($itemsOrders as $itemsOrder): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($itemsOrder['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemsOrder['Item']['id'])); ?>
		</td>
		<td><?php echo h($itemsOrder['ItemsOrder']['quantity']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(($itemsOrder['Order']['last_name'] . ', ' . $itemsOrder['Order']['first_name']), array('controller' => 'orders', 'action' => 'view', $itemsOrder['Order']['id'])); ?>
		</td>
		<td>$<?php echo h($itemsOrder['ItemsOrder']['cost']); ?>&nbsp;</td>
		<td>$<?php echo h($itemsOrder['ItemsOrder']['total']); ?>&nbsp;</td>
		<td><?php echo h($itemsOrder['ItemsOrder']['category_id']); ?>&nbsp;</td>
		<td><?php echo h($itemsOrder['ItemsOrder']['purchased']); ?>&nbsp;</td>

		<td class="actions">
			<?php if (!($itemsOrder['ItemsOrder']['purchased'] == "Purchased")) { ?>
			<?php echo $this->Html->link(__('Purchase'), array('action' => 'updatePurchaseStatus', $itemsOrder['ItemsOrder']['id']), array('class' => 'btn btn-success')); ?>
			<?php } else { ?>

			<?php //echo $this->Html->link(__('Purchased'), array('action' => 'updatePurchaseStatus', $itemsOrder['ItemsOrder']['id']), array('class' => 'btn btn-danger')); ?>

			<?php } ?>
			<br><br>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $itemsOrder['ItemsOrder']['id']), array('class' => 'btn btn-warning')); ?>

			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $itemsOrder['ItemsOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div></div>