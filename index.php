<!DOCTYPE html>

<html>
<head>
<title>Spay Login</title>
</head>
<body bgcolor ="#FFFFCC">

<center>
<?php
echo"<html>\n";
echo"<head>\n";
echo"<title>Spay Login</title>\n";
echo"<head>\n";
echo"<body>\n";
echo"<form method='post' action='login.php'>\n";
echo"<table>\n";
echo "<img src='image/ปก.png'width='400px'>";
echo "<h1 align='center'>เข้าสู่ระบบ</h1>\n";
echo"<tr>\n";
echo"<td>Username :</td>\n";
echo"<td><input type='text' name='f_username' required></td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td>Password :</td>\n";
echo"<td><input type='password' name='f_password' required></td>\n";
echo"</tr>\n";
echo"<tr>\n";
echo"<td colspan='2' align='center'>\n";
$string =  '<input type="submit" button class="button button1" \'" value="LOGIN">'.
 '<input type="reset" button class="button button1" \'" value="RESETS">';
 echo $string; 
echo"</td>\n";
echo"</tr>\n";
echo"</table>\n";
echo"</form>\n";
echo"</body>\n";
echo"<html>\n";
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
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.5s;
  cursor: pointer;
}

.button1 {
  background-color: #FFFFCC; 
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