<?php
session_save_path("./session"); 
session_start(); 
session_destroy();
echo "<font color='red'>Logout</font>\n";
echo "<meta http-equiv='Refresh' content='2;url=index.php'>";
?>