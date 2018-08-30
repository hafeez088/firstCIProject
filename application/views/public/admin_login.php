<?php include 'header.php'; ?>

<div class="middlePage" style="width:900px;">
<div class="page-header">
  <h1 class="logo"> <small>Welcome to our Login Panel!</small></h1>
</div>

<div class="panel panel-info">
 
  <div class="panel-body">
  
  <div class="row">
  
<div class="col-md-5" >
<a href="#"><img class="sicon" src="http://lipis.github.io/bootstrap-social/assets/img/bootstrap-social.png" /></a><br/>

</div>

    <div class="col-md-7 form_data">
    	<?php if( $error = $this->session->flashdata('login_failed')); { ?>

    	<div class="alert alert-dismissible alert-warning">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <p class="mb-0"><?= $error; ?></p>
	</div>
    <?php } ?>

    	<?php echo form_open('login/admin_login','class="form-horizontal"'); ?>
    	
		<fieldset>
		  <?php
		   echo form_input(
		  	[
		  	'name'=>'username','id'=>'textinput',
		  	'placeholder'=>'Enter User Name',
		  	'class'=>'form-control input-md',
		  	'value'=>set_value('username')
		    ]
		  );
		   ?>  
		    <div class="spacings">
            <?php echo form_error('username',"<p class='text-warning'>","</p>"); ?>
         </div>	  
		  <div class="spacing">
              <?php
		   echo form_checkbox(
		  	[
		  	'name'=>'checkboxes',
		  	'id'=>'checkboxes-0',
		  	'value'=>'1'
		    ]
		    );
		   ?>   
          <small> Remember me</small>
         </div>
          <?php
		   echo form_password(
		  	[
		  	'name'=>'password',
		  	'id'=>'textinput',
		  	'placeholder'=>'Enter password',
		  	'class'=>'form-control input-md',
		  	'value'=>set_value('password')
		    ]
		    );
		   ?>
		   <div class="spacings">
            <?php echo form_error('password'); ?>
         </div>
		  <div class="spacing"><a href="#"><small> Forgot Password?</small></a><br/></div>
		   <?php
		   echo form_reset(
		  	[
		  	'name'=>'reset',
		  	'id'=>'singlebutton',
		  	'class'=>'btn btn-danger btn-sm pull-right',
		  	'value'=>'Reset'
		    ]
		    );
		   ?>
		  <?php
		   echo form_submit(
		  	[
		  	'name'=>'submit',
		  	'id'=>'singlebutton',
		  	'class'=>'btn btn-info btn-sm pull-right',
		  	'value'=>'submit'
		    ]
		    );
		   ?>
		  
		</fieldset>
		</form>
		</div>	    
		</div>
		    
		</div>
		</div>

		</div>

<?php include 'footer.php'; ?>