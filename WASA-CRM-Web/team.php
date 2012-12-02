<?php
require("header.php");
require ("config/dbAdapter.php");
$chk =new dbadapter();
$chk->getConn();
	
 $query="SELECT name, contact_number, div.division from user, division div where user.division_id = div.division_id";
 $results = mysql_query($query);

while ($row = mysql_fetch_array($results))
{
?>
<div>
<div class="name">Name: <? $row['name']?></div>
<div class="post">Post: <? $row['name']?></div>
<div class="contact"></div>
<?php
}
require("footer.php");
?>