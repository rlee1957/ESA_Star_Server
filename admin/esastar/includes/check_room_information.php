<?php

$check_results = array();
$check_results["room_types"] = room_types($path);
$check_results["room_item_classes"] = room_item_classes($path);
$check_results["room_items"] = room_items($path);
$show_administration = false;
$room_types = "";
$room_item_classes = "";
$room_items = "";
foreach($check_results as $group => $result)
	{
	if($result["rowcount"] == 0){ $show_administration = true; }	
	$options = "";
	foreach($result["recordset"] as $idx => $row)
		{
		$label = "";
		if($group == "room_types"){ $label = $row["room_type"]; }
		if($group == "room_item_classes"){ $label = $row["item_class"]; }
		if($group == "room_items"){ $label = $row["item_description"]; }
		$value = "";
		$del = "";
		foreach($row as $cname => $cvalue)
			{
			$value .= $del.$cname.":".$cvalue;
			$del = "|";
			}
		$options .= "
	<option value='".$value."'>".$label."</option>	
		";
		}
	$$group = $options;
	}

?>