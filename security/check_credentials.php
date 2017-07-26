<?php

$logged_on = false;
if(isset($_SESSION["username"]))
	{
	if(isset($_SESSION["security_key"]))
		{
		$logged_on = true;
		}
	}

?>