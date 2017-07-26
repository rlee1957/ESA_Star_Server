function node_click(idx)
{

var im = document.getElementById("icon_" + idx);
var co = document.getElementById("content_" + idx);
if(co.style.display == "none")
	{
	im.src = "images/close.png";
	co.style.display = "block";
	}
else
	{
	im.src = "images/open.png";
	co.style.display = "none";
	}

}

function add_root()
{
	
var name = document.getElementById("").value;
	
}

function add_node()
{
	
var code = document.getElementById("root_code").value;
var cont = document.getElementById("tree_view");
var newv = "(" + idx + ")";
code = code.replace(/\(0\)/, newv);
newv = "_" + idx + " ";
code = code.replace(/_0 /, newv);
cont.value = cont.value + code;
	
}

function force_open(idx)
{

var im = document.getElementById("icon_" + idx);
var co = document.getElementById("content_" + idx);
im.src = "images/close.png";
co.style.display = "block";

}

function new_merchant()
{
document.getElementById("new_merchant").className = "disabled-mb";	
document.getElementById("edit_merchant").className = "disabled-mb";
document.getElementById("create_merchant").className = "disabled-mb";
document.getElementById("remove_merchant").className = "disabled-mb";
document.getElementById("save_new_merchant").className = "enabled-mb";
document.getElementById("save_child_merchant").className = "disabled-mb";
document.getElementById("yes_remove_merchant").className = "disabled-mb";
document.getElementById("edit_name").value = "";
document.getElementById("edit_description").value = "";
document.getElementById("edit_name").className = "enabled-mi";
document.getElementById("edit_description").className = "enabled-mt";
document.getElementById("edit_parent_id").value = "";
}

function edit_merchant()
{
var idx = document.getElementById("selected_node").value;
var label = document.getElementById("label_" + idx).value;
var description = document.getElementById("description_" + idx).value;
var parent_id = document.getElementById("parent_id_" + idx).value;
document.getElementById("new_merchant").className = "disabled-mb";	
document.getElementById("edit_merchant").className = "disabled-mb";
document.getElementById("create_merchant").className = "disabled-mb";
document.getElementById("remove_merchant").className = "disabled-mb";
document.getElementById("save_new_merchant").className = "disabled-mb";
document.getElementById("update_merchant").className = "enabled-mb";
document.getElementById("save_child_merchant").className = "disabled-mb";
document.getElementById("yes_remove_merchant").className = "disabled-mb";
document.getElementById("edit_name").className = "enabled-mi";
document.getElementById("edit_description").className = "enabled-mt";		
}

function create_merchant()
{
var idx = document.getElementById("selected_node").value;
var parent_id = document.getElementById("parent_id_" + idx).value;
document.getElementById("new_merchant").className = "disabled-mb";	
document.getElementById("edit_merchant").className = "disabled-mb";
document.getElementById("create_merchant").className = "disabled-mb";
document.getElementById("remove_merchant").className = "disabled-mb";
document.getElementById("save_new_merchant").className = "disabled-mb";
document.getElementById("update_merchant").className = "disabled-mb";
document.getElementById("save_child_merchant").className = "enabled-mb";
document.getElementById("yes_remove_merchant").className = "disabled-mb";
document.getElementById("edit_name").value = "";
document.getElementById("edit_description").value = "";	
document.getElementById("edit_name").className = "enabled-mi";
document.getElementById("edit_description").className = "enabled-mt";
}

function remove_merchant()
{
var idx = document.getElementById("selected_node").value;
var parent_id = document.getElementById("parent_id_" + idx).value;
document.getElementById("new_merchant").className = "disabled-mb";	
document.getElementById("edit_merchant").className = "disabled-mb";
document.getElementById("create_merchant").className = "disabled-mb";
document.getElementById("remove_merchant").className = "disabled-mb";
document.getElementById("save_new_merchant").className = "disabled-mb";
document.getElementById("update_merchant").className = "disabled-mb";
document.getElementById("save_child_merchant").className = "disabled-mb";
document.getElementById("edit_name").className = "disabled-mi";
document.getElementById("edit_description").className = "disabled-mt";
document.getElementById("yes_remove_merchant").className = "enabled-mb";			
}

function clear_merchant()
{
document.getElementById("new_merchant").className = "enabled-mb";	
document.getElementById("edit_merchant").className = "disabled-mb";
document.getElementById("create_merchant").className = "disabled-mb";
document.getElementById("remove_merchant").className = "disabled-mb";
document.getElementById("save_new_merchant").className = "disabled-mb";
document.getElementById("update_merchant").className = "disabled-mb";
document.getElementById("save_child_merchant").className = "disabled-mb";
document.getElementById("yes_remove_merchant").className = "disabled-mb";
document.getElementById("edit_name").value = "";
document.getElementById("edit_description").value = "";
document.getElementById("edit_name").className = "disabled-mi";
document.getElementById("edit_description").className = "disabled-mt";
document.getElementById("edit_parent_id").value = "";	
document.getElementById("selected_node").value = "";
var radios = document.getElementsByName("selector");
for(r in radios)
	{
	document.getElementById(r).checked = false;	
	}

}

function select_node(idx)
{	
var parent_id = document.getElementById("parent_id_" + idx).value;
var name = document.getElementById("name_" + idx).value;
var description = document.getElementById("description_" + idx).value;
var status = document.getElementById("status_" + idx).value;
document.getElementById("rad_" + idx).checked = true;
document.getElementById("new_merchant").className = "disabled-mb";	
document.getElementById("edit_merchant").className = "enabled-mb";
document.getElementById("create_merchant").className = "enabled-mb";
document.getElementById("remove_merchant").className = "enabled-mb";
document.getElementById("save_new_merchant").className = "disabled-mb";
document.getElementById("update_merchant").className = "disabled-mb";
document.getElementById("save_child_merchant").className = "disabled-mb";
document.getElementById("yes_remove_merchant").className = "disabled-mb";
document.getElementById("edit_name").value = name;
document.getElementById("edit_description").value = description;
document.getElementById("edit_status").value = status;
document.getElementById("edit_name").className = "disabled-mi";
document.getElementById("edit_description").className = "disabled-mt";
document.getElementById("edit_parent_id").value = parent_id;
document.getElementById("selected_node").value = idx;
}

function fill_treeview(result)
{
	
document.getElementById("tree_view").innerHTML = result;
clear_merchant();
	
}

function save_new_merchant(type)
{
var name = document.getElementById("edit_name").value;
var description = document.getElementById("edit_description").value;	
var status = document.getElementById("edit_status").value;
var parent_id = document.getElementById("selected_node").value;
if(type != "child"){ parent_id = "NULL"; }	

var form_data = "parent_id=" + parent_id;
form_data += "&merchant_name=" + name;
form_data += "&merchant_description=" + description;
form_data += "&status=" + status;
var href = "actions/merchant_add.php";
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: form_data,
		success: function(result){ fill_treeview(result); }
		}
	);
}

function update_merchant()
{
var id = document.getElementById("selected_node").value;
var name = document.getElementById("edit_name").value;
var description = document.getElementById("edit_description").value;	
var status = document.getElementById("edit_status").value;	
var parent_id = document.getElementById("edit_parent_id").value;
var form_data = "merchant_id=" + id;
form_data += "&merchant_name=" + name;
form_data += "&merchant_description=" + description;
form_data += "&status=" + status;
var href = "actions/merchant_update.php";
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: form_data,
		success: function(result){ fill_treeview(result); }
		}
	);	
}

function save_child_merchant()
{
save_new_merchant("child");	
}

function yes_remove_merchant()
{
var id = document.getElementById("selected_node").value;
var name = document.getElementById("edit_name").value;
var description = document.getElementById("edit_description").value;	
var status = document.getElementById("edit_status").value;	
var parent_id = document.getElementById("edit_parent_id").value;
var form_data = "merchant_id=" + id;
form_data += "&merchant_name=" + name;
form_data += "&merchant_description=" + description;
form_data += "&status=" + status;
var href = "actions/merchant_delete.php";
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: form_data,
		success: function(result){ fill_treeview(result); }
		}
	);		
}

function check_admin()
{
	
//document	
	
}

function room_types()
{
document.getElementById("room_types_container").style.display = "block";	
document.getElementById("item_classes_container").style.display = "none";	
document.getElementById("room_items_container").style.display = "none";	
}

function room_item_classes()
{
document.getElementById("room_types_container").style.display = "none";	
document.getElementById("item_classes_container").style.display = "block";	
document.getElementById("room_items_container").style.display = "none";		
}

function room_items()
{
document.getElementById("room_types_container").style.display = "none";	
document.getElementById("item_classes_container").style.display = "none";	
document.getElementById("room_items_container").style.display = "block";		
}

function save_room_type()
{
	
var rt_collection = document.getElementById("rt_collection").value;
var room_type = document.getElementById("room_type").value;	
var rt_image = document.getElementById("rt_image").value;
var form_data = "room_type=" + room_type;
form_data += "&collection=" + rt_collection;
form_data += "&image_file=" + rt_image;
var href = "actions/room_type_add.php";
document.getElementById("after_refresh_show").value = 1;
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: form_data,
		success: function(result){ show_room_classification_admin(result); }
		}
	);

}

function save_item_class()
{
	
var ric_collection = document.getElementById("ric_collection").value;
var ric_name = document.getElementById("ric_name").value;	
var ric_image = document.getElementById("ric_image").value;
var form_data = "collection_class=" + ric_collection;
form_data += "&item_class=" + ric_name;
form_data += "&image_file=" + ric_image;
var href = "actions/item_type_add.php";
document.getElementById("after_refresh_show").value = 2;
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: form_data,
		success: function(result){ show_room_classification_admin(result); }
		}
	);

}

function save_item()
{
	
var ri_class = document.getElementById("ri_class_id").value;
var ri_ar = ri_class.split("|");
for(x=0;x<ri_ar.length;x++)
	{
	tar = ri_ar[x].split(":");
	if(tar[0] == "class_id")
		{
		ri_class_id = tar[1];
		break;		
		}
	/*
	ri.item_id,
	ri.item_class_id,
	ri.item_description,
	ric.item_class,
	ric.collection_class,
	ri.image_file
	*/
	}
var ri_description = document.getElementById("ri_description").value;	
var ri_image = document.getElementById("ri_image").value;
var form_data = "item_class_id=" + ri_class_id;
form_data += "&item_description=" + ri_description;
form_data += "&image_file=" + ri_image;
var href = "actions/room_item_add.php";
document.getElementById("after_refresh_show").value = 3;
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: form_data,
		success: function(result){ show_room_classification_admin(result); }
		}
	);

}

function show_room_classification_admin(result)
{
	
var href = "actions/show_room_classification.php";
$.ajax
	(
		{
		url: href,
		success: function(result){ insert_room_classification(result); }
		}
	);
	
}

function insert_room_classification(result)
{
document.getElementById("popup1").innerHTML = result;	
var show = document.getElementById("after_refresh_show").value;	
if(show == 1){ room_types(); }
if(show == 2){ room_item_classes(); }
if(show == 3){ room_items(); }
}


