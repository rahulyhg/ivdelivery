<style>
html {
	align: center !important;
}
body {
  background: url(../img/bg3.jpg) no-repeat top center;
  	color: #fff !important;

}
legend {
	color: #fff !important;
}
</style>
<div class="users form" id="signupform">
<?php echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'class' => 'form-control',
    )
)); ?>
	<fieldset>
		<h1><?php echo __('Sign Up!'); ?></h1>
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
	</fieldset><br><br>
<?php
echo $this->Form->submit(
    'Sign Up!', 
    array('class' => 'btn btn-success btn-lg')
);
?><br><br><br><br><br><br><br><br><br><br>
</div>

