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
            if($row["adminLimit"] == 0){
                $state = "admin0";
            }
            break;
        }
    }
    switch($state){
    case "success":case "admin0";
        echo "<p>Sueecssfully Sign in</p>";
        echo "<p>Select a function</p>";
        break;
    default:
        echo "<p>Faild to Sign in</p>";
        break;
    }
    switch($state){
    case "admin0":
        echo "<form action = 'viewPortPasswdTable.php' method = 'post'>";
        echo "<input type = 'submit' value = 'View the portPasswd table'>";
        echo "<input type = 'hidden' name = 'state' value = '$state'>";
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
