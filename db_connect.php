<?php

$db_host = "localhost";         // DB Server name
$db_user = "spayadmin";
$db_password = "123456";
$db_name = "spay";          // DB name

// create DB Connection
$db_conn = new mysqli($db_host,$db_user,$db_password,$db_name);

if ($db_conn->connect_error) 
{
    die ("DB Connection Failed !! " . $db_conn->connect_error);
}
else 
{
    //echo "DB Connection Successful.<br><br>";
}

?>