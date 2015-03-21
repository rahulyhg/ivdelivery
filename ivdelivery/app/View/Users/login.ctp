
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php 
	echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
			<?php echo $this->Form->submit('Sign in', array(
				'div' => false,
				'class' => 'btn'
			)); ?>
</div>
