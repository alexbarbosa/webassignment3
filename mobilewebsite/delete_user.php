<!-- delete_user.php
	Alex Barbosa
	personal portfolio mobile
	This is delete page
-->	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//connect to the db
$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200213935', '74176', 'db200213935') or die('Connect error');

//grab the id from the url
$id = $_GET['id'];

//write the sql
$sql = "DELETE FROM admins WHERE id = $id";

//run the deletion
mysqli_query($conn, $sql);

//disconnect
mysqli_close($conn);

//redirect the user
header('location: registered_user.php');

?>
</body>
</html>