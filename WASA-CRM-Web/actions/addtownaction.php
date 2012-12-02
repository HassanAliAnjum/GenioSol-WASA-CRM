
<?php
 
 require('../config/dbAdapter.php');
 
 $chk =new dbadapter();
 $chk->getConn();

  $div= $_POST['town'];

 $query="INSERT INTO `division` (`division`) VALUES ('$div')";
 $results = mysql_query($query);
$isSuccess = false;
 if ($results > 0)
 {
	 $isSuccess = true;
 }
 header("Location:../admin/admin.php?isSuccess=$isSuccess");
?>