   <style>

    #btnContactUs {
        background-color: #26BBA4 !important;
        border-color: #23ab96 !important;
        color: #fff;
    }

    table {
        border-top: 0px !important;
    }
</style>

<div class="row">
    <div class="col-md-8">
<div class="users form">
    <br>
<?php //echo $this->Session->flash('auth'); ?>

                            <?php echo $this->Form->create('User', array(
                                'inputDefaults' => array(
                                    'class' => 'form-control',
                                    'novalidate' => true
                                ),  array('controller' => 'Users', 'action'=>'login', 'btn2')
                            )); ?>


    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <table class="table"><tr><td><br>
        <?php 
	echo $this->Form->input('User.1.username'); ?>
    <br>


    <?php
        echo $this->Form->input('User.1.password');
    ?></td></tr></table>
    </fieldset>
			<?php echo $this->Form->submit('Sign in', array(
				'div' => false,
				'class' => 'btn btn-success btn-lg',
                'name' => 'btn2'
			)); ?>
            <br><br><br><br>
            <legend>
            Not a member?</legend><br>
            <?php echo $this->Html->link(__('Sign Up'), array('controller' => 'Users', 'action' => 'signup'), array('class' => 'btn btn-success btn-lg')); ?><br><br>

            <br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>
