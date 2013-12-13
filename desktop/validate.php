<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
  $_SESSION['user_id'] = $row['user_id'];  $_SESSION['user_id'] = $row['user_id'];  $_SESSION['user_id'] = $row['user_id'];  $_SESSION['user_id'] = $row['user_id'];  $_SESSION['user_id'] = $row['user_id'];  $_SESSION['user_id'] = $row['user_id'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	//Connect
	$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200213935', '74176', 'db200213935') or die("Could Not Connect:  "  . mysqli_error());

	$sql = "SELECT id FROM admins WHERE username = '$username' AND password = '$password'";
	
	$result = mysqli_query($conn, $sql) or die('Error querying database.');

	$count = mysqli_num_rows($result);

	if ($count == 1) {
	echo 'Logged in Successfully.';	
		while ($row = mysqli_fetch_array($result)) {
			
			session_start();
			
			  $_SESSION['user_id'] = $row['id'];	
		
		}
	}
	
	else {
	echo 'Invalid Login';
	}
	
	mysqli_close($conn);
	
	header('Location: registered_user.php');
?>
</body>
</html>