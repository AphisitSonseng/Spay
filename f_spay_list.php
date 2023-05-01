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
echo "<h1 align='center'>รายการใช้จ่าย</h1>\n";
 $string =  '<input type="button" button class="button button1" onclick="window.location.href=\'f_spay_addlist.php\'" value="เพิ่มรายการ">'.
 '<input type="button" button class="button button1" onclick="window.location.href=\'f_spay_deletelist.php\'" value="รายการที่ลบ">';
 echo $string; 
?>
</center>
</td>
</tr>

<center>
<?php 
$kw='';
$q = (int)(isset($_POST['q']))?$_POST['q'] : 0;
if ($q > 0) {
    $kw .= " AND p.payment_type_id='$q' ";
} else {
    $kw = "";
}
$searchtext = $_POST['searchtext'];
if($searchtext!=''){
	$kw .= " AND p.name LIKE '%" . $searchtext . "%' ";
}
$date = $_POST['date'];
if($date!=''){
	$kw .= " AND p.date='$date' ";
}
echo "<form method='post' action='f_spay_list.php'>\n";
echo"<td><input type='text' name='searchtext' value='".$searchtext."'></td>\n";
echo"<td>";
echo "<select name='q' id='q' value='".$q."'>\n"; 
echo "<option value='0'>ทั้งหมด</option>\n"; 
  $sql = "SELECT payment_type.id,payment_type.name FROM payment_type JOIN user ON payment_type.user = user.user join payment on payment.payment_type_id = payment_type.id  WHERE payment.user = '". $_SESSION["user"] . "'and payment.is_delete != 1 GROUP BY payment_type.id,payment_type.name  ORDER BY name ASC\n"; 
  $rs = $db_conn->query($sql); 
  while ($row1 = $rs->fetch_array()) {  

echo "<option value='".$row1['id']."' ". ($row1['id'] == $q ?? 0 ? "selected='selected'" : "") .">".$row1['name']."</option>\n"; } 
echo "</select>";
echo "</td>\n";
echo"<td><input type='date' name='date' value='".$date."'></td>\n";
echo "<td colspan='8'><input type='submit' value='ค้นหา'></td>\n";
echo "</form>\n";
echo "<script>\n";
echo "document.getElementByID('q').value='$q'";
echo "</script>\n";

?>
</center>

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
$sql .=	"FROM payment p left join payment_type t on p.payment_type_id = t.id where p.is_delete != 1 and p.user = '". $_SESSION["user"] ."' ".$kw ;
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
		//edit
		echo "<a href='f_spay_updatelist.php?id=".$row["id"]."'/>";
		echo "<img src='./image/edit.png' height='20'/></a>";
		//delete
		echo "<a href='spay_deletelist.php?id=".$row["id"]."'/>";
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