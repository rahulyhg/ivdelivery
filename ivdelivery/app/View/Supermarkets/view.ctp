<div class="supermarkets view">
<h2><?php echo __('Supermarket'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($supermarket['Supermarket']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supermarket'), array('action' => 'edit', $supermarket['Supermarket']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supermarket'), array('action' => 'delete', $supermarket['Supermarket']['id']), array(), __('Are you sure you want to delete # %s?', $supermarket['Supermarket']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supermarkets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supermarket'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Place Order'), array('controller' => 'orders', 'action' => 'placeorder', $supermarket['Supermarket']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($supermarket['Item'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Supermarket Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Brand'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Option 1'); ?></th>
		<th><?php echo __('Option 2'); ?></th>
		<th><?php echo __('Option 3'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($supermarket['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['id']; ?></td>
			<td><?php echo $item['supermarket_id']; ?></td>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['brand']; ?></td>
			<td><?php echo $item['cost']; ?></td>
			<td><?php echo $item['description']; ?></td>
			<td><?php echo $item['notes']; ?></td>
			<td><?php echo $item['option_1']; ?></td>
			<td><?php echo $item['option_2']; ?></td>
			<td><?php echo $item['option_3']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), array(), __('Are you sure you want to delete # %s?', $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
