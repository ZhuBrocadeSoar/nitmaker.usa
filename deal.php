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
    $result = mysql_query("SELECT * FROM portPasswd WHERE port = $inputedPort");
    while($row = mysql_fetch_array($result)){
        if($row["passwd"] == $inputedPasswd){
            $state = "success";
            break;
        }
    }
    if($state == "success"){
        echo "<p>Sueecssfully Sign in</p>";
        echo "<p>Select a function</p>";
        echo "<form action = 'viewPortPasswdTable.php' method = 'post'>";
        echo "<input type = 'submit' value = 'View the portPasswd table'>";
        echo "<input type = 'hidden' name = 'state' value = '$state'>";
        echo "</form>";
    }else{
        echo "Faild!<br/>";
    }
}else{
    echo "Could not get datas from post<br/>";
}


?>

<p>Select a function</p>
<form action = "viewPortPasswdTable.php" method = "post">
<input type = "submit" value = "View the portPasswd table">
</form>
</body>
</html>
