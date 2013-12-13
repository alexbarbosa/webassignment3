<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" href="styles.css">

<body>

		<div id="navbar">

					

						<ul class="navigationbar">
							<li><a href="home.html">Home</a></li>
							<li><a href="aboutme.html">About me</a></li>
							<li><a href="projects.html">Projects</a></li>
							<li><a href="services.html">Services</a></li>
							<li><a href="contact.html">Contact</a></li>
                            <li><a href="businesscontact.htm">Business Contact</a></li>

						</ul>
				</div>
<?php
	
	session_start();
	
	if (empty($_SESSION['user_id'])) {
	header('Location: businesscontact.htm');
}

else {
	//1. Write our sql command to get the list of subscribers
	$sql = "SELECT * FROM admins;";
	
	//2. Connect to our db
	$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200213935', '74176', 'db200213935') or
		die(mysqli_error());
		
		
		
		
	//3. execute our query & store the results in a variable
	$result = mysqli_query($conn, $sql);
	
	//4. create our table and header row with html tags
	echo '<table border="1"><tr><th>User</th><th>Email</th><th>Edit</th><th>Delete</th></tr>';
	
	//5. loop through the results from our query and output them 1 at a time to the page
	//<tr> creates a new row
	//<td> creates a new column
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr><td>' . $row['username'] . '</td> . <td>' . $row['email'] . '</td>
			<td><a href="edit_user.php?id=' . $row['id'] . '">Edit</a></td>';
		echo '<td><a onclick="return confirm(\'are you sure you want to delete?\');"href="delete_user.php?id=' . $row['id'] . '">Delete</a></td></tr>';
			
	}
	
	//6. close the table
	echo '</table>';
	
	//7. disconnect
	mysqli_close($conn);
}	
	
?>
<a id="logout" href="logout.php">Logout</a>

</body>
</html>