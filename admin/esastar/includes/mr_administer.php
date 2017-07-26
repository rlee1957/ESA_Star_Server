
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
<input type=hidden id=after_refresh_show value="" />
<div id=screen1 class=screen></div>
<div id=popup1 class=administer>
<?php
include($path."includes/admin_rooms.php")
?>
</div>
<div id=screen2 class=screen style="display: none;"></div>
<div id=popup2 class=alert style="display: none;"></div>
</body>
</html>