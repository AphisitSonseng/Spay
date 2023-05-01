<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
$utcDateTime = new DateTime('now', new DateTimeZone('Asia/bangkok'));
echo $utcDateTime->format('Y-m-d H:i:s');
$sql  = "INSERT INTO payment_type (id, name, description, is_delete, user,last_update) ";
$sql .= "VALUES ('" .$_POST["f_id"]. "', ";
$sql .=					"'" .$_POST["f_name"]. "', ";
$sql .=					"'" .$_POST["f_description"]. "', ";
$sql .=					"'" .$_POST["f_isactive"]. "', ";
$sql .=					"'" .$_SESSION["user"]. "', ";
$sql .=					"'" .$utcDateTime->format('Y-m-d H:i:s'). "')";
if ($db_conn->query($sql) == FALSE) {
	echo "Error: " .$sql. "<br>" .$db_conn->error;
	$db_conn->close();
} else {
	//echo $sql;
	echo "<font color='blue'>Insert successfuly.</font><br/><br/>";  
	echo "Redirect to 'Insert Type' in 1 seconds.";
	$db_conn->close();
}
echo "<meta http-equiv='Refresh' content='1;url=f_spay_type.php'>";
?>