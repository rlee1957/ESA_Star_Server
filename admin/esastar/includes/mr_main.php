
<html>
<head>
<title>ESAStar</title>
<link rel="stylesheet" href="css/tv.css">
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/image-picker.js"></script>
<script type='text/javascript' src='js/tv.js'></script>
</head>
<body>
<!-- Tree View -->
<div id="tree_view" class="tree-view">
<?php include("includes/treeview_merchant_rooms.php"); ?>
</div>
<!-- Controls -->
<div id="controls" class="controls">
<?php include("includes/control_merchant_rooms.php"); ?>
</div>
<div id="other" class="nd">
<?php include("includes/other_merchant_rooms.php"); ?>
</div>
<?php
include("includes/popup.php");
?>
</body>
</html>