
<!-- validation.php
	Alex Barbosa
	personal portfolio mobile
	This is my validation
-->	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.18/jquery.min.js"></script>
</head>

<body>

    <div data-role="page" id="Validation" data-theme="a">

		<div id="navbar" data-role="navbar" data-theme="a">
			<ul>
				<li class="navlink"><a href="#Index">Home</a></li>
				<li class="navlink"><a href="#About">About Me</a></li>
				<li class="navlink"><a href="#Contact">Contact Me</a></li>
                <li class="navlink"><a href="#Myprojects">Projects</a></li>
               	<li class="navlink"><a href="#Services">Services</a></li>
                <li class="navlink"><a href="#Contacts" class="ui-btn-active ui-state-persist">Contacts</a></li>
			</ul>
		</div>
        
        <div id="content" data-role="content">
<?php

//connect to the db
$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200213935', '74176', 'db200213935') or die('Error connecting to MySQL server');

//capture the login entered; hash the password so we can compare to the database*/
$username = $_POST['username'];
$password = sha1($_POST['password']);

//Set up the SQL and query the database
$sql = "SELECT id FROM admins WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql) or die('Error querying database.');
$count=mysqli_num_rows($result);

/*Check if any rows were returned that matched the username and password*/
if ($count > 1) {
	echo 'Logged in Successfully.';	
	
	while ($row = mysqli_fetch_array($result)) {
	
		//access the existing session created by the web server
		session_start(); 
		
		//store the user id in the session object
		$_SESSION['username'] = $row['username'];
		
		//redirect the user
		header('Location: registered_table.php');
	}
}
else {
				print '<script type="text/javascript">'; 
				print 'alert("Invalid login!")'; 
				print '</script>'; 
}

mysqli_close($conn);

?>
</div>
</body>
</html>