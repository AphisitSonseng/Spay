<!DOCTYPE html>

<html>
<head>
<title>Spay AddType</title>
</head>
<body bgcolor ="#FFFFCC">

<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
require_once("header.php");
?>

<center>
<?php
echo "<h1 align='center'>อัปเดทรายการ</h1>\n";
$sql = "SELECT id, name, payment_type_id, date, description, amount, user FROM payment  WHERE id = '".$_GET["id"]."'  ;";
$rs = $db_conn->query($sql)
	or die ("Error: ".$sql."<br/><br/>");
	if ($rs->num_rows == 0) {
		echo "Invalid id " . $_GET["id"];
		$db_conn->close();
		exit(0);
	}
$row = $rs->fetch_assoc();
$sql2  = "SELECT id, name, description, is_delete, last_update ";
$sql2 .=	"FROM payment_type where is_delete != 1 and user = '". $_SESSION["user"] ."'  ";
$sql2 .=	"ORDER BY id, name";
$rs2 = $db_conn->query($sql2)
	or die ("Error: " . $sql2 . "<br/><br/>");
echo "<form method='post' action='spay_updatelist.php'>\n";
echo "<input type='hidden' id='pk_id' name='pk_id' value='".$row["id"]."'/>\n";
echo "<table>";
echo "<tr><td align='right'>ชื่อ : </td>\n";
echo "    <td><input type='text' name='name' value='".$row["name"]."'/></td></tr>\n";
echo "<tr><td align='right'>หมวดหมู่ : </td>\n";
echo"<td>";
echo "<select name='payment_type_id'>\n";
if($rs2->num_rows > 0) {
	$i = 1;
	while($row2 = $rs2->fetch_assoc()) {
        echo "<option value='".$row2["id"]."' ".($row["payment_type_id"] == $row2["id"] ? "selected='selected'" : "").">".$row2["name"]."</option>\n";
		$i++;
	}
} 
echo "</select>\n";
echo "</td>\n";
echo"</tr>\n";
echo "<tr><td align='right'>จำนวน : </td>\n";
echo "    <td><input type='number' name='amount' value='".$row["amount"]."'/></td></tr>\n";
echo "<tr><td align='right'>เวลา : </td>\n";
echo "    <td><input type='date' name='date' value='".$row["date"]."'/></td></tr>\n";
echo "<tr><td align='right'>รายละเอียด : </td>\n";
echo "    <td><textarea name='description'>".$row["description"]."</textarea></td></tr>\n";
echo "<tr><td colspan='2' align='center'>\n";
$string =  '<input type="submit" button class="button button1" onclick="window.location.href=\" value="SAVE">'.
 '<input type="RESET" button class="button button2" onclick="window.location.href=\" value="RESET">';
 echo $string;
 echo "	</td></tr>\n";
echo "</table>";
echo "</form>"
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
  border: 2px solid #99CC33;
}

.button1:hover {
  background-color: #99CC33;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #FFCC00;
}

.button2:hover {
  background-color: #FFCC00;
  color: white;
}

</style>