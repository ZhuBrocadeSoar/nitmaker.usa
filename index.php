<?php
$con = mysql_connect("localhost","soar","passwd");
if(!$con){
    die('Could not connect:' . mysql_error());
}
phpinfo();
?>
