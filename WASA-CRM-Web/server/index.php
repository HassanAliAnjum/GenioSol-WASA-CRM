<?php
require '../config/dbAdapter.php';
require '../config/Util.php';

$chk =new dbadapter();
$chk->getConn();
		
switch($_REQUEST["action"])
{
	case "login":
		$uName = $_REQUEST['user_name'];
		$pwd = $_REQUEST['password'];		

        $query="select user_id from user where contact_number='$uName' and password='$pwd'";
        $results = mysql_query($query);

        if($row = mysql_fetch_array($results))
        {
            echo $row['user_id'];
        }
		else
		{
			echo -1;
		}
		$chk->closedb();
		break;
	case "add_complaint":
		$priorityName = $_REQUEST['priority_name'];
		$divName = $_REQUEST['division_name'];
		$categoryName = $_REQUEST['category_name'];

		$contactNo = $_REQUEST['contact_no'];		
		$address = $_REQUEST['address'];
		$desc = $_REQUEST['description'];
		$name = $_REQUEST['user_name'];		

		$priorityRes = mysql_query("select priority_id from priority where priority='$priorityName'");
		$priorityId = 1;
		if($row = mysql_fetch_array($priorityRes))
		{
			$priorityId = $row['priority_id'];
		}
		
		$divisionRes = mysql_query("select division_id from division where division='$divName'");
		$divId = 1;
		if($row = mysql_fetch_array($divisionRes))
		{
			$divId = $row['division_id'];
		}
		
		$catRes = mysql_query("select category_id from category where category='$categoryName'");
		$categoryId = 1;
		if($row = mysql_fetch_array($catRes))
		{
			$categoryId = $row['category_id'];
		}
		$util = new Util();
		echo $util->addComplaint($priorityId, $contactNo, "", $divId, $address, $desc, $name, $categoryId);
		break;
	case "list":
		$chk =new dbadapter();
        $chk->getConn();

        $query="select * from priority";
        $results = mysql_query($query);

		$data = "";
        while($row = mysql_fetch_array($results))
        {
            $data = $data . $row['priority'] . ":";
        }
		
		echo substr($data, 0, strlen($data)-1) . "~";
		
		$query="select * from division";
        $results = mysql_query($query);

		$data = "";
        while($row = mysql_fetch_array($results))
        {
            $data = $data . $row['division'] . ":";
        }
		echo substr($data, 0, strlen($data)-1) . "~";

		$query="select * from category";
        $results = mysql_query($query);

		$data = "";
        while($row = mysql_fetch_array($results))
        {
            $data = $data . $row['category'] . ":";
        }
		echo substr($data, 0, strlen($data)-1);

		$chk->closedb();
		break;
}
?>