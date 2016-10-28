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
    //绘制表头
    echo "<table border = '1'>
        <td>
        <th>Server name or IPv4<br/>服务器域名或地址</th>
        <th>Server port<br/>服务器端口</th>
        <th>Password<br/>密码</th>
        <th>Method<br/>加密方法</th>
        <th>Local port<br/>本地端口</th>
        </td>";
echo "<td>";
echo "<tr>" . "104.160.32.39" . "</tr>";
echo "<tr>" . $row['port'] . "</tr>";
echo "<tr>" . $row['passwd'] . "</tr>";
echo "<tr>" . "AES-256-CFB" . "</tr>";
echo "<tr>" . "1080(Not care,use default value)<br/>(本地端口可以使用默认值)" . "</tr>";
echo "</td>";
echo "</table>";
break;
}
?>
