
<?php
 
 require('../config/dbAdapter.php');
 
 $chk =new dbadapter();
 $chk->getConn();

 $desig = $_POST['designation'];
 $query="INSERT INTO `destination`(`post`) VALUES ('$desig')";
 $results = mysql_query($query);
$isSuccess = false;
 if ($results > 0)
 {
	 $isSuccess = true;
 }
 header("Location:../admin/admin.php?isSuccess=$isSuccess");
?>