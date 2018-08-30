<?php include 'header.php'; ?>
<div class="container">
<h4>
	<?= $article->name; ?>
</h4>
<span>
	<?= date('d M y H:i:s', strtotime($article->created)); ?>
</span>
<hr>
<?php
if( ! is_null($article->image_path)) {
?>
<img src="<?= $article->image_path; ?>" />

<?php } ?>
<p>
	<?= $article->feedback; ?>
</p>
</div>
<?php include 'footer.php'; ?>