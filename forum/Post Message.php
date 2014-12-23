<?php

$message     = $_POST["message"]; //Users reply got from the HTML form
$email       = $_POST["email"]; //Users email got from the HTML form
$username    = $_POST["username"]; //Users username
$password    = $_POST["password"]; //Users password (to be encrypted in the future)
$threadname  = $_POST["thread"]; //The name of the thread to post message to (this is a hidden form element)
$threadfile  = "resources/threads/" . $threadname . ".txt"; //File of the thread to write the message to

include "Security.php"; //Get the DB login details from an external file

$message = nl2br($message);
$message = str_replace("\n","",$message);
$message = str_replace("\r","",$message);

//Add encryption for the passwords
$password_unsecure = $password;
$password = hash('ripemd160', $password);

mysql_connect("$host", "$db_username", "$db_password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$username    = stripslashes($username); //Stripslash the username
$password    = stripslashes($password); //Stripslash the password
$username    = mysql_real_escape_string($username); //More functions to stop 'SQL Injection'
$password    = mysql_real_escape_string($password); //More functions to stop 'SQL Injection'
$sql         = "SELECT * FROM $tbl_name WHERE username='$username' and password='$password' and valid='1'"; //SQL query string
$result      = mysql_query($sql); //Raw SQL query results
$count       = mysql_num_rows($result); //Number of returned entries (1 or 0, 1+ should be impossible)

if($count==1){
	setcookie ("RPiWebServicesForumUsername", $username, time()+3600); //Create cookie for username (so the login boxes will be autofilled)
	setcookie ("RPiWebServicesForumPassword", $password_unsecure, time()+1800); //Create cookie for password  (so the login boxes will be autofilled)
	setcookie ("RPiWebServicesForumEmail", $email, time()+1800); //Create cookie for your email address  (so the login boxes will be autofilled)
	
	switch ($message)
	{
		case " ":
			echo "Invalid Message ' '";
			break;
		case "":
			echo "Invalid Message ''";
			break;
		default:
			$current = file_get_contents($threadfile); //Read old messages
			$current .= $email . "-#*#-" . $username . "-#*#-" . $message . "\n"; //Format new message and add it to the list of lines
			file_put_contents($threadfile, $current); //Put file contents back
			header('Location: View%20Thread.php?thread=' . $threadname); //Redirect to the forum thread
	}
}
else {
	echo "Wrong Username, Password or account not valid!";
}

?>