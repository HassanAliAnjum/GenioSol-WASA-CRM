<?php
require 'config/dbAdapter.php' ;
$adapter  = new dbadapter();
$adapter->getConn();

$query = "Select description, d.division from complaint, division d Where complaint.division_id = d.division_id ORDER BY create_date LIMIT 5";

$results = mysql_query($query);

	while ($row = mysql_fetch_array($results))
	{
		echo $row['description'].' in '.$row['division'].'<br/><hr/>';
	}

?>