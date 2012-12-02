<?php

	require("dbAdapter.php");
	$town = $_GET['town'];

	$chk =new dbadapter();
	$chk->getConn();

	$query="select name,user_id from user where post_id=1 AND division_id={$town}";
	$results = mysql_query($query);
	while($row = mysql_fetch_array($results))
	{
		echo "<option value={$row['user_id']}>{$row['name']}</option>";
	}
?>