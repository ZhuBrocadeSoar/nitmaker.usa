<?php
$con = mysql_connect("localhost","soar","passwd");
if(!$con){
    die('Could not connect:' . mysql_error());
}

mysql_select_db("ss_user_man", $con);

switch($_POST["flag"]){
case "allportpasswd":
    if($_POST["state"] == "admin0"){
        $result = mysql_query("SELECT * FROM portPasswd");
        //绘制表头
        echo "<table border='1'>
            <tr>
            <th>id</th>
            <th>port</th>
            <th>passwd</th>
            <th>adminLimit</th>
            <th>cdkey</th>
            </tr>";
while($row = mysql_fetch_array($result)){
    //打印记录
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['port'] . "</td>";
    echo "<td>" . $row['passwd'] . "</td>";
    echo "<td>" . $row['adminLimit'] . "</td>";
    echo "<td>" . $row['cdkey'] . "</td>";
    echo "</tr>";
}
echo "</table>";
    }
    break;
case "ssinfomation":
    $result = mysql_query("SELECT id,port,passwd FROM portPasswd WHERE id = $id");
    $row = mysql_fetch_array($result);
    echo "<table border = '1'>";
    echo "<tr>";
    echo "<th>Server name or IPv4<br/>服务器域名或地址</th>";
    echo "<td>" . "104.160.32.39" . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Server port<br/>服务器端口</th>";
    echo "<td>" . $row['port'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Password<br/>密码</th>";
    echo "<td>" . $row['passwd'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Method<br/>加密方法</th>";
    echo "<td>" . "AES-256-CFB" . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Local port<br/>本地端口</th>";
    echo "<td>" . "1080(Not care,use default value)<br/>(本地端口可以使用默认值)" . "</td>";
    echo "</tr>";
    echo "</table>";
    break;
}
?>
