<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Citizen Reporting System</title>
<link rel="stylesheet" type="text/css" href="../styles/style.css"/>

<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function populateSupervisors(town)
{
	var town_id = town.options[town.selectedIndex].value;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
			xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{

			document.getElementById('addEmployeeSupervisor').innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","../config/popSupervisor.php?town="+town_id,true);
	xmlhttp.send();
}

function populateSupervisorsUp(town)
{
	var town_id = town.options[town.selectedIndex].value;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
			xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{

			document.getElementById('addEmployeeSupervisorUp').innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","../config/popSupervisor.php?town="+town_id,true);
	xmlhttp.send();
}

function searchContact()
{
	var contact = document.getElementById('empContact').value;
		
		
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
			xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var data=JSON.parse(xmlhttp.responseText);
			document.getElementById('addEmployeeTownUp').value=data.town_Name;
			populateSupervisorsUp(document.getElementById('addEmployeeTownUp'));
			
			
			document.getElementById('addEmployeeNameUp').value=data.name;
			document.getElementById('addEmployeeNumberUp').value=data.contact_number;
			document.getElementById('addEmployeeCnicUp').value=data.CNIC;
			document.getElementById('addEmployeeGroupUp').value=data.role;
			document.getElementById('addEmployeeDesignationUp').value=data.designation;
			
			document.getElementById('addEmployeeSupervisorUp').value=data.supervisors;
			document.getElementById('u_contact').value=contact;
			
		
		}
	  }	  
	xmlhttp.open("GET","../config/getContact.php?contact="+contact,true);
	xmlhttp.send();
}
</script>
</head>

<div id="mainContent">
<div><a href="admin.php"><img src="../image/logo.png" alt="Citizen Reporting System"/></a></div>
<?php
 require ('../actions/Util.php');
 $util = new Util ();
 ?>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<?php
if(isset($_GET['isSuccess']))
{
	if($_GET['isSuccess'] == true)
	{
?>
		<div class="successMessage">You request processed successfully.</div>
<?php
	}
	else
	{
?>
		<div class="failureMessage">You request was unable to complete.</div>
<?php
	}
}
?>

<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Add Employee</li>
    <li class="TabbedPanelsTab" tabindex="0">Update Employee</li>
    <li class="TabbedPanelsTab" tabindex="0">Add Designation</li>
    <li class="TabbedPanelsTab" tabindex="0">Add Priority</li>
    <li class="TabbedPanelsTab" tabindex="0">Add Complaint Category</li>
    <li class="TabbedPanelsTab" tabindex="0">Add Town</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
    	
        
        <form action="../actions/addEmployee.php" method="post">
        	<table>
            	<tr>
                <td>Name : </td>
                <td><input type="text" id="addEmployeeName" name="addEmployeeName"></td>
                <td></td>
                </tr>
                <tr>
                <td>Contact No. : </td>
                <td><input type="text" id="addEmployeeNumber" name="addEmployeeNumber"></td>
                <td></td>
                </tr>
                <tr>
                <td>CNIC : </td>
                <td><input type="text" id="addEmployeeCnic" name="addEmployeeCnic"></td>
                <td></td>
                </tr>
                <tr>
                <td>Town Name : </td>
                <td>
                	<select name="addEmployeeTown" id="addEmployeeTown" onchange="populateSupervisors(this)">
                    <option selected="selected" style="font-style:italic">Select Town</option>

                    <?php
					$util->getTownList();	
					?>
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td>Group : </td>
                <td>
                	<select name="addEmployeeGroup" id="addEmployeeGroup">
                     <option selected="selected" style="font-style:italic">Select Group</option>

                    <?php
					$util->getGroupList();	
					?>
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td>Designation : </td>
                <td>
                	<select name="addEmployeeDesignation" id="addEmployeeDesignation">
                    <option selected="selected" style="font-style:italic">Select Designation</option>

                    <?php
					$util->getDesignationList();	
					?>
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td>Supervisor : </td>
                <td>
                	<select name="addEmployeeSupervisor" id="addEmployeeSupervisor">
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td>
                	<input type="submit" value="Add Employee">
                </td>
                <td></td>
                </tr>
            </table>
        </form>

    </div>
    <div class="TabbedPanelsContent">
    	<table>
            	<tr>
                <td>Contact : </td>
                <td><input type="text" id="empContact"></td>
                <td><input type="button" value="Search" onclick="searchContact()" /></td>
                </tr>
        </table>
        <hr/>
       <form action="../actions/updateEmployee.php" method="post">
        	<table>
            
            	<tr>
                <td>Name : </td>
                <td><input type="text" id="addEmployeeNameUp" name="addEmployeeNameUp"></td>
                <td><input type="hidden" id="u_contact" name="u_contact" ></td>
                </tr>
                <tr>
                <td>Contact No. : </td>
                <td><input type="text" id="addEmployeeNumberUp" name="addEmployeeNumberUp"></td>
                <td></td>
                </tr>
                <tr>
                <td>CNIC : </td>
                <td><input type="text" id="addEmployeeCnicUp" name="addEmployeeCnicUp"></td>
                <td></td>
                </tr>
                <tr>
                <td>Town Name : </td>
                <td>
                	<select name="addEmployeeTownUp" id="addEmployeeTownUp" onchange="populateSupervisors(this)">
                    <option selected="selected" style="font-style:italic">Select Town</option>
					<?php
					$util->getTownList();	
					?>
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td>Group : </td>
                <td>
                	<select name="addEmployeeGroupUp" id="addEmployeeGroupUp">
                    <option selected="selected" style="font-style:italic">Select Group</option>

                    <?php
					$util->getGroupList();	
					?>
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td>Designation : </td>
                <td>
                	<select name="addEmployeeDesignationUp" id="addEmployeeDesignationUp">
                    <option selected="selected" style="font-style:italic">Select Designation</option>

                    <?php
					$util->getDesignationList();	
					?>
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td>Supervisor : </td>
                <td>
                	<select name="addEmployeeSupervisorUp" id="addEmployeeSupervisorUp">
                    </select>
                </td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td>
                	<input type="submit" value="Update Employee">
                </td>
                <td></td>
                </tr>
            </table>
      </form>

    </div>
    <div class="TabbedPanelsContent">
    	<form action="../actions/addDesignationAction.php" method="post">
        	<table>
            	<tr>
                <td>Designation Name : </td>
                <td><input type="text" id="addDesignationName"></td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td>
                	<input type="submit">
                </td>
                <td></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="TabbedPanelsContent">
    	<form action="../actions/addPriorityAction.php" method="post">
        	<table>
            	<tr>
                <td>Priority Name : </td>
                <td><input type="text" id="addPriorityName"></td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td>
                	<input type="submit">
                </td>
                <td></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="TabbedPanelsContent">
    	<form action="../actions/addcategoryupdate.php" method="post">
        	<table>
            	<tr>
                <td>Category Name : </td>
                <td><input type="text" id="addCategoryName"></td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td>
                	<input type="submit">
                </td>
                <td></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="TabbedPanelsContent">
    	<form action="../actions/addtownaction.php" method="post">
        	<table>
            	<tr>
                <td>Town Name : </td>
                <td><input type="text" id="addTownName"></td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td>
                	<input type="submit">

                </td>
                <td></td>
                </tr>
            </table>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
<?php
	require "../footer.php";
?>