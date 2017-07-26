<html>
<head>
<title>Tree View</title>
<link rel="stylesheet" href="css/tv.css">
<script type='text/javascript' src='js/tv.js'></script>
</head>
<body>
<div id="tree_view" class="tree-view">
<div class='root'>
	<input type=radio id=rad_0 name=selector />
	<span id=node_0 onclick='node_click(0);'>
		<img src='images/open.png' id=icon_0 />
		<label id='label_0'>ESA Star Hotel #1 (Boise Idaho)</label>
	</span>
	<div id=content_0 style='display: none;' class='node'>

		<input type=radio id=rad_1 name=selector />
		<span id=node_1 onclick='node_click(1);'>
			<img src='images/open.png' id=icon_1 />
			<label id='label_1'>Front Desk</label>
		</span>
		<div id=content_1 style='display: none;'>

		</div>

	</div>
</div>

<div>
	<input type=radio id=rad_2 name=selector />
	<span id=node_2 onclick='node_click(2);'>
		<img src='images/open.png' id=icon_2 />
		<label id=label_2 >ESA Star Hotel #2 (Meridian Idaho)</label>
	</span>
	<div id=content_2 style='display: none;' class='node'>

		
	</div>
</div>
</div>
<!-- Controls -->
<div id="controls" class="controls">
	<input type=button value="Add Root" onclick="add_root();" />&nbsp;
	<input type=button value="Add Node" onclick="add_node();" />&nbsp;
	<input type=button value="Remove Node" onclick="remove_node();" />&nbsp;
	<table border=1 cellpadding=3>
		<tr>
			<td><b>Label</b></td>
			<td>
				<input type=text id=edit_label value="" style="width: 200px;" 
					   onkeyup="change_label();" onchange="change_label();" />
			</td>
		</tr>
	</table>
	<br /><br /><br /><br /><br />
	<table border=1 cellpadding=3>
		<tr>
			<td><b>Node Count</b></td>
			<td><input type=text id=node_count value="" readOnly /></td>
		</tr>
		<tr>
			<td><b>Selected Node</b></td>
			<td><input type=text id=selected_nade value="" readOnly /></td>
		</tr>
	</table>
</div>
<!-- Root Code -->
<textarea id=root_code style="display: none;">
<div class='root' id=root_0>
	<input type=radio id=rad_0 name=selector onclick="select_node(0);" />
	<span id=node_0 onclick='node_click(0);'>
		<img src='images/open.png' id=icon_0 />
		<label id=label_0 >Root</label>
	</span>
	<input type=hidden id=node_type_0 value="node" />
	<div id=content_0 style='display: none;' class='node'></div>
</div>
</textarea>
<!-- Node Code -->
<textarea id=node_code style="display: none;">
<input type=radio id=rad_0 name=selector onclick="select_node(0);" />
<span id=node_0 onclick='node_click(0);'>
	<img src='images/open.png' id=icon_0 />
	<label id=label_0 >Node</label>
</span>
<input type=hidden id=node_type_0 value="node" />
<input type=hidden id=parent_idx_0 value="" />
<div id=content_0 style='display: none;'></div>
</textarea>
<!-- variables -->
</body>
</html>