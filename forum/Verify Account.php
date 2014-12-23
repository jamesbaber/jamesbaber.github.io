<?

$emailhash = $_GET["hash"];
$username = $_GET["username"];

include "Security.php"; //Get the DB login details from an external file

mysql_connect("$host", "$db_username", "$db_password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$username    = stripslashes($username); //Stripslash the username
$$emailhash  = stripslashes($emailhash); //Stripslash the hash
$username    = mysql_real_escape_string($username); //More functions to stop 'SQL Injection'
$emailhash  = mysql_real_escape_string($emailhash); //More functions to stop 'SQL Injection'
$sql         = "UPDATE users SET valid='1' WHERE username='$username' and hash='$emailhash'"; //SQL query string
$result      = mysql_query($sql); //Raw SQL query results
$count       = mysql_num_rows($result); //Number of returned entries (1 or 0, 1+ should be impossible)

header('Location: /phpdevelopment/forum thread/View%20Thread.php?thread=' . $threadname); //Redirect to the forum thread

?>