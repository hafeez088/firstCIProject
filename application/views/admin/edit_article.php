<?php include 'header.php'; ?>
	<div class="container">
		<h1>Edit Date Here</h1>
		<div class="row">
      <div class="col-md-8">
			<?php echo form_open("admin/update_article/{$results->cid}",'class="form-horizontal"'); ?>
      <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
    <fieldset>
      <?php
       echo form_input(
        [
        'name'=>'title','id'=>'textinput',
        'placeholder'=>'Add Title',
        'class'=>'form-control input-md',
        'value'=>set_value('title',$results->name)
        ]
      );
       ?>  
        <div class="spacings">
            <?php echo form_error('title'); ?>
         </div>   
          <?php
       echo form_textarea(
        [
        'name'=>'feedback',
        'id'=>'textinput',
        'placeholder'=>'Add Feedback',
        'class'=>'form-control input-md',
        'value'=>set_value('feedback',$results->feedback)
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