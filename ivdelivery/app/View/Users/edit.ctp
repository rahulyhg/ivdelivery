<div class="users form">
<?php echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'class' => 'form-control'
    )
)); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('role');
		echo $this->Form->input('username');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('street');
		echo $this->Form->input('street_2');
		echo $this->Form->input('zip');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

