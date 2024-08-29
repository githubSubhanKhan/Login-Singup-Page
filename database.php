<?php
$db_sever = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "mydatabases";
$conn = "";

try {
    $conn = mysqli_connect($db_sever, $db_user, $db_password, $db_name);
}
catch(mysqli_sql_exception) {
    echo "Could Not Connect";
}
?>