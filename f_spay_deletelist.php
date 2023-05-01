<!DOCTYPE html>

<html>
<head>
<title>Spay List</title>
</head>
<body bgcolor ="#FFFFCC">

<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
require_once("header.php");
?>

<tr>
 <td>
 <center>
<?php 
echo "<h1 align='center'>รายการที่ลบ</h1>\n";
 ?>
</center>
</td>
</tr>

<center>
<?php 
echo "<script language='JavaScript'>\n";
echo "function checkAll(source) { \n";
echo "	checkboxes = document.getElementsByName('f_chk[]'); \n";
echo "	for (var i=0, n=checkboxes.length; i<n; i++) { \n";
echo "		checkboxes[i].checked = source.checked; \n";
echo "	} \n";
echo "} \n";
echo "</script>\n";
echo "<form method='post' action=''>\n";
echo "<table>\n";
echo "<tr bgcolor='#FFCC00'>\n";
echo "<th></th>\n";
echo "<th>ชื่อ</th>\n";
echo "<th>หมวดหมู่</th>\n";
echo "<th>ราคา</th>\n";
echo "<th>วันที่</th>\n";
echo "<th>รายละเอียด</th>\n";
echo "<th></th>\n";
echo "<th></th>\n";
echo "</tr>\n";
$sql  = "SELECT p.id, p.name, p.payment_type_id, p.date, p.description, p.amount ,t.name as payment_type_name ";
$sql .=	"FROM payment p left join payment_type t on p.payment_type_id = t.id where p.is_delete != 0 and p.user = '". $_SESSION["user"] ."'";
$sql .=	"ORDER BY p.id, p.name";
$rs = $db_conn->query($sql)
	or die ("Error: " . $sql . "<br/><br/>");
if($rs->num_rows > 0) {
	$i = 1;
	while($row = $rs->fetch_assoc()) {
		echo "<tr>\n";
    echo "<td>".$i."</td>\n";
		echo "<td>".$row["name"]."</td>\n";
        echo "<td>".$row["payment_type_name"]."</td>\n";
        echo "<td>".$row["amount"]."</td>\n";
        echo "<td>".$row["date"]."</td>\n";
		echo "<td>".$row["description"]."</td>\n";
		echo "<td>";
    if ($row["is_delelest"] == "D") {
			echo "<font color='red'>Deleted</font>";
		}
		echo "</td>\n";	
		echo "<td align='center'>";
		echo "<a href='spay_impdeletelist.php?id=".$row["id"]."'/>";
		echo "<img src='./image/import.png' height='20'/></a>";   
		$i++;
	}
	echo "<tr>\n";

	echo "</tr>\n";
} 
else 
{
	echo "<tr>\n";
	echo "<td colspan='8'>Data not found.</td>\n";
	echo "</tr>\n";
}		
?>
</center>

</body>
</html>


