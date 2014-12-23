
<!DOCTYPE html>
<HTML>
	<head>
	
		<title>Forums - RPi Server</title>
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<meta name="msapplication-starturl" content="/index.html" />
		<meta name="application-name" content="RPI Server" />
		<meta name="msapplication-navbutton-color" content="#00FF00" />
		<script>
			var _prum = [['id', '51f901d5abe53d1237000000'], ['mark', 'firstbyte', (new Date()).getTime()]];
			(function() {
				var s = document.getElementsByTagName('script')[0], p = document.createElement('script');
				p.async = 'async';
				p.src = '//rum-static.pingdom.net/prum.min.js';
				s.parentNode.insertBefore(p, s);
			})();
		</script>
		
		<style>
			table  {
				border-collapse:collapse;
			}

			table, td, th {
				border:6px solid #DBDBDB;
				vertical-align:top;
				padding: 10px;
				background-color: #F7F7F7;
			}
		</style>
		
	</head>
	<body style="background-image:url(/images/bg.jpg)">
	
		<center>
			<font color="white" face="Arial">
			<br/><br/><br/><br/><br/><br/><br/><br/>
			<h1>Forums</h1>
			<P></font><? $currentthread = $_GET['thread']; ?><? include("Echo Posts.php"); ?></P>
			
			<font color="white" face="Arial">
			<A NAME="postreply">
			<Br><form action="Post Message.php" method="post">
				<Br>Username: <Br><input type="text" name="username" size=80 placeholder="<? echo $_COOKIE["RPiWebServicesForumUsername"]; ?>" value="<? echo $_COOKIE["RPiWebServicesForumUsername"]; ?>" />
				<Br>Password: <Br><input type="password" name="password" size=80 placeholder="<? echo $_COOKIE["RPiWebServicesForumPassword"]; ?>" value="<? echo $_COOKIE["RPiWebServicesForumPassword"]; ?>" />
				<Br>Email: <Br><input type="text" name="email" size=80 placeholder="<? echo $_COOKIE["RPiWebServicesForumEmail"]; ?>" value="<? echo $_COOKIE["RPiWebServicesForumEmail"]; ?>" />
				<Br>Reply:<Br><textarea rows="8" cols="61" name="message" ></textarea>
				<? echo '<input type="hidden" name="thread" value="' . $_GET['thread'] . '" />'; ?>
				<Br><input type="submit" value="    Post    " onclick="test()" />
			</form></p>
			</font>
		</center>
		
	</body>
</HTML>