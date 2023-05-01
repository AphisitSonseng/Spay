<?php
if (!isset($_SESSION["firstname"])) 
{
	echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
}
echo "<table width='100%' border='0'>\n";
echo "<tr>\n";
echo "<td valign='top' width='150'>\n";
echo "	<img src='./image/logo1.jpg' width='180' height='170'></td>\n";
echo "<td align='right' valign='top'>\n";
echo "  <img src='./image/banner1.jpg' width='100%' height='170'/></td>\n";
echo "</tr>\n";
echo "<tr bgcolor='#FFFFCC'>\n";
echo "<td><a href='./f_spay_home.php'>";
echo "		<img src='./image/home1.png' width='80'></a></td>\n";
echo "<td align='right'>";
echo		$_SESSION["firstname"] . " " . $_SESSION["lastname"] . "\n";
echo "  <a href='./logout.php'>";
echo "		<img src='./image/logout2.png' width='80'/></a></td>\n";
echo "</tr>\n";
echo "</table>\n";
?>
