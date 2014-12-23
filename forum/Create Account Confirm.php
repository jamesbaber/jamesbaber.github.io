<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>RPi Services - Forums</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>
<body>

<div id="wrap">
	<div id="top">
		<h2> <a href="/index.html">Raspberry Pi Powered Web Services</a></h2>
	</div>
	<div id="content">
		<div id="left">
    		<h2><img src="resources/img/rpi_inside.gif" width=100 height=100></img> RPi Powered Services</h2>
			<H3>Account created succesfully.</H3>
			<Br>An email has been sent to you with a link to confirming your account.</Br>
			<Br>If you run into any issues please contact support.</Br>
		</div>
    <div id="right">
		<div class="box">
			<? include($_SERVER['DOCUMENT_ROOT'].'/sidebar.php') ?>
		</div>
		<Br>
		<div class="box">
			<p><h2>Register.</h2><Br>
			<form action="Create Account.php" method="post">
				<Br><input type="text" name="username" placeholder="Username" size=40 />
				<Br><input type="password" name="password" placeholder="Password" size=40 />
				<Br><input type="text" name="email" placeholder="Email" size=40 />
				<Br><input type="submit" id="registeraccount" value="Register" onclick="test()" />
			</form>
			<form action="mailto:stopmotionheaven@mail.com?Subject=Account%20Termination">
				<input type="submit" id="accounttermination" value="Terminate Account">
			</form></p>
		</div>
		<Br>
		<div class="box">
			<p><h2>Create Thread.</h2><Br>
			<form action="Create Thread.php" method="post">
				<Br><input type="text" name="thread" placeholder="Thread Name" size=40 />
				<Br><input type="text" name="username" placeholder="Username" value="<? echo $_COOKIE["RPiWebServicesForumUsername"]; ?>" size=40 />
				<Br><input type="password" name="password" placeholder="Password" value="<? echo $_COOKIE["RPiWebServicesForumPassword"]; ?>" size=40 />
				<Br><input type="submit" id="threadcreate" value="Create" onclick="test()" />
			</form></p>
		</div>
	</div>
	<div id="clear"></div>
	</div>
	<div id="footer">
		<p>Contact The Server Admin: <a href="mailto:stopmotionheaven@mail.com?Subject=Hello!" target="_top">stopmotionheaven@mail.com</a></p>
	</div>
</div>

</body>
</html>


