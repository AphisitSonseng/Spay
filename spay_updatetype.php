<?php
require_once("db_connect.php");
$utcDateTime = new DateTime('now', new DateTimeZone('Asia/bangkok'));
//$db_conn->query("BEGIN");
$sql  = "UPDATE payment_type SET  name = '".$_POST["name"]."', description = '".$_POST["description"]."', is_delete = '".$_POST["is_delete"]."' , last_update = '".$utcDateTime->format("Y-m-d H:i:s")."' ";
$sql .=	"WHERE	id = '".$_POST["pk_id"]."';";
$rs1 = $db_conn->query($sql);
	if ($rs1 == FALSE) {
		echo "Error: ".$sql."<br/><br/>";
		echo $db_conn->error."<br/><br/>";	
	exit();
	} else {
		echo "<font color='blue'>อัปเดทข้อมูลเสร็จสิ้น.</font><br/><br/>";  
	echo "Redirect to 'Insert Type' in 1 seconds.";	
	}
 echo "<meta http-equiv='Refresh' content='1;url=f_spay_type.php'>\n";

?>