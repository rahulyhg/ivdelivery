<div class="emails view">
<h2><?php echo __('Email'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($email['Email']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($email['Order']['id'], array('controller' => 'orders', 'action' => 'view', $email['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Driver Email'); ?></dt>
		<dd>
			<?php echo h($email['Email']['driver_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Email'); ?></dt>
		<dd>
			<?php echo h($email['Email']['user_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Driver Phone'); ?></dt>
		<dd>
			<?php echo h($email['Email']['driver_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Phone'); ?></dt>
		<dd>
			<?php echo h($email['Email']['user_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($email['Email']['message']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Email'), array('action' => 'edit', $email['Email']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Email'), array('action' => 'delete', $email['Email']['id']), array(), __('Are you sure you want to delete # %s?', $email['Email']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
