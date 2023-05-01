<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
// $db_conn->query("BEGIN");
$sql  = "UPDATE payment SET  name = '".$_POST["name"]."', payment_type_id = '".$_POST["payment_type_id"]."', date = '".$_POST["date"]."' , description = '".$_POST["description"]."', amount = '".$_POST["amount"]."' ";
$sql .=	"WHERE	id = '".$_POST["pk_id"]."';";
 $rs1 = $db_conn->query($sql);
var_dump($rs1);
	if ($rs1 == FALSE) {
		echo "Error: ".$sql."<br/><br/>";
		echo $db_conn->error."<br/><br/>";
	exit();
	} else {
		echo "<font color='blue'>อัปเดทข้อมูลเสร็จสิ้น.</font><br/><br/>";  
		echo "Redirect to 'Insert Type' in 1 seconds.";
	}
 echo "<meta http-equiv='Refresh' content='1;url=f_spay_list.php'>\n";

?>