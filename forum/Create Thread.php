<?php

$threadname  = $_POST["thread"];
$threadfile  = "resources/threads/" . $threadname . ".txt";
$username    = $_POST["username"];
$password    = $_POST["password"];

include "Security.php"; //Get the DB login details from an external file

//Add encryption for the passwords
$password_unsecure = $password;
$password = hash('ripemd160', $password);

mysql_connect("$db_host", "$db_username", "$db_password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$username    = stripslashes($username);
$password    = stripslashes($password);
$username    = mysql_real_escape_string($username);
$password    = mysql_real_escape_string($password);
$sql         = "SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result      = mysql_query($sql);
$count       = mysql_num_rows($result);

if($count==1){

	setcookie ("RPiWebServicesForumUsername", $username, time()+3600);
	setcookie ("RPiWebServicesForumPassword", $password_unsecure, time()+1800);
	setcookie ("RPiWebServicesForumEmail", $email, time()+3600);
	
	$threadfilehandle = fopen($threadfile, 'w') or die("Couldn't Create Thread");
	fclose($threadfilehandle);
	
	$file = "threadlist.txt";
	$current = file_get_contents($file);
	$current .= $threadname . "\n";
	file_put_contents($file, $current);

}

header( 'Location: /phpdevelopment/forum thread/index.php' ) ;

?>