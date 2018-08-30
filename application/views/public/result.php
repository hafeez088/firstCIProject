<?php include 'header.php'; ?>

<div class="container">
<h1>Search Result</h1>
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
  		if( $articles ): ?>

  		<?php
      $i = 0;
        foreach ($articles as $publicdata) {
  		?>
  	<tr>
  	<td><?= ++$i; ?></td>
  	<td><?= $publicdata->name; ?></td>
  	<td><?= $publicdata->feedback; ?></td>
  	<td><?= $publicdata->name; ?></td>
  	<td><?= $publicdata->name; ?></td>
	 
	</tr>
	      <?php } ?>
		  <?php else: ?>
	  	<tr>
	<td colspan="4">No Articles Found</td>
</tr>
	 <?php endif; ?>
	  </tbody>
	</table>
</div>
<?php include 'footer.php'; ?>