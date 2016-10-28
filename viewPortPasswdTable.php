<?php
if($_POST['state'] == 'success'){
$con = mysql_connect("localhost","soar","passwd");
if(!$con){
    die('Could not connect:' . mysql_error());
}

mysql_select_db("ss_user_man", $con);

$result = mysql_query("SELECT * FROM portPasswd");

echo "<table border='1'>
<tr>
<th>id</th>
<th>port</th>
<th>passwd</th>
<th>adminLimit</th>
<th>cdkey</th>
</tr>";
$count = 0;
while($row = mysql_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['port'] . "</td>";
    echo "<td>" . $row['passwd'] . "</td>";
    echo "<td>" . $row['adminLimit'] . "</td>";
    echo "<td>" . $row['cdkey'] . "</td>";
    echo "</tr>";
    $count = $count + 1;
}
echo "</table>";
}else{
    echo "<p>Permition denied!</p>";
}
?>
