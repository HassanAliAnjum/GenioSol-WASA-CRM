<?php
	require '../config/dbAdapter.php';
	
	$name = $_POST['addEmployeeName'];
	$contact = $_POST['addEmployeeNumber'];
	$cnic = $_POST['addEmployeeCnic'];
	$town = $_POST['addEmployeeTown'];
	$role = $_POST['addEmployeeGroup'];
	$designationn =$_POST['addEmployeeDesignation'];
	$supervisor = $_POST['addEmployeeSupervisor'];

	$chk =new dbadapter();
	$chk->getConn();
	
	$query = "INSERT INTO `user`(`contact_number`, `password`, `post_id`, `role_id`, `name`, `cnic`, `supervisor_id`, `division_id`) VALUES ('$contact','123','$designationn','$role','$name','$cnic','$supervisor','$town')";

	$result = mysql_query($query);

	header('Location:../admin/admin.php');

?>