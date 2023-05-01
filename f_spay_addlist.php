<!DOCTYPE html>

<html>
<head>
<title>Spay AddList</title>
</head>
<body bgcolor ="#FFFFCC">

<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
require_once("header.php");
echo "<form method='post' action='spay_insertlist.php'>\n";
$sql  = "SELECT id, name, description, is_delete, last_update, user ";
$sql .=	"FROM payment_type where is_delete != 1 and user = '". $_SESSION["user"] ."' ";
$sql .=	"ORDER BY id, name";
$rs = $db_conn->query($sql)
	or die ("Error: " . $sql . "<br/><br/>");

?>

<center>
<?php
echo "<h1 align='center'>เพิ่มรายการ</h1>\n";
echo"<table>\n";
echo"<tr>\n";
echo"<td>ชื่อ :</td>\n";
echo"<td><input type='text' name='f_name'></td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td>หมวดหมู่ :</td>\n";
echo"<td>";
echo "<select name='f_pament_type_id' >\n";
if($rs->num_rows > 0) {
	$i = 1;
	while($row = $rs->fetch_assoc()) {
        echo "<option value='".$row["id"]."'>".$row["name"]."</option>\n";    
		$i++;
	}
} 
echo "</select>\n";
echo "</td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td>ราคา :</td>\n";
echo"<td><input type='number' name='f_amount' required></td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td>วันที่ :</td>\n";
echo"<td><input type='date' name='f_date' required></td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td>รายละเอียด :</td>\n";
echo"<td><textarea name='f_description' rows='4' cols='30'></textarea></td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td colspan='2' align='center'>\n";
$string =  '<input type="submit" button class="button button1" onclick="window.location.href=\'" value="SAVE">'.
'<input type="reset" button class="button button2" onclick="window.location.href=\'" value="RESET">';
echo $string;
echo"</td>\n";
echo"</tr>\n";
echo"</table>\n";
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