<div class="supermarkets index">
	<h2><?php echo __('Supermarkets'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($supermarkets as $supermarket): ?>
	<tr>
		<td><?php echo h($supermarket['Supermarket']['name']); ?>&nbsp;</td>
		<td><?php echo h($supermarket['Supermarket']['street']); ?>&nbsp;<?php echo h($supermarket['Supermarket']['zip']); ?>&nbsp;</td>
		<td><?php echo h($supermarket['Supermarket']['phone']); ?>&nbsp;</td>
		<td>
<?php
echo $this->Html->link('Place Order', array('controller' => 'orders', 'action' => 'placeorder', $supermarket['Supermarket']['id']), array('escape'=>false, 'class' => 'btn'));
?></td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>

