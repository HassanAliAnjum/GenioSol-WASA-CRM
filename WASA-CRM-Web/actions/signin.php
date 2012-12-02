<?php
 
 require('../config/dbAdapter.php');
 
 $chk =new dbadapter();
 $chk->getConn();

  $user = $_POST['contact_num'];
  $pwd = $_POST['password'];
 // die($user);
	
 $query="SELECT name,role_id FROM `user` WHERE `contact_number`={$user} AND `password`={$pwd}";
 $results = mysql_query($query);
 $row = mysql_fetch_array($results);

 if ($row['role_id'] == 1)
 {
	header("Location:../complaints.php?isOperator=true");
 }
 else if ($row['role_id']==2)
 {
	 header("Location:../admin/admin.php");
 }
?>