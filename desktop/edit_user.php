
<!--edit_user.php
	Alex Barbosa
	personal portfolio DESKTOP
	This is my edit page
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
		
		  $sql = "SELECT * FROM admins WHERE id = $_GET[id]";
  		  $result = mysqli_query($conn, $sql) or die('Error querying database.');
		  
		  while ($row = mysqli_fetch_array($result)) {
			$user =  $row['username'];
			$id =  $row['id'];
			$email = $row['email'];
  						
		} 

  mysqli_close($conn);
 
	?>
    <form method="post" action="update.php">
    
    <div>
	<label>Username</label>
	<input name="username" value="<?php echo $user; ?>" />
</div>
<div>
	<label>Email</label>
	<input name="email" value="<?php echo $email; ?>" />
</div>

	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="submit" value="Save" />
    
    </form>
    
</body>
</html>