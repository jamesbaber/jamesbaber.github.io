<?php

$threadfile = "threadlist.txt";
$lines = file($threadfile);

echo "<table border='1' width=650 height=100>";

foreach($lines as $line_num => $line)
{
echo '<td width=150 height=20><A href="View Thread.php?thread=' . $line . '">' . $line . '</A><Br></td>';
	echo '<tr>';
    echo "<br>";
}

echo "</table>";

?>