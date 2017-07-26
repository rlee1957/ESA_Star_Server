<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
$path = "";
include($path."database/sql_functions.php");
include($path."functions/tree_functions.php");
$results = array();
if(isset($_REQUEST["merchant_name"]))
	{
	$parent_id = $_REQUEST["parent_id"];
	$merchant_name = $_REQUEST["merchant_name"];
	$merchant_description = $_REQUEST["merchant_description"];
	}
*/
?>
<center>
<input type=button value="Create New Merchant" onclick="new_merchant();" class="enabled-mb" id="new_merchant" />
<div class=sep></div>
<input type=button value="Edit This Merchant" onclick="edit_merchant();" class="disabled-mb" id="edit_merchant" />
<div class=sep></div>
<input type=button value="Create Child Merchant" onclick="create_merchant();" class="disabled-mb" id=create_merchant />
<div class=sep></div>
<input type=button value="Remove This Merchant" onclick="remove_merchant();" class="disabled-mb" id=remove_merchant />
<div class=sep></div>
<input type=text 
	   id=edit_name 
	   value="" 
	   placeholder="Merchant/Group Name"
	   class=disabled-mi 
	   title="Merchant/Group Name" />
<div class=sep></div>
<textarea id=edit_description 
		  value="" 
		  placeholder="Merchant Description" 
		  title="Merchant Description"
		  class=disabled-mt /></textarea>
<div class=sep></div>
<select id=edit_status 
		class=disabled_mi 
		title="Merchant Status">
	<option selected disabled>- Select Status -</option>
	<option value="Active">Active</option>
	<option value="In-Active">In-Active</option>
</select>
<div class=sep></div>			  
<input type=button value="Save New Merchant" onclick="save_new_merchant('root');" class="disabled-mb" id=save_new_merchant />
<div class=sep></div>
<input type=button value="Update Merchant" onclick="update_merchant();" class="disabled-mb" id=update_merchant />
<div class=sep></div>
<input type=button value="Save Child Merchant" onclick="save_child_merchant();" class="disabled-mb" id=save_child_merchant />
<div class=sep></div>
<input type=button value="I am sure? YES Delete!" onclick="yes_remove_merchant();" class="disabled-mb" id=yes_remove_merchant />
<div class=sep></div>
<input type=button value="Clear" onclick="clear_merchant();" class="enabled-mb" />
<div class=sep></div>
<input type=text id=edit_parent_id value="" readOnly class=stats title="Parent ID"/>
<div class=sep></div>
<input type=text id=selected_node value="" readOnly class=stats title="Merchant ID" />
<input type=hidden id=merchant_dbid value="" />
</center>
