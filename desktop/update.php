<!-- home.html
	Alex Barbosa
	personal portfolio desktop
	This is my update page
-->	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200213935', '74176', 'db200213935') or die(mysqli_error());

	$username =  $_POST['user'];
	$id =  $_POST['id'];
	$email = $_POST['email'];

	
	if (is_numeric($id)) {
		$sql = "UPDATE admins SET username = '$user', email = '$email' WHERE id = $id";
		mysqli_query($conn, $sql) or die('Error updating database.');
		mysqli_close($conn);
  
		header('Location: registered_user.php');
	}
	?>
</body>
</html>