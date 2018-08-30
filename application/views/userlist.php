<!DOCTYPE html>
<html>
<head>
	<title>user data</title>
</head>
<body>
<table>
	<tr>
		<th>fisrt name</th>
		<th>last name</th>
	</tr>
	<?php 

   foreach ($users as $user):
   
	?>
	<tr>
		<td><?= $user->username ?></td>
        <td><?= $user->password ?></td>

	</tr>
<?php endforeach; ?>

</table>
</body>
</html>