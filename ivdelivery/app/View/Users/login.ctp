   <style>

    #btnContactUs {
        background-color: #26BBA4 !important;
        border-color: #23ab96 !important;
        color: #fff;
    }

    table {
        border-top: 0px !important;
    }
    body {
          color: #fff !important;
          /*background-image: url('<?php echo $this->webroot; ?>/img/img7.jpg') !important;*/
          background-image: url('http://foodswoop.com/img/login.jpg') !important;
          background-size: 100% 100% !important;
          background-repeat: no-repeat !important;

    }
    legend {
        color: #fff !important;

    }
</style>

<div class="row">
    <div class="col-md-8">
<div class="users form">
    
<?php //echo $this->Session->flash('auth'); ?>

                            <?php echo $this->Form->create('User', array(
                                'inputDefaults' => array(
                                    'class' => 'form-control',
                                ),  array('controller' => 'Users', 'action'=>'login', 'btn2')
                            )); ?>


    <fieldset>
        <h3>
            <?php echo __('Please enter your details'); ?>
        </h3>
        <table class="table"><tr><td><br>
        <?php 
	echo $this->Form->input('User.1.email'); ?>
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
            <br><br><br>
            <h3>
            Not a member?</h3>
            <?php echo $this->Html->link(__('Sign Up'), array('controller' => 'Users', 'action' => 'signup'), array('class' => 'btn btn-success btn-lg')); ?>

<?php                           echo $this->Form->end(); ?><br><br>

            

</div>
</div>
</div>
