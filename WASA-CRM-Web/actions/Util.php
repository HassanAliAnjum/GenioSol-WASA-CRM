<?php
 require('../config/dbadapter.php');
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
    //put your code here
    public function getPriorityList()
    {
        $chk =new dbadapter();
        $chk->getConn();

        $query="select * from priority";
        $results = mysql_query($query);
  //      $output = [];
        while($row = mysql_fetch_array($results))
        {
//            $output =  $row['priority'];
            echo "<option value='normal'>{$row['priority']}</option>";
        }
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
    }
	
	function getGroupList()
    {
        $chk =new dbadapter();
        $chk->getConn();
        $query="select * from role";
        $results = mysql_query($query);
        while($row = mysql_fetch_array($results))
        {
	        echo "<option value={$row['role_id']}>{$row['role']}</option>";
        }
    }
	function getDesignationList()
    {
        $chk =new dbadapter();
        $chk->getConn();

        $query="select * from destination";
        $results = mysql_query($query);
        while($row = mysql_fetch_array($results))
        {
	        echo "<option value={$row['post_id']}>{$row['post']}</option>";
        }
    }
	function getSupervisorsList()
    {
        $chk =new dbadapter();
        $chk->getConn();

        $query="select name from user where supervisor_id=1";
        $results = mysql_query($query);
        while($row = mysql_fetch_array($results))
        {
	        echo "<option value={$row['post_id']}>{$row['post']}</option>";
        }
    }
}

?>
