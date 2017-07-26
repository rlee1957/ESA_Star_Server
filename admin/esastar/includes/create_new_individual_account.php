<?php


$full_name = $_REQUEST["full_name"];
$birth_date = $_REQUEST["birthday"];;
$user_name = $_REQUEST["user_name"];
$password = $_REQUEST["password"];
$pin = $_REQUEST["pin"];

$sql = "insert into individuals (full_name, birth_date, date_created) values (?, ?, ?);";
$params = array();
$params[count($params)] = $full_name;
$params[count($params)] = $birth_date;
$params[count($params)] = date("Y-m-d H:i:s");
$results["insert_individual"] = exe_shell($sql, $params, $path);
$sql = "SELECT LAST_INSERT_ID() as id;";
$params = array();
$results["get_individual_id"] = sql_shell($sql, $params, $path);
$individual_id = $results["recordset"][0]["id"];
$sql = "insert into accounts (application_id, entity_type_id, entity_id, account_type_id, user_name, password, pin, date_created) values (?, ?, ?, ?, ?, ?, ?);";
$params = array();
$params[count($params)] = 2;
$params[count($params)] = 1;
$params[count($params)] = $individual_id;
$params[count($params)] = 3;
$params[count($params)] = $user_name;
$params[count($params)] = $password;
$params[count($params)] = $pin;
$params[count($params)] = date("Y-m-d H:i:s");
$results["insert_new_individual_account"] = exe_shell($sql, $params, $path);

?>