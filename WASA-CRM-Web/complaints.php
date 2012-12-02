<?php
require "header.php";

require "config/dbAdapter.php";
require "config/Util.php";

$util = new Util();

if(isset($_GET['cid']))
{
	if($_GET['cid'] == -1)
	{
?>
		<div class="failureMessage">System was unable to register your complaint. Please try again.</div>
<?php
	}
	else
	{
?>
		<div class="successMessage">Your complaint has been registered. Compliant ID: <?php echo $_GET['cid']; ?></div>
<?php
	}
}
?>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">New Complaint</li>
    <li class="TabbedPanelsTab" tabindex="0">Search Complaint</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <table>
    	<form action="actions/addNewComplaint.php" method="post">
        	<tr>
            	<td>Name : </td>
                <td><input type="text" id="complaintName" name="complaintName" /></td>
                <td></td>
            </tr>
            <tr>
            	<td>Contact Number :</td>
                <td> <input type="text" id="complaintContactNo" name="complaintContactNo"/></td>
                <td></td>
            </tr>
            <tr>
            	<td>CNIC :</td>
                <td><input type="text" id="complaintCNIC" name="complaintCNIC" /></td>
                <td></td>
            </tr>
            <tr>
            	<td>Priority : </td>
                <td>
                	<select id="complaintPriorty" name="complaintPriorty">
                            <?php                                
                                $util->getPriorityList();
                            ?>                        
			</select>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td>Category : </td>
                <td>
                	<select id="complaintCategory" name="complaintCategory">
                            <?php                                
                                $util->getCategoryList();
                            ?>                        
					</select>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td>Town :</td>
                <td>
                    <select id="complaintDivId" name="complaintDivId">
                            <?php
                                $util->getTownList();
                            ?>
                    </select>
                </td>
                <td></td>
            </tr>
        	<tr>
            	<td>Address :</td>
                <td><input type="text" id="complaintAddress" name="complaintAddress" /></td>
                <td></td>
            </tr>
        	<tr>
            	<td>Description :</td>
                <td><textarea rows="4" id="complaintDescription" name="complaintDescription" ></textarea></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit Complaint" /> </td>
            </tr>
        </form>
      </table>
    </div>
    <div class="TabbedPanelsContent">
    	<form action="actions/searchComplaints.php" method="post">
        	<table>
            	<tr>
                <td>Contact Number : </td>
                <td><input type="text" id="contact_number" name="contact_number"></td>
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
require "footer.php";
?>

