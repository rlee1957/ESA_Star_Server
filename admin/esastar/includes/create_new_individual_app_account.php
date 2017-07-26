<?php

$ar = array();
$full_name = $_REQUEST["full_name"];
$birth_date = $_REQUEST["birthday"];
$application_id = 2;
$entity_type_id = 1; 
$entity_id = 0; 
$account_type_id = 3;
$user_name = $_REQUEST["user_name"];
$password = $_REQUEST["password"];
include("includes/add_individual.php");
$ar["add_individual"] = $result;
include("includes/get_individual_id.php");
$entity_id = $individual_id;
$results["individual_id"] = $individual_id;
include("includes/add_new_individual_app_account.php");
$ar["add_new_individual_app_account"] = $result;
include("includes/get_account_id.php");
$results["account_id"] = $account_id;

?>