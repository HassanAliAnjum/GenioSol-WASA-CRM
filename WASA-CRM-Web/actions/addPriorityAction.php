
<?php
 
 require('../config/dbAdapter.php');
 
 $chk =new dbadapter();
 $chk->getConn();

  $priority= $_POST['priority'];
  
 $query="INSERT INTO `priority`(`priority`) VALUES ('$priority')";
 $results = mysql_query($query);
 
$isSuccess = false;
 if ($results > 0)
 {
	 $isSuccess = true;
 }
 header("Location:../admin/admin.php?isSuccess=$isSuccess");
?>