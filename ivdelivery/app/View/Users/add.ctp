<style>
html {
	align: center !important;
}
</style>
<div class="users form" id="signupform">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<h3><?php echo __('Sign Up!'); ?></h3>
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

	?></td></tr>
	<td><tr colspan="2">

	<?php	echo $this->Form->input('role');	?>
	<?php	echo $this->Form->input('username');	?>


	</tr></td></table>
	</fieldset>
<?php
echo $this->Form->submit(
    'Sign Up', 
    array('class' => 'btn btn-default')
);
?>
</div>

