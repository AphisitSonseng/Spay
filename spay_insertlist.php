<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
$sql  = "INSERT INTO payment (id, name, payment_type_id, date, description, user,amount) ";
$sql .= "VALUES ('" .$_POST["f_id"]. "', ";
$sql .=					"'" .$_POST["f_name"]. "', ";
$sql .=					"'" .$_POST["f_pament_type_id"]. "', ";
$sql .=					"'" .$_POST["f_date"]. "', ";
$sql .=					"'" .$_POST["f_description"]. "', ";
$sql .=					"'" .$_SESSION["user"]. "', ";
$sql .=					"'" .$_POST["f_amount"]. "')";
if ($db_conn->query($sql) == FALSE) {
	echo "Error: " .$sql. "<br>" .$db_conn->error;
	$db_conn->close();
} else {
	echo "<font color='blue'>Insert successfuly.</font><br/><br/>";  
	echo "Redirect to 'Insert List' in 1 seconds.";
	$db_conn->close();
}
echo "<meta http-equiv='Refresh' content='1;url=f_spay_list.php'>";
?>