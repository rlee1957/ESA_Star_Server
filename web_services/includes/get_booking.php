<?php

$book_id = "";
if(isset($_REQUEST["book_id"]))
	{
	$book_id = $_REQUEST["book_id"];
	$sql = "select * from book where LCASE(book_id)=?;";
	$params = array();
	$params[count($params)] = strtolower($book_id);
	$result = sql_shell($sql, $params, $path);
	//include("includes/show_results.php");
	if($result["rowcount"] > 0)
		{
		foreach($result["recordset"][0] as $fld => $val)
			{
			$results[$fld] = $val;
			}
		$results["ws_status"] = "success";
		$results["ws_msg"] = "";
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Book ID [".$book_id."] not found in database. Please check and try again.";
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "Book ID not specified. Book ID is a required input.";	
	}

?>