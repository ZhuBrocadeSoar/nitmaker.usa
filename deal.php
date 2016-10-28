<html>
<body>
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
    //根据用户输入的登录信息查询数据库
    $result = mysql_query("SELECT * FROM portPasswd WHERE port = $inputedPort");
    if($row = mysql_fetch_array($result)){//port 匹配
        if($row["passwd"] == $inputedPasswd){//passwd 匹配
            $state = "success";
            $id = row["id"];
            if($row["adminLimit"] == 0){//管理员权限检查
                $state = "admin0";
            }
        }else{
            $state = "errpasswd";
        }
    }else{
        $state = "errport";
    }
    switch($state){
    case "success":case "admin0":
        echo "<p>Sueecssfully Sign in</p>";
        echo "<p>Select a function</p>";
        break;
    default:
        echo "<p>Faild to Sign in</p>";
        break;
    }
    echo "<form action = 'viewPortPasswdTable.php' method = 'post'>";
    switch($state){
    case "success":
        echo "<input type 'submit' value = 'Get SS infomation'>";
    case "admin0":
        echo "<input type = 'submit' value = 'View the portPasswd table'>";
        break;
    default:
        break;
    }
    echo "<input type = 'hidden' name = 'state' value = '$state'>";
    echo "<input type = 'hidden' name = 'id' value = $id >";
    echo "</form>";
}else{
    echo "Could not get datas from post<br/>";
}


?>

</body>
</html>
