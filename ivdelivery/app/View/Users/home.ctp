<style>
#edit1 {
	text-align: left !important;


}
</style> 

 <div class="panel panel-info">
<div class="panel-heading" id="edit1">Details<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?> 	<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('id'=> 'delete'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </div>
	<dl class="dl-horizontal" id="edit1">
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

<br>
<br>
				            <?php echo $this->Html->link(__('Edit'), array('controller' => 'Users', 'action' => 'signup'), array('class' => 'btn btn-lg')); ?><br><br>
