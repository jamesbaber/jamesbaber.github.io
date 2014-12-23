<?

$currentthread = $_GET['thread'];

if (file_exists("resources/threads/" . $currentthread . ".txt")==0) {
    header( 'Location: /phpdevelopment/forum thread/index.php' );
}

echo "<font color='white' face='Arial'><H1>Welcome to thread '" . $currentthread . "'.</H1></font>";


$threadfile = "resources/threads/" . $currentthread . ".txt";
$lines      = file($threadfile);
echo '<table border="1" width=650>';
foreach ($lines as $line_num => $line) {
    list($email, $username, $message) = explode("-#*#-", $line);
    echo '<tr>';
    echo '<td width=150 height=130><center><img src="http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '"></img><Br><font color="grey">Provided by Gravitar</font><Br><font size=2>' . $username . '<Br>' . $email . '</font></center></td>';
    echo '<td>' . $message . '</td>';
    echo '</tr>';
    echo "<br>";
}
echo '</table>';

?>