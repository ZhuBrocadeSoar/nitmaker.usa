<?php
$con = mysql_connect("localhost","soar","passwd");
if(!$con){
    die('Could not connect:' . mysql_error());
}

mysql_select_db("portPasswd", $con);

$result = mysql_query("SELECT * FROM portPasswd");

echo "<table border='1'>
<tr>
<th>port</th>
<th>passwd</th>
</tr>"
while($row = mysql_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['port'] . "</td>";
    echo "<td>" . $row['passwd'] . "</td>";
    echo "</tr>";
}
echo "</table>";

phpinfo();
?>
