<?php include 'header.php'; ?>
	<div class="container">
		<h1>Welcome to Admin Panel</h1>
      <div class="row">
      <div class="col-md-6">
        <?php if( $success = $this->session->flashdata('feedback')) { ?>
          <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $success; ?></strong>
        </div> 
        <?php } ?>
                
      </div>
      <div class="col-md-6">
        <a href="<?= base_url('admin/add_articles'); ?>" class="btn btn-secondary pull-right" style="float:right">Add Articles</a>

      </div>
    </div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Feedback</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php

    if(count($data)){
     
     $count = $this->uri->segment(3,0);
    	foreach ($data as $bdata) {
     ?>
    
    <tr class="table-active">
      <th scope="row"><?php echo ++$count; ?></th>
      <td><?= $bdata->name ?></td>
      <td><?= $bdata->feedback ?></td>
      <td><?= $bdata->name ?></td>
      <td>
        <div class="row">
          <div class="col-md-2">
             <?= anchor("admin/edit_data/{$bdata->cid}",'edit',['class'=>'btn btn-primary']); ?>
          </div>
            <div class="col-md-2">
              <?= 
               form_open('admin/delete_articles'),
               form_hidden('delete_id',$bdata->cid),
               form_submit(['name'=>'submit','value'=>'Delete', 'class'=>'btn btn-danger', 'onclick'=>'return confirm()']),
               form_close();
              ?>
            </div>
        </div>
      </td>
    </tr>
    <?php
	     }
     }else{
     	?>
     	<tr>
     		<td colspan="5">No Aricles Found</td>
     	</tr>
    <?php
     }
  	?>
  </tbody>
</table>
<div>
 <?php $config['anchor_class'] = 'class="number" '; ?>
  <?= $this->pagination->create_links(); ?>
</div>
  	</div>

<?php include 'footer.php'; ?>