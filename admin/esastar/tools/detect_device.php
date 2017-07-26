<?php

echo("detect_device.php<br />");
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Include and instantiate the class.
require_once("../third/Mobile-Detect-2.8.25/Mobile_Detect.php");
$detect = new Mobile_Detect;
 
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) 
	{
	echo("This is a phone or tablet<br />"); 
	}

// Any tablet device.
if( $detect->isTablet() )
	{
	echo("This is a tablet<br />");
	}
 
// Exclude tablets.
if( $detect->isMobile() && !$detect->isTablet() )
	{
	echo("This is a mobile device<br />");
	}
 
// Check for a specific platform with the help of the magic methods:
if( $detect->isiOS() )
	{
	echo("IOS operating system<br />");
	}
 
if( $detect->isAndroidOS() )
	{
	echo("Android operating system<br />");
	}
/*  
// Alternative method is() for checking specific properties.
// WARNING: this method is in BETA, some keyword properties will change in the future.
$detect->is('Chrome')
$detect->is('iOS')
$detect->is('UC Browser')
// [...]
 
// Batch mode using setUserAgent():
$userAgents = array(
'Mozilla/5.0 (Linux; Android 4.0.4; Desire HD Build/IMM76D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Mobile Safari/535.19',
'BlackBerry7100i/4.1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/103',
// [...]
);
foreach($userAgents as $userAgent){
 
  $detect->setUserAgent($userAgent);
  $isMobile = $detect->isMobile();
  $isTablet = $detect->isTablet();
  // Use the force however you want.
 
}
 
// Get the version() of components.
// WARNING: this method is in BETA, some keyword properties will change in the future.
$detect->version('iPad'); // 4.3 (float)
$detect->version('iPhone') // 3.1 (float)
$detect->version('Android'); // 2.1 (float)
$detect->version('Opera Mini'); // 5.0 (float)
// [...]
*/
?>