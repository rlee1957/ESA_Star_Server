<?php

function add_merchant($row, $path)
{

$sql = "insert into merchants (parent_id, merchant_name, merchant_description, date_added, status) values (?, ?, ?, ?, ?);";
$params = array();
if($row["parent_id"] == "NULL")
	{
	$params[count($params)] = NULL;	
	}
else
	{
	$params[count($params)] = $row["parent_id"];
	}
$params[count($params)] = $row["merchant_name"];
$params[count($params)] = $row["merchant_description"];
$params[count($params)] = date("Y-m-d H:i:s");
$params[count($params)] = "Active";
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function update_merchant($row, $path)
{

$sql = "update merchants set merchant_name = ?, merchant_description = ?, status = ? where merchant_id = ?;";
$params = array();
$params[count($params)] = $row["merchant_name"];
$params[count($params)] = $row["merchant_description"];
$params[count($params)] = $row["status"];
$params[count($params)] = $row["merchant_id"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function delete_merchant($row, $path)
{

$sql = "select merchant_id from merchants where parent_id = ?";
$params = array();
$params[count($params)] = $row["merchant_id"];
$result = sql_shell($sql, $params, $path);
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		delete_merchant($row, $path);	
		}	
	}
else
	{
	$sql = "delete from merchants where merchant_id = ?";
	$params = array();
	$params[count($params)] = $row["merchant_id"];
	$result = exe_shell($sql, $params, $path);	
	}
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function get_merchant_tree($path)
{
	
$sql = "select * from merchants where parent_id is null order by merchant_name;";
$fields = array();
$fields["id"] = "merchant_id";
$fields["parent_id"] = "parent_id";
$fields["name"] = "merchant_name";
$fields["description"] = "merchant_description";
$fields["date_added"] = "date_added";
$fields["status"] = "status";
$params = array();
$result = sql_shell($sql, $params, $path);	
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
$htm = "";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$htm .= get_root($row, $fields, $path);	
		}
	}
return $htm;
	
}

function get_root($row, $fields, $path)
{
	
$sql = "select * from merchants where parent_id = ? order by merchant_name;";
$params = array();
$params[count($params)] = $row[$fields["id"]];
$result = sql_shell($sql, $params, $path);	
if($result["rowcount"] > 0)
	{
	$method = "onclick='node_click(".$row[$fields["id"]].");'";
	$img = "images/close.png";
	}
else
	{
	$method = "onclick='select_node(".$row[$fields["id"]].");'";
	$img = "images/building.png";	
	}
$htm = "
<div class='root' id=node_".$row[$fields["id"]].">
	<input type=hidden 
		   id=id_".$row[$fields["id"]]." 
		   value='".$row[$fields["id"]]."' />
	<input type=hidden 
		   id=parent_id_".$row[$fields["id"]]." 
		   value='' />
	<input type=hidden 
		   id=name_".$row[$fields["id"]]." 
		   value='".$row[$fields["name"]]."' />
	<input type=hidden 
		   id=description_".$row[$fields["id"]]." 
		   value='".$row[$fields["description"]]."' />
	<input type=hidden 
		   id=date_added_".$row[$fields["id"]]." 
		   value='".$row[$fields["date_added"]]."' />
	<input type=hidden 
		   id=status_".$row[$fields["id"]]." 
		   value='".$row[$fields["status"]]."' />
	<input type=radio 
		   id=rad_".$row[$fields["id"]]." 
		   name=selector 
		   class=selector
		   onclick='select_node(".$row[$fields["id"]].");' />
	<span id=node_".$row[$fields["id"]]." 
		  ".$method." class=node-lbl>
		<img src='".$img."' id=icon_".$row[$fields["id"]]." class=node-img />
		<label id=label_".$row[$fields["id"]]." >".$row[$fields["name"]]."</label>
	</span>
	<input type=hidden id=node_type_".$row[$fields["id"]]." value='root' />
	<div style='height: 20px; max-height: 20px; overflow: hidden;'>&nbsp;</div>
	<div id=content_".$row[$fields["id"]]." style='display: block;' class='root'>
";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$htm .= get_node($row, $fields, $path);	
		}
	}
$htm .= "	
	</div>
</div>
";	
return $htm;
	
}

function get_node($row, $fields, $path)
{

$sql = "select * from merchants where parent_id = ? order by merchant_name;";
$params = array();
$params[count($params)] = $row[$fields["id"]];
$result = sql_shell($sql, $params, $path);	
if($result["rowcount"] > 0)
	{
	$method = "onclick='node_click(".$row[$fields["id"]].");'";
	$img = "images/close.png";
	}
else
	{
	$method = "onclick='select_node(".$row[$fields["id"]].");'";
	$img = "images/building.png";	
	}
$htm = "
<div class='node' 
	 id=node_".$row[$fields["id"]]." 
	 style='padding: 0  0  0  40px;'>
	<input type=hidden 
		   id=id_".$row[$fields["id"]]." 
		   value='".$row[$fields["id"]]."' />
	<input type=hidden 
		   id=parent_id_".$row[$fields["id"]]." 
		   value='".$row[$fields["parent_id"]]."' />
	<input type=hidden 
		   id=name_".$row[$fields["id"]]." 
		   value='".$row[$fields["name"]]."' />
	<input type=hidden 
		   id=description_".$row[$fields["id"]]." 
		   value='".$row[$fields["description"]]."' />
	<input type=hidden 
		   id=date_added_".$row[$fields["id"]]." 
		   value='".$row[$fields["date_added"]]."' />
	<input type=hidden 
		   id=status_".$row[$fields["id"]]." 
		   value='".$row[$fields["status"]]."' />
	<input type=radio id=rad_".$row[$fields["id"]]." name=selector onclick='select_node(".$row[$fields["id"]].");' class=selector />
	<span id=node_".$row[$fields["id"]]." ".$method.">
		<img src='".$img."' id=icon_".$row[$fields["id"]]." class=node-img />
		<label id=label_".$row[$fields["id"]]." class=node-lbl >".$row[$fields["name"]]."</label>
	</span>
	<input type=hidden id=node_type_".$row[$fields["id"]]." value='root' />
	<div style='height: 20px; max-height: 20px; overflow: hidden;'>&nbsp;</div>
	<div id=content_".$row[$fields["id"]]." style='display: block;' class='root'>
";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$htm .= get_node($row, $fields, $path);	
		}
	}
$htm .= "	
	</div>
</div>
";	
return $htm;
	
}

function add_room_type($row, $path)
{
$sql = "insert into room_types (room_type, collection, image_file) values (?, ?, ?);";
$params = array();
$params[count($params)] = $row["room_type"];
$params[count($params)] = $row["collection"];
$params[count($params)] = $row["image_file"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");	
}

function update_room_type($row, $path)
{

$sql = "update room_types set room_type = ?, collection = ?, image_file = ? where type_id = ?;";
$params = array();
$params[count($params)] = $row["room_type"];
$params[count($params)] = $row["collection"];
$params[count($params)] = $row["image_file"];
$params[count($params)] = $row["type_id"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");

}

function add_room_item_class($row, $path)
{

$sql = "insert into room_item_classes (collection_class, item_class, image_file) values (?, ?, ?);";
$params = array();
$params[count($params)] = $row["collection_class"];
$params[count($params)] = $row["item_class"];
$params[count($params)] = $row["image_file"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function update_room_item_class($row, $path)
{

$sql = "update room_item_classes set collection_class = ?, item_class = ?, image_file = ? where class_id = ?;";
$params = array();
$params[count($params)] = $row["collection_class"];
$params[count($params)] = $row["item_class"];
$params[count($params)] = $row["image_file"];
$params[count($params)] = $row["class_id"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function add_room_item($row, $path)
{

$sql = "insert into room_items(item_class_id, item_description, image_file) values (?, ?, ?);";
$params = array();
$params[count($params)] = $row["item_class_id"];
$params[count($params)] = $row["item_description"];
$params[count($params)] = $row["image_file"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function update_room_item($row, $path)
{

$sql = "update room_items set item_class_id = ?, item_description = ?, image_file = ? where item_id = ?;";
$params = array();
$params[count($params)] = $row["item_class_id"];
$params[count($params)] = $row["item_description"];
$params[count($params)] = $row["image_file"];
$params[count($params)] = $row["item_id"];
$result = exe_shell($sql, $params, $path);
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
}

function add_room_type_default($items, $path)
{
	
$sql = "delete from mr_defaults where merchant_id = ? and type_id = ?";
$params = array();
$params[count($params)] = $items[0]["merchant_id"];
$params[count($params)] = $items[0]["type_id"];
$result = exe_shell($sql, $params, $path);
foreach($items as $key => $row)	
	{
	$sql = "insert into mr_defaults (merchant_id, type_id, item_id, quantity) values (?, ?, ?, ?)";
	$params = array();
	$params[count($params)] = $row["merchant_id"];
	$params[count($params)] = $row["type_id"];
	$params[count($params)] = $row["item_id"];
	$params[count($params)] = $row["quantity"];
	$result = exe_shell($sql, $params, $path);
	#echo("<textarea style='width: 95%; height: 200px;'>");
	#print_r($result);
	#echo("</textarea>");	
	}
}

function add_room_items($items, $path)
{
$sql = "delete from mr_items where merchant_id = ? and room_id = ?";
$params = array();
$params[count($params)] = $items[0]["merchant_id"];
$params[count($params)] = $items[0]["room_id"];
$result = exe_shell($sql, $params, $path);
foreach($items as $key => $row)	
	{
	$sql = "insert into mr_items (merchant_id, room_id, item_id, quantity) values (?, ?, ?, ?)";
	$params = array();
	$params[count($params)] = $row["merchant_id"];
	$params[count($params)] = $row["room_id"];
	$params[count($params)] = $row["item_id"];
	$params[count($params)] = $row["quantity"];
	$result = exe_shell($sql, $params, $path);
	#echo("<textarea style='width: 95%; height: 200px;'>");
	#print_r($result);
	#echo("</textarea>");	
	}	
}

function get_merchant_Rooms($merchant_id, $path)
{

$_SESSION["node_count"]	= -1;
$sql = "
select 
	distinct concat(mr.collection,'~',mr.room_type,'~',mr.type_id,'~',rt.image_file) as r_type 
from 
	merchant_rooms mr
left join
	room_types rt on mr.type_id = rt.type_id
where 
	mr.merchant_id = ? 
order by 
	rt.collection;
";
$params = array();
$params[count($params)] = $merchant_id;
$result = sql_shell($sql, $params, $path);	
#echo("<textarea style='width: 95%; height: 200px;'>");
#print_r($result);
#echo("</textarea>");
$htm = "
<div class=rooms-title>
	".get_rooms_title($merchant_id, $path)."
</div>
";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$rt = $row["r_type"];
		$room_type = explode("~", $rt);
		$_SESSION["node_count"]++;
		$htm .= get_room_type($room_type, $path);	
		}
	}
return $htm;
	
}

function get_room_type($merchant_id, $room_type, $path)
{

$sql = "
select 
	merchant_id,
	room_id,
	type_id,
	room_name,
	'".$room_type[0]."' as collection,
	'".$room_type[1]."' as room_type	
from 
	merchant_rooms
where 
	merchant_id = ? and
	type_id = ?
order by 
	room_name;
";
$params = array();
$params[count($params)] = $merchant_id;
$params[count($params)] = $room_type[2];
$result = sql_shell($sql, $params, $path);	
$method = "onclick='node_click(".$_SESSION["node_count"].");'";
$img1 = "close.png";
$img2 = $room_type[3];	
$htm = "
<div class='root' id=node_".$_SESSION["node_count"].">
	<span id=node_".$_SESSION["node_count"]." 
		  ".$method." 
		  class=node-lbl>
		<img src='images/".$img1."' id=icon1_".$_SESSION["node_count"]." class=node-img />
		<img src='images/".$img2."' id=icon2_".$_SESSION["node_count"]." class=node-img />
		<label id=label_".$_SESSION["node_count"]." >".$room_type[0]."</label>
	</span>
	<input type=hidden id=node_type_".$_SESSION["node_count"]." value='root' />
	<div style='height: 20px; max-height: 20px; overflow: hidden;'>&nbsp;</div>
	<div id=content_".$_SESSION["node_count"]." style='display: block;' class='root'>
";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$_SESSION["node_count"]++;
		$htm .= get_room($merchant_id, $row, $path);	
		}
	}
$htm .= "	
	</div>
</div>
";	
return $htm;
	
}

function get_room($merchant_id, $room, $path)
{

$sql = "
select 
	distinct concat(ric.item_class,'~',ric.collection_class,'~',ric.class_id,'~',ric.image_file) as class
from
	mr_items mri
join
	room_items ri on mri.item_id = ri.item_id
join
	room_item_classes ric on ri.item_id = ric.item_id
where
	mri.merchant_id = ? and
	mri.room_id = ?
order by
	ric.item_class;
	";
$params = array();
$params[count($params)] = $merchant_id;
$params[count($params)] = $room["room_id"];
$result = sql_shell($sql, $params, $path);	
$method = "onclick='node_click(".$_SESSION["node_count"].");'";
$img1 = "open.png";
$img2 = "blank.png";
$htm = "
<div class='node' 
	 id=node_".$_SESSION["node_count"]." 
	 style='padding: 0  0  0  40px;'>
	<input type=hidden 
		   id=room_id_".$_SESSION["node_count"]." 
		   value='".$room["room_id"]."' />
	<input type=hidden 
		   id=type_id_".$_SESSION["node_count"]." 
		   value='".$room["type_id"]."' />
	<input type=hidden 
		   id=room_name_".$_SESSION["node_count"]." 
		   value='".$room["room_name"]."' />
	<input type=hidden 
		   id=collection_".$_SESSION["node_count"]." 
		   value='".$room["collection"]."' />
	<input type=hidden 
		   id=room_type_".$_SESSION["node_count"]." 
		   value='".$room["room_type"]."' />
	<input type=radio id=rad_".$_SESSION["node_count"]." name=selector onclick='select_room(".$_SESSION["node_count"].");' class=selector />
	<span id=node_".$_SESSION["node_count"]." ".$method.">
		<img src='images/".$img1."' id=icon1_".$_SESSION["node_count"]." class=node-img />
		<img src='images/".$img2."' id=icon2_".$_SESSION["node_count"]." class=node-img />
		<label id=label_".$_SESSION["node_count"]." class=node-lbl >".$room["room_name"]."</label>
	</span>
	<input type=hidden id=node_type_".$_SESSION["node_count"]." value='root' />
	<div style='height: 20px; max-height: 20px; overflow: hidden;'>&nbsp;</div>
	<div id=content_".$_SESSION["node_count"]." style='display: block;' class='root'>
";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$_SESSION["node_count"]++;
		$htm .= get_item_class($merchant, $room["room_id"], $row["class"], $path);	
		}
	}
$htm .= "	
	</div>
</div>
";	
return $htm;
	
}

function get_item_class($merchant_id, $room_id, $class, $path)
{

$cr = explode("~", $class);
$sql = "
select 
	mri.item_id,
	ri.item_description,
	mri.quantity
from
	mr_items mri
join
	room_items ri on mri.item_id = ri.item_id
join
	room_item_classes ric on ri.item_id = ric.item_id
where
	mri.merchant_id = ? and
	mri.room_id = ? and
	ric.class_id = ?
order by
	ri.item_description;
	";
$params = array();
$params[count($params)] = $merchant_id;
$params[count($params)] = $room_id;
$params[count($params)] = $cr[2];
$result = sql_shell($sql, $params, $path);	
$method = "onclick='node_click(".$_SESSION["node_count"].");'";
$img1 = "open.png";
$img2 = "blank.png";
$htm = "
<div class='node' 
	 id=node_".$_SESSION["node_count"]." 
	 style='padding: 0  0  0  40px;'>
	<span id=node_".$_SESSION["node_count"]." ".$method.">
		<img src='images/".$img1."' id=icon1_".$_SESSION["node_count"]." class=node-img />
		<img src='images/".$img2."' id=icon2_".$_SESSION["node_count"]." class=node-img />
		<label id=label_".$_SESSION["node_count"]." class=node-lbl >".$room["room_name"]."</label>
	</span>
	<input type=hidden id=node_type_".$_SESSION["node_count"]." value='root' />
	<div style='height: 20px; max-height: 20px; overflow: hidden;'>&nbsp;</div>
	<div id=content_".$_SESSION["node_count"]." style='display: block;' class='root'>
";
if($result["rowcount"] > 0)
	{
	foreach($result["recordset"] as $key => $row)
		{
		$_SESSION["node_count"]++;
		$htm .= "
		<div class=item-list>
			".$row["item_description"]." (".$row["quantity"]." each)
		</div>
		";	
		}
	}
$htm .= "	
	</div>
</div>
";	
return $htm;
	
}

function add_room($row, $path)
{

$sql = "insert into merchant_rooms (merchant_id, type_id, room_name) values (?, ?, ?);";
$params = array();
$params[count($params)] = $row["merchant_id"];
$params[count($params)] = $row["type_id"];
$params[count($params)] = $row["room_name"];
$result = exe_shell($sql, $params, $path);
$sql = "select room_id from merchant_rooms where merchant_id = ? and type_id = ? and room_name = ?;";
$params = array();
$params[count($params)] = $row["merchant_id"];
$params[count($params)] = $row["type_id"];
$params[count($params)] = $row["room_name"];
$result = sql_shell($sql, $params, $path);
add_room_items($merchant_id, $result["recordset"][0]["room_id"], $row["items"], $path);

}

function update_room($row, $path)
{

$sql = "update merchant_rooms set merchant_id = ?, type_id = ?, room_name = ? where room_id = ?;";
$params = array();
$params[count($params)] = $row["merchant_id"];
$params[count($params)] = $row["type_id"];
$params[count($params)] = $row["room_name"];
$params[count($params)] = $row["room_id"];
$result = exe_shell($sql, $params, $path);
add_room_items($row["merchant_id"], $row["room_id"], $row["items"], $path);

}

function get_rooms_title($merchant_id, $path)
{

$sql = "select * from merchants where merchant_id = ?;";
$params = array();
$params[count($params)] = $merchant_id;
$result = sql_shell($sql, $params, $path);
$htm = $result["recordset"][0]["merchant_name"];
$htm .= "&nbsp;~&nbsp;Merchant ID (".$merchant_id.")";
return $htm;

}

function room_types($path)
{
	
$sql = "select * from room_types order by room_type;";
$params = array();
$result = sql_shell($sql, $params, $path);
return $result;
	
}

function room_items($path)
{
	
$sql = "
select
	ri.item_id,
	ri.item_class_id,
	ri.item_description,
	ric.item_class,
	ric.collection_class,
	ri.image_file
from 
	room_items ri
join	
	room_item_classes ric on ri.item_class_id =  ric.class_id
order by 
	ri.item_description;";
$params = array();
$result = sql_shell($sql, $params, $path);
echo("<textarea style='width: 95%; height: 200px;'>");
print_r($result);
echo("</textarea>");
return $result;
	
}

function room_item_classes($path)
{
	
$sql = "select * from room_item_classes order by item_class;";
$params = array();
$result = sql_shell($sql, $params, $path);
return $result;
	
}

?>


