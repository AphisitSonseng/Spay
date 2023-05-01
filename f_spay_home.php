<!DOCTYPE html>
<html>
<head>
<title>Spay Home</title>

<?php
session_save_path("./session");
session_start();
require_once("db_connect.php");
require_once("header.php");
$sql  = "SELECT YEAR(date) AS year, MONTH(date) AS Month , SUM(amount) AS Amount FROM payment where is_delete != 1 and user = '". $_SESSION["user"] ."'GROUP BY YEAR(date),MONTH(date)";
$rs = $db_conn->query($sql)
?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month','Amount'],
       <?php
         while($row = mysqli_fetch_array($rs))
         {
           echo "['".$row["year"]."-".$row["Month"]."',".$row["Amount"]."],";
         }
       ?>
        ]);

        var options = {
          title: 'สรุปค่าใช้จ่ายในแต่ละเดือน',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script> 

</head>
<body bgcolor ="#FFFFCC">

<tr>
 <td>
 <center>
<?php 
 $string =  '<input type="button" button class="button button1" onclick="window.location.href=\'f_spay_list.php\'" value="รายการ">'.//ปุ่มInsert
 '<input type="button" button class="button button1" onclick="window.location.href=\'f_spay_type.php\'" value="หมวดหมู่">';
 echo $string; 
?>
</center>
</td>
</tr>

<center>
<?php
echo "<h1 align='center'>สรุปการใช้จ่าย</h1>\n";
echo "<table>\n";
$sql  = "SELECT sum(amount) as total from payment where payment.user = '". $_SESSION["user"] . "'and payment.is_delete != 1 ";
$rs = $db_conn->query($sql)
	or die ("Error: " . $sql . "<br/><br/>");

  if($rs->num_rows > 0) {
    $i = 1;
  while($row = $rs->fetch_assoc()) {
echo "<tr bgcolor='#FFCC99'>\n";
echo "<th style='font-size: 30px !important'>การใช้จ่ายรวมทั้งสิ้น</th>\n";
echo "<th style='font-size: 30px !important;color:#FF6600;'>".$row["total"]."</th>\n";
echo "<th style='font-size: 30px !important'>บาท</th>\n";
}

} 
else 
{
  echo "<tr>\n";
  echo "<td colspan='8'>Data not found.</td>\n";
  echo "</tr>\n";
}	
echo "<table>\n";
?>
</center>


<center>
 <div id="donutchart" style="width: 900px; height: 500px;"></div>
</center>






<center>
<?php 
echo "<table>\n";
echo "<tr bgcolor='#FFCC00'>\n";
echo "<th></th>\n";
echo "<th>หมวดหมู่</th>\n";
echo "<th>รายการ</th>\n";
echo "<th>ผลรวมแต่ละหมวด(บาท)</th>\n";

$sql  = "SELECT count(*) as Count,sum(p.amount) as Total,pt.name as name FROM `payment` p join payment_type pt on p.payment_type_id = pt.id where p.is_delete != 1 and p.user = '". $_SESSION["user"] ."'"." GROUP BY pt.name ";

$rs = $db_conn->query($sql)
	or die ("Error: " . $sql . "<br/><br/>");

  if($rs->num_rows > 0) {
    $i = 1;
  while($row = $rs->fetch_assoc()) {
		echo "<tr>\n";
    echo "<td>".$i."</td>\n";
		echo "<td>".$row["name"]."</td>\n";
		echo "<td style='text-align:center'>".$row["Count"]."</td>\n";
		echo "<td style='text-align:right'>".$row["Total"]."</td>\n";

    $i++;
  }

  } 
  else 
  {
    echo "<tr>\n";
    echo "<td colspan='8'>Data not found.</td>\n";
    echo "</tr>\n";
  }	

echo "</table>\n";
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
  transition-duration: 0.5s;
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