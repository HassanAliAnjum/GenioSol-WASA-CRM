<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author Agent
 */
class Util
{
    public function getPriorityList()
    {
        $chk =new dbadapter();
        $chk->getConn();

        $query="select * from priority";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results))
        {
            echo "<option value='{$row['priority_id']}'>{$row['priority']}</option>";
        }
		$chk->closedb();
    }
	
	function getTownList()
    {
        $chk =new dbadapter();
        $chk->getConn();

        $query="select * from division";
        $results = mysql_query($query);
        while($row = mysql_fetch_array($results))
        {
         echo "<option value={$row['division_id']}>{$row['division']}</option>";
        }
		$chk->closedb();
    }
	
	function getCategoryList()
    {
        $chk =new dbadapter();
        $chk->getConn();

        $query="select * from category";
        $results = mysql_query($query);
        while($row = mysql_fetch_array($results))
        {
         echo "<option value={$row['category_id']}>{$row['category']}</option>";
        }
		$chk->closedb();
    }

	function addComplaint($priorityId, $contactNo, $cnic, $divisionId, $address, $desc, $name, $categoryId)
 	{
	  $chk = new dbadapter();
	  $chk->getConn();
	  //create status itself.
	  $statusQuery = "SELECT * FROM `status` WHERE `status`='New'";
	  $statusResult = mysql_query($statusQuery);
	  $statusRow = mysql_fetch_array($statusResult);
	  $statusId = $statusRow['status_id'];
	  $createDate = date('y-m-d h:m:s');

	  $query = "INSERT INTO `complaint`( `contact_number`, `name`, `cnic_number`, `division_id`, `address`, `description`, `status_id`, `priority_id`, `category_id`, `create_date`) VALUES ('$contactNo','$name','$cnic',$divisionId,'$address','$desc',$statusId,$priorityId,$categoryId,'$createDate')";

	  $result = mysql_query($query);

	  if ($result > 0)
	  {
		   $complaintResult = mysql_query("SELECT `complaint_id` FROM `complaint` WHERE `contact_number`='$contactNo' AND `create_date`='$createDate'");
		   $complaintRow = mysql_fetch_array($complaintResult);
		   $complaintId = $complaintRow['complaint_id'];
   
		   $chk->closedb();
   
		   return $complaintId;
	  }
	  $chk->closedb();
	  return -1;
	}
}

?>
