<?php
$con = mysql_connect("localhost","soar","passwd");
if(!con){
    die('Could not connect:' . mysql_error());
}
mysql_select_db("ss_user_man", $con);
//匹配port和passwd
//从post获得用户输入
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $inputedPort = $_POST["inputedPort"];
    $inputedPasswd = $_POST["inputedPasswd"];
    $result = mysql_query("SELECT id,port,passwd FROM portPasswd");
    while($row = mysql_fetch_array($result)){
        if($row["port"] == $inputedPort){
            if($row["passwd"] == $inputedPasswd){
                $state = "success";
                break;
            }
        }
    }
    if($state == "success"){
        echo "Sueecssfully Sign in<br/>";
    }else{
        echo "Faild!<br/>";
    }
}else{
    echo "Could not get datas from post<br/>";
}


?>

<html>
<body>
<p>Select a function</p>
<form action = "viewPortPasswdTable.php" method = "post">
<input type = "submit" value = "View the portPasswd table">
</form>
</body>
</html>
