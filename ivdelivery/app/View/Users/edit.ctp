<div class="users form">
<?php echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'class' => 'form-control'
    )
)); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
			echo $this->Form->hidden('id');

		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('street');
		echo $this->Form->input('street_2');
		echo $this->Form->input('zip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

