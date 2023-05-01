<?php
require_once("db_connect.php");

if(isset($_GET["id"])) {
    $sql  = "UPDATE payment  SET is_delete = '1' ";
    $sql .= " WHERE id = '".$_GET["id"]."'";
	echo "<font color='blue'>ย้ายไปในรายการที่ลบเสร็จสิ้น</font><br/><br/>";  
	echo "Redirect to 'Insert List' in 1 seconds.";
	if ($db_conn->query($sql) == FALSE) {
		echo "Error: " .$sql. "<br/><br/>\n";
		echo $db_conn->error;
		$db_conn->close();
		exit(0);
	} else {
		echo "<font color='blue' Delete successfully.</font>\n";
	}
} else if (isset($_POST["f_chk"])) {
	$id = $_POST["f_chk"];
	for($i=0; $i<count($id); $i++) {
	$sql  = "UPDATE payment SET is_delete = '1' ";
	$sql .= "WHERE id = '".$id[$i]."';";	
		echo $sql . "<br/>";
		if ($db_conn->query($sql) == FALSE) {
			echo "Error: ".$sql."<br/><br/>".$db_conn->error;
			$db_conn->close();
			exit(0);
		} 
	}
} 
$db_conn->close();
echo "<meta http-equiv='Refresh' content='1;url=f_spay_list.php'>\n";
?>