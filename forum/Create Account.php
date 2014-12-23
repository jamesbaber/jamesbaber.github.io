<?php

$email       = $_POST["email"]; //Users email gathered from the HTML form
$username    = $_POST["username"]; //Users username
$password    = $_POST["password"]; //Users password (to be encrypted in the future)

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Success";
}
else {
	echo "Thats not a real email. Silly Sausage!";
	echo $email_domain_black_list_url;
	exit;
}

$email_parts = explode('@', $email);
$email_name = $email_parts[0];
$email_domain = "@" . $email_parts[1];

if ($email_domain=="mailinator.com") {
	echo "Success";
}
else {
	echo "Thats not a real email. Silly Sausage! MAILINATOR ISNT ALLOWED";
	exit;
}

include "Security.php"; //Get the DB login details from an external file

//Add encryption for the passwords
$password_unsecure = $password;
$password = hash('ripemd160', $password);

mysql_connect("$host", "$db_username", "$db_password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$accounthash = hash('ripemd160', $username . "verifymyaccount");

$username    = stripslashes($username); //Stripslash the username
$password    = stripslashes($password); //Stripslash the password
$username    = mysql_real_escape_string($username); //More functions to stop 'SQL Injection'
$password    = mysql_real_escape_string($password); //More functions to stop 'SQL Injection'
$sql         = "INSERT INTO $tbl_name (`username`, `password`, `email`, `valid`, `hash`) VALUES ('$username', '$password', '$email', '0', '$accounthash');"; //SQL insert string
//$result      = mysql_query($sql); //Raw SQL query results

echo "Sending Mail";

require_once('PHPMail/class.phpmailer.php'); //Get the mail handler
$mail = new PHPMailer; //Create new mail

//Set params for new mail
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'rpi.powered.web.services@gmail.com';
$mail->Password = 'debianpi';
$mail->SMTPSecure = 'tls';
$mail->From = 'rpi.powered.web.services@gmail.com';
$mail->FromName = 'No-Reply At Raspberry Pi Powered Web Services';
$mail->AddAddress($email, 'End User');
$mail->IsHTML(true);
$mail->Subject = 'JamesRPIWeb: Account Confirmation.';
$mail->Body = 'I see you have signed up for Raspberry Pi Powered Web Services forums. <A href="http://jamesrpiweb.no-ip.org:50/phpdevelopment/forum%20thread/Verify%20Account.php?hash=' . $accounthash . '&username=' . $username . '">Click this link to activate your account</A>';
$mail->AltBody = 'I see you have signed up for Raspberry Pi Powered Web Services forums. Copy and paste this into your browser address bar to active your account "http://jamesrpiweb.no-ip.org:50/phpdevelopment/forum%20thread/Verify%20Account.php?hash=' . $accounthash . '&username= . $username . "';

//Send mail
if(!$mail->Send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	exit;
}

header('Location: /phpdevelopment/forum thread/Create%20Account%20Confirm.php'); //Redirect to the confirmation page

?>