<?php include 'header.php'; ?>
	<div class="container">
		<h1>Add Articles Here</h1>
		<div class="row">
      <div class="col-md-8">
			<?php echo form_open_multipart('admin/store_data','class="form-horizontal"'); ?>
      <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
      <?= form_hidden('created', date('Y-m-d H:i:s')); ?>
    <fieldset>
      <?php
       echo form_input(
        [
        'name'=>'title','id'=>'textinput',
        'placeholder'=>'Add Title',
        'class'=>'form-control input-md',
        'value'=>set_value('title')
        ]
      );
       ?>  
        <div class="spacings">
            <?php echo form_error('title'); ?>
         </div>  
          <?php
       echo form_upload(
        [
        'name'=>'userfile','id'=>'textinput',
        'class'=>'form-control'
        ]
      );
       ?>  
        <div class="spacings">
            <?php if(isset($upload_error)){ echo $upload_error; } ?>
         </div>   
          <?php
       echo form_textarea(
        [
        'name'=>'feedback',
        'id'=>'textinput',
        'placeholder'=>'Add Feedback',
        'class'=>'form-control input-md',
        'value'=>set_value('feedback')
        ]
        );
       ?>
       <div class="spacings">
            <?php echo form_error('feedback'); ?>
         </div>
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
        'value'=>'submit Your Data'
        ]
        );
       ?>
      
    </fieldset>
    </form>
  </div>
		</div>
	</div>
<?php include 'footer.php'; ?>