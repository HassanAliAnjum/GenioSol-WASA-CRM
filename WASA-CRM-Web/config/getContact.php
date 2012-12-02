<?php
	require 'dbAdapter.php';

	$contact = $_GET['contact'];
	$chk =new dbadapter();
	$chk->getConn();
  
	$query="select * from user where contact_number='$contact'";
	$results = mysql_query($query);
  	$row = mysql_fetch_array($results);
	//SELECT ``contact_number`, `password`, `post_id`, `role_id`, `name`, `cnic`, `supervisor_id`, `division_id` FROM `user` WHERE 1
	$employeeData = array( 'name' => $row['name'],
							'contact_number' => $row['contact_number'],
							'CNIC' => $row['cnic'],
							'town_Name' => $row['division_id'],
							'role' => $row['role_id'],
							'designation' => $row['post_id'],
							'supervisors' => $row['supervisor_id'],
						);
	
	echo json_encode($employeeData);

?>