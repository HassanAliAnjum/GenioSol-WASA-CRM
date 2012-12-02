
<?php
 
 require('../config/dbAdapter.php');
 
 $chk =new dbadapter();
 $chk->getConn();

  $cat= $_POST['category'];
  
 $query="INSERT INTO `category`(`category`) VALUES ('$cat')";
 $results = mysql_query($query);
$isSuccess = false;
 if ($results > 0)
 {
	 $isSuccess = true;
 }

 header("Location:../admin/admin.php?isSuccess=$isSuccess"); 
?>