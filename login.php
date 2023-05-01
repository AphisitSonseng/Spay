<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");

$sql  = "SELECT firstname, lastname, user FROM user ";
$sql .= "WHERE user = '" .$_POST["f_username"]. "' AND " . 
			  "password = '" .$_POST["f_password"]."';";

$rs = $db_conn->query($sql)
	or die ("Query failed: " . $sql . "<br><br>");
if($rs->num_rows == 1) 
{
	$row = $rs->fetch_assoc();

	    $_SESSION["user"] = $row["user"];
		$_SESSION["firstname"] = $row["firstname"];
		$_SESSION["lastname"]  = $row["lastname"];
} 
else 
{
	echo "<font color='red'>Invalid username or password.</font>";
	echo "<meta http-equiv='Refresh' content='3;url=index.php'>";
	exit();
}	
 echo "<meta http-equiv='Refresh' content='0;url=f_spay_home.php'>";
?>