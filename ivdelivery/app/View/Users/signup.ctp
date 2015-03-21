<style>
html {
	align: center !important;
}
</style>
<div class="users form" id="signupform">
<?php echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'class' => 'form-control',
    )
)); ?>
	<fieldset>
		<legend><?php echo __('Sign Up!'); ?></legend>
		<br>
	<table class="table">
	<tr><td>
	<?php
		echo $this->Form->hidden('type', array(
			'value' => 'customer'	
		));
		echo $this->Form->input('first_name');
	?>
	</td><td>
	<?php
		echo $this->Form->input('last_name');
	?></td></tr><tr><td><?php
		echo $this->Form->input('phone');
	?></td><td><?php

		echo $this->Form->input('street');
	?></td></tr><tr><td><?php

		echo $this->Form->input('street_2');
	?></td><td><?php

		echo $this->Form->input('zip');
	?></td></tr><tr><td><?php

		echo $this->Form->input('email');
	?></td><td><?php

		echo $this->Form->input('password');

	?></td></tr></table>
	</fieldset>
<?php
echo $this->Form->submit(
    'Sign Up!', 
    array('class' => 'btn btn-success')
);
?>
</div>

