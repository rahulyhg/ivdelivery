<style>
#delete {
	font-color: red !important;
}
</style>



<?php if ($authUser['role'] == 'admin') { ?>


<div class="row">
	<div class="col-lg-12">
<h2><?php echo __('Admin Options'); ?></h2>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
<br>
<?php echo $this->Html->link(__('List Users'), array('action' => 'adminindex'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('Add Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('Search Delivery'), array('controller' => 'orders', 'action' => 'searchorders'), array('class' => 'btn btn-default')); ?> 

	</div>
</div>



<?php } ?>



<div class="row">
	<div class="col-lg-12">
<br>
  <div class="panel panel-info">
<div class="panel-heading"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?> 	<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('id'=> 'delete'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </div>
	<dl class="dl-horizontal">
		<?php if ($user['User']['role'] == "admin") { ?>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<?php } ?>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($user['User']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street 2'); ?></dt>
		<dd>
			<?php echo h($user['User']['street_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($user['User']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>

	</dl>
</div>


</div>
</div>
<div class="row">
	<div class="col-lg-12">


	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($user['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-responsive table-bordered table-hover">
	<tr>

		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Delivery Time'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Delivery Charge'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Driver Id'); ?></th>
		<th><?php echo __('Processing Fee'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Order'] as $order): ?>
		<tr>

			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['delivery_time']; ?></td>
			<td><?php echo $order['notes']; ?></td>
			<td><?php echo $order['delivery_charge']; ?></td>
			<td><?php echo $order['total']; ?></td>
			<td><?php echo $order['driver_id']; ?></td>
			<td><?php echo $order['processing_fee']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id']), array('class' => 'btn btn-primary')); ?><br><br>	
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div></div>
<br>
<br>

