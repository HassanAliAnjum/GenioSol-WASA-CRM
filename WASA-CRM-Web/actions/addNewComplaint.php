
<?php
require '../config/Util.php';
require '../config/dbAdapter.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $complaintPriorityId = $_POST["complaintPriorty"];
    $complaintContactNo = $_POST["complaintContactNo"];
    $complaintCNIC = $_POST["complaintCNIC"];
    $complaintDivId = $_POST["complaintDivId"];
    $complaintAddress = $_POST["complaintAddress"];
    $complaintDesc = $_POST["complaintDescription"];
	$complaintName = $_POST["complaintName"];
	$complaintCategory = $_POST["complaintCategory"];

    //save to db.
	$util = new Util();
	$complaintId = $util->addComplaint($complaintPriorityId, $complaintContactNo, $complaintCNIC, $complaintDivId, $complaintAddress, $complaintDesc, $complaintName, $complaintCategory);
    
		header("Location:../complaints.php?cid=$complaintId");
?>
