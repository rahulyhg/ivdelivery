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


	<h2><?php echo __('List Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-responsive table-bordered table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('supermarket_id'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_time'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_charge'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('driver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('processing_fee'); ?></th>
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
		<td><?php echo h($order['Order']['delivery_time']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['notes']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['delivery_charge']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['total']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['Driver']['name'], array('controller' => 'drivers', 'action' => 'view', $order['Driver']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['processing_fee']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-primary')); ?><br><br>
	
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

<br><br>




<br>




</div>

