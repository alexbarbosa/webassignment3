<!-- registered_table.php
	Alex Barbosa
	personal portfolio mobile
	This is my table page
-->	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Alex Barbosa Portfolio</title>
		<link rel="stylesheet" href="themes/mobiletheme.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" />
        <link rel="stylesheet" href="styles.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.18/jquery.min.js"></script>

</head>

<body>

    <div data-role="page" id="Table" data-theme="a">

		<div id="navbar" data-role="navbar" data-theme="a">
			<ul>
				<li class="navlink"><a href="#index">Home</a></li>
				<li class="navlink"><a href="#About">About Me</a></li>
				<li class="navlink"><a href="#Contact">Contact Me</a></li>
                <li class="navlink"><a href="#Myprojects">Projects</a></li>
               	<li class="navlink"><a href="#Services">Services</a></li>
                <li class="navlink"><a href="#Contacts" class="ui-btn-active ui-state-persist">Contacts</a></li>
			</ul>
		</div>
        </div>
        
        <div id="content" data-role="content">
<?php
	
	session_start();
	
	if (empty($_SESSION['user_id'])) {
	header('Location: index.html');
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

</div>
<div id="footer" data-role="footer" data-theme="a"><h4>Copyright 2013</h4></div>
        </div>
</body>
</html>