<?php
require("Validate.php");
require("DataBase.php");


$validate = new Validate();
$db = new DataBase();


if(isset($_POST["upload"]))
{   
     $filename = $_FILES["attendcsv"]["tmp_name"];

     $extension = ["application/vnd.ms-excel"];
    
     $result = $validate->ImageValidity($_FILES,"attendcsv",$extension);

    if($result == true)
    {
      $status = $db->insertCSVFile($filename);
      if($status == true)
      {
        
      }
      else
      {
          echo  "Error : Unable to add data";
      }
      
    } 
}

echo "

<form action=\"attendiCSV.php\"   method=\"POST\" enctype=\"multipart/form-data\">
    <input type=\"file\" name=\"attendcsv\" />
    <input type=\"submit\" name=\"upload\" />
</form>

";


?>