<?php

# Initialize and set options for CURL
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

# Execute curl request and return results
$return = curl_exec($ch);
curl_close($ch);

?>