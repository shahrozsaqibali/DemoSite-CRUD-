<?php
require('DataBase.php');

$db = new DataBase();
if(isset($_POST["submit"]))
{
    $dir = 'D:\Book1.csv';
    $db->insertCSVFile($dir,7);
}
?>