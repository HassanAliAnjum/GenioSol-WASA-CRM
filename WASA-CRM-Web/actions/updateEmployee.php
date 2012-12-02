<?php
	require '../config/dbAdapter.php';
	
	$name = $_POST['addEmployeeNameUp'];
	$contact = $_POST['addEmployeeNumberUp'];
	$cnic = $_POST['addEmployeeCnicUp'];
	$town = $_POST['addEmployeeTownUp'];
	$role = $_POST['addEmployeeGroupUp'];
	$designationn =$_POST['addEmployeeDesignationUp'];
	$supervisor = $_POST['addEmployeeSupervisorUp'];
	$contact_=$_POST['u_contact'];

	$chk =new dbadapter();
	$chk->getConn();
	
		$query = "UPDATE `user` SET `contact_number`='$contact',`password`='123',`post_id`='$designationn',`role_id`='$role',`name`='$name',`cnic`='$cnic',`supervisor_id`='$supervisor',`division_id`='$town' WHERE `contact_number`='$contact_'";
	
	mysql_query($query);

	header('Location:../admin/admin.php');

?>