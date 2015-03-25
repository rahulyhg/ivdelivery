<div class="payments index">


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

	<h2><?php echo __('Payments'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-responsive table-bordered table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($payments as $payment): ?>
	<tr>
		<td><?php echo h($payment['Payment']['type']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($payment['Order']['id'], array('controller' => 'orders', 'action' => 'view', $payment['Order']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $payment['Payment']['id']), array('class' => 'btn btn-primary')); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $payment['Payment']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $payment['Payment']['id'])); ?>
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

