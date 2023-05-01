<!DOCTYPE html>

<html>
<head>
<title>Spay Type</title>
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
echo "<h1 align='center'>รายการหมวดหมู่</h1>\n";
 $string =  '<input type="button" button class="button button1" onclick="window.location.href=\'f_spay_addtype.php\'" value="เพิ่มหมวดหมู่">'.
 '<input type="button" button class="button button1" onclick="window.location.href=\'f_spay_deletetype.php\'" value="หมวดหมู่ที่ลบ">';
 echo $string; 
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
echo "<th>หมวด</th>\n";
echo "<th>รายละเอียด</th>\n";
echo "<th>เวลาอัปล่าสุด</th>\n";
echo "<th></th>\n";
echo "<th></th>\n";
echo "</tr>\n";
$sql  = "SELECT id, name, description, is_delete, last_update ";
$sql .=	"FROM payment_type where is_delete != 1 and user = '". $_SESSION["user"] ."' ";
$sql .=	"ORDER BY id, name";
$rs = $db_conn->query($sql)
	or die ("Error: " . $sql . "<br/><br/>");
if($rs->num_rows > 0) {
	$i = 1;
	while($row = $rs->fetch_assoc()) {
		echo "<tr>\n";
    echo "<td>".$i."</td>\n";
		echo "<td>".$row["name"]."</td>\n";
		echo "<td>".$row["description"]."</td>\n";
		echo "<td>".$row["last_update"]."</td>\n";
		echo "<td>";
    if ($row["status"] == "D") {
			echo "<font color='red'>Deleted</font>";
		}
		echo "</td>\n";	
		echo "<td align='center'>";
		//edit
		echo "<a href='f_spay_updatetype.php?id=".$row["id"]."'/>";
		echo "<img src='./image/edit.png' height='20'/></a>";
		//delete
		echo "<a href='spay_deletetype.php?id=".$row["id"]."'/>";
		echo "<img src='./image/delete.png' height='20'/></a></td>\n";
		echo "</tr>\n";
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

<style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #FFCC00;
}

.button1:hover {
  background-color: #FFCC00;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #FF6600;
}

.button2:hover {
  background-color: #FF6600;
  color: white;
}

</style>