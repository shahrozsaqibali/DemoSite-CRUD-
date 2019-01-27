<?php

require('DataBase.php');

$json = array();

$TableName = "attendies";
$db = new DataBase();

$getCount = $db->getCount($TableName);




?>