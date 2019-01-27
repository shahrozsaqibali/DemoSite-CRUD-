<?php

require('Speaker.php');
require('DataBase.php');
require('Validate.php');

//Getting Data;
$validate = new Validate();
$Valid_File_Type = ["image/jpeg","image/jpg","image/png"];
$Speaker = new Speaker();
$Speaker->setFirstName($_POST["FirstName"]);
$Speaker->setLastName($_POST["LastName"]);
$Speaker->setClinicName($_POST["ClinicName"]);
$Speaker->setDesignation($_POST["Designation"]);
$Speaker->setSpecialization($_POST["Specialization"]);
$Speaker->setDescription($_POST["Description"]);
$Speaker->setImageDirectory($_FILES["Image"]["tmp_name"]);

$fname = $Speaker->getFirstName();
$lname = $Speaker->getLastName();
$cliname = $Speaker->getClinicName();
$designation = $Speaker->getDesignation();
$specialization = $Speaker->getSpecialization();
$description = $Speaker->getDescription();
$imgUrl = $Speaker->getImageDirectory();


 if($validate->ImageValidity($_FILES,"Image",$Valid_File_Type))
 {
            $img_target_directory = './assest/speakerimg/';
            $img_target_directory = $img_target_directory.$_FILES["Image"]["name"];
            if(move_uploaded_file($_FILES["Image"]["tmp_name"],$img_target_directory))
            {
                $Query = "INSERT INTO speaker(firstname,lastname,clinicname,designation,specialization,descript,imgurl) VALUES ('$fname','$lname','$cliname','$designation','$specialization','$description','$img_target_directory')"; 
                $Db = new DataBase();
                $result = $Db->insertData($Speaker,$Query);
                if($result)
                {
                    header('Location: index.php');
                    exit();
                }
                else
                { 
                    echo "<br> Unable to Add Speaker.";
                }
            }     
            else
            {
                echo "Unable to Upload File.";
            }
 }
 else
 {
     echo "";
 }


?>