<html>
<body>
<?php
$con = mysql_connect("localhost","soar","passwd");
if(!$con){
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
            $id = $row["id"];
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
    case "success":case "admin0"://登录成功
        echo "<p>Sueecssfully Sign in</p>";
        echo "<p>Select a function</p>";
        break;
    case "errport":
        echo "<p>This port is unavailable!</p>";
        echo "<p>Faild to Sign in</p>";
        break;
    case "errpasswd":
        echo "<p>Password not mach!</p>";
        echo "<p>Faild to Sign in</p>";
        break;
    default:
        break;
    }
    //提交表单
    echo "<form action = 'viewPortPasswdTable.php' method = 'post'>";
    $submitFlag = "";
    switch($state){
    case "admin0":
        //管理员0的查看所有portpasswd按钮
        echo "<form action = 'viewPortPasswdTable.php' method = 'post'>";
        echo "<input type = 'submit' value = 'View the portPasswd table'>";
        echo "<input type = 'hidden' name = 'submitFlag' value = 'allportpasswd'>";
        echo "</form>";
    case "success":
        //登录成功的用户的查看自己SS信息的按钮
        echo "<form action = 'viewPortPasswdTable.php' method = 'post'>";
        echo "<input type = 'submit' value = 'Get SS infomation'>";
        echo "<input type = 'hidden' name = 'submitFlag' value = ssinfomation>";
        echo "</form>";
        break;
    default:
        break;
    }
}else{
    echo "Could not get datas from post<br/>";
}


?>

</body>
</html>
