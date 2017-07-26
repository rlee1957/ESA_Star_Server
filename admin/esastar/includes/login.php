<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ESA-Star</title>
<link rel="stylesheet" type="text/css" href="/css/modal_dialog.css" />
<link rel="stylesheet" type="text/css" href="/css/login.css" />
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/js/login.js"></script>

</head>
<body>
<div class="body" id=bod>
<img src='/images/esastar_logo.png' 
	 style='position: fixed; 
			top: 100px; 
			left: 380px; 
			z-index: 900; 
			width: 300px; height: 
			auto; opacity: 1; 
			filter: alpha(opacity=.5);' />
<div class="grad"></div>
<div class="header">
	<div>ESA-Star<br />Admin Login</div>
</div>
<br>
<div class="login">
<form target="_self" 
	  method="post" 
	  id="login3"
	  action="https://www.esastar.com/web_services/web_service.php">
<input type="text" placeholder="User Name" name="user_name" id="user_name" /><br>
<input type="password" placeholder="Password" name="password" id="password" /><br>
<input type="password" placeholder="PIN Number" name="pin" id="pin" /><br>
<input type="hidden" name="application_name" id="application_name" value="ESA-Star Administration Application" />
<input type="hidden" name="application_key" id="application_key" value="ESA-Star 2017" />
<input type="hidden" name="key" />
<input type="hidden" name="service_name" id="service_name" value="login_to_account3"  />
<input type="button" value="Login" onclick="login();" />
</form>
</div>
<?php
include($path."elements/modal_dialog.php");
?>
</body>

</html>