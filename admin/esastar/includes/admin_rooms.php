<div class=admin-button-container>
	<input type=button 
		   value="Room Types" 
		   onclick="room_types();" 
		   class="enabled-mb" />
	<input type=button 
		   value="Room Item Categories" 
		   onclick="room_item_classes();" 
		   class="enabled-mb" />
	<input type=button 
		   value="Room Items" 
		   onclick="room_items();" 
		   class="enabled-mb" />
</div>
<div class=admin-list-container>
	<div id=room_types_container class=edit-container>
		<div class=admin-container-title>
			Room Types Administration
		</div>
		<select size=15 class=admin-list>
			<option value=0 selected disabled>- Select Room Type -</option>
			<?php echo($room_types); ?>
		</select>
		<div class=admin-edit>
			<input type=text 
				   id=rt_collection 
				   value="" 
				   placeholder="Collection Name"
				   class=enabled-mi 
				   title="Room Type Collection Name" />
			<input type=text 
				   id=room_type 
				   value="" 
				   placeholder="Room Type"
				   class=enabled-mi 
				   title="Room Type" />
			<input type=text 
				   id=rt_image 
				   value="" 
				   placeholder="Room Type Image"
				   class=enabled-mi 
				   title="Room Type Image Filename" />
			<input type=button 
				   value="Save Room Type" 
				   onclick="save_room_type();" 
				   class="enabled-mb" />
		</div>
	</div>
	<div id=item_classes_container class=edit-container style="display: none;">
		<div class=admin-container-title>
			Room Item Classes Administration
		</div>
		<select size=15 class=admin-list>
			<option value=0 selected disabled>- Select Item Class -</option>
			<?php echo($room_item_classes); ?>
		</select>
		<div class=admin-edit>
			<input type=text 
				   id=ric_collection 
				   value="" 
				   placeholder="Class Collection Name"
				   class=enabled-mi 
				   title="Room Item Class Collection Name" />
			<input type=text 
				   id=ric_name 
				   value="" 
				   placeholder="Item Class Name"
				   class=enabled-mi 
				   title="Room Item Class Name" />
			<input type=text 
				   id=ric_image 
				   value="" 
				   placeholder="Item Class Image"
				   class=enabled-mi 
				   title="Room Item Class Image Filename" />
			<input type=button 
				   value="Save Item Class" 
				   onclick="save_item_class();" 
				   class="enabled-mb" />
		</div>
	</div>
	<div id=room_items_container class=edit-container style="display: none;">
		<div class=admin-container-title>
			Room Items Administration
		</div>
		<select size=15 class=admin-list>
			<option value=0 selected disabled>- Select Item -</option>
			<?php echo($room_items); ?>
		</select>
		<div class=admin-edit>
			<select class=admin-list id=ri_class_id>
				<?php echo($room_item_classes); ?>
			</select>
			<input type=text 
				   id=ri_description 
				   value="" 
				   placeholder="Item Description"
				   class=enabled-mi 
				   title="Room Item Description" />
			<input type=text 
				   id=ri_image 
				   value="" 
				   placeholder="Item Image"
				   class=enabled-mi 
				   title="Room Item Image Filename" />
			<input type=button 
				   value="Save Item" 
				   onclick="save_item();" 
				   class="enabled-mb" />
		</div>
	</div>
</div>