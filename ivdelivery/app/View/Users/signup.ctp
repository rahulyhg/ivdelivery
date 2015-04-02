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
	        'novalidate' => true
	    ),  array('controller' => 'Users', 'action'=>'login', 'btn2')
	)); ?>
	<fieldset>
		<h1><?php echo __('Sign Up!'); ?></h1>
		<br>
	<table class="table">
	<tr><td>
	<?php
		echo $this->Form->hidden('User.1.type', array(
			'value' => 'customer'	
		));
		echo $this->Form->input('User.1.first_name');
	?>
	</td><td>
	<?php
		echo $this->Form->input('User.1.last_name');
	?></td></tr><tr><td><?php
		echo $this->Form->input('User.1.phone');
	?></td><td><?php

		echo $this->Form->input('User.1.street');
	?></td></tr><tr><td><?php

		echo $this->Form->input('User.1.street_2');
	?></td><td><?php

		echo $this->Form->input('User.1.zip');
	?></td></tr><tr><td><?php

		echo $this->Form->input('User.1.email');
	?></td><td><?php

		echo $this->Form->input('User.1.password');

	?></td></tr>


</table>
	</fieldset><br><br>
							<?php
							echo $this->Form->submit(
							    'Submit',
							    array('class' => 'btn btn-success btn-lg', 'id' => 'btnContactUs', 'name' => 'btn2')
							);
							?><br><br><br><br><br><br><br><br><br><br>
</div>

