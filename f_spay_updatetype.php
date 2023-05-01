<!DOCTYPE html>

<html>
<head>
<title>Spay UpdateType</title>
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
echo "<h1 align='center'>อัปเดทหมวดหมู่</h1>\n";
$sql = "SELECT id, name, description, is_delete , last_update FROM payment_type  WHERE id = '".$_GET["id"]."' ;";
$rs = $db_conn->query($sql)
	or die ("Error: ".$sql."<br/><br/>");
	if ($rs->num_rows == 0) {
		echo "Invalid id " . $_GET["id"];
		$db_conn->close();
		exit(0);
	}
$row = $rs->fetch_assoc();
echo "<form method='post' action='spay_updatetype.php'>\n";
echo "<input type='hidden' id='pk_id'  name='pk_id' value='".$row["id"]."'/>\n";
echo "<table>";
echo "<tr><td align='right'>ชื่อ : </td>\n";
echo "    <td><input type='text' name='name' value='".$row["name"]."'/></td></tr>\n";
echo "<tr><td align='right'>รายละเอียด : </td>\n";
echo "    <td><textarea name='description' >".$row["description"]."</textarea></td></tr>\n";
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