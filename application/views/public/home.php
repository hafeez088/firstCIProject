<?php include 'header.php'; ?>

<div class="container">
<h1>All Blog</h1>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Feedback</th>
      <th scope="col">Image</th>
      <th scope="col">Published On</th>
    </tr>
  </thead>
  <tbody>
  
  		<?php
  		if( count($data)): ?>

  		<?php
        $count = $this->uri->segment(3,0);
        foreach ($data as $publicdata) {
  		?>
  	<tr>
  	<td><?= ++$count; ?></td>
  	<td>
       <?= anchor("user/article/{$publicdata->cid}",$publicdata->name)?>
  	</td>
  	<td><?= $publicdata->feedback; ?></td>
  	<td><?= $publicdata->name; ?></td>
  	<td><?= date('d M y H:i:s', strtotime($publicdata->created)); ?></td>
	 
	</tr>
	      <?php } ?>
		  <?php else: ?>
	  	<tr>
	<td colspan="4">No Articles Found</td>
</tr>
	 <?php endif; ?>
	  </tbody>
	</table>
<?= $this->pagination->create_links(); ?>
</div>
<?php include 'footer.php'; ?>