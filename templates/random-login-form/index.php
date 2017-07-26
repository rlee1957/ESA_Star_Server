<?php

include("/framework/_show_errors.php");
include("/framework/_start_session.php");
include("/security/_check_credentials.php");
include("/security/_check_permissions.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ESA-Star</title>
<style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url("/templates/random-login-form/images/earth.jpg");
	background-size: cover;
	/*-webkit-filter: blur(5px);*/
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>
<script src="/templates/random-login-form/js/prefixfree.min.js"></script>
<script type="text/javascript" src="/templates/random-login-form/js/effects.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/js/image-picker.js"></script>
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/js/login.js"></script>

</head>

<body>
<div class="body" id=bod>
<?php

$ct = 0;
$thresh = 250;
$cnt = "";
for($ct=0;$ct < $thresh;$ct++)
	{
	$cnt .= "<img src='/images/esastar_logo0.png' style='position: fixed; top: ";
	$cnt .= "" . (50 + ($ct * (50/250))) . "";
	$cnt .= "px; left: ";
	$cnt .= "" . (50 + ($ct * 1.32)) . "";
	$cnt .= "px; z-index: ";
	$cnt .= (600 + $ct);
	$cnt .= "; width: ";
	$cnt .= "" . (5 + ($ct * 1.18)) . "";
	$cnt .= "px; height: auto; opacity: ";
	$cnt .= "" . (.9 - ($ct * .00399996)) . "";
	$cnt .= "; filter: alpha(opacity=";
	$cnt .= "" . (.9 - ($ct * .00399996)) . "";
	$cnt .= ");' />";
	}
echo($cnt);
?>
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
	<input type="text" placeholder="User Name" name="user" /><br>
	<input type="password" placeholder="Password" name="password" /><br>
	<input type="password" placeholder="PIN Number" name="pin" /><br>
	<input type="hidden" name="application" />
	<input type="hidden" name="application_key" />
	<input type="hidden" name="key" />
	<input type="button" value="Login" onclick="login();" />
</div>
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>