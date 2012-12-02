<?php

class dbadapter
{
	public $con;
	
	public function getConn()
	{
		global $con;
		$con = mysql_connect("localhost","root","");
	    mysql_select_db("wasa_crm", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
			return false;
		}
		else
		{
			 return $con; 
		}	
	  
	}
	
	
	public function closedb()
	{
		global $con;
		mysql_close($con);
	}

}
?>