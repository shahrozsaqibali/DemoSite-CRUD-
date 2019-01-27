<?php
require('Attendies.php');
require('DataBase.php');



$Attendi = new Attendies();
$Attendi->setFirstName($_POST["FirstName"]);
$Attendi->setCountry($_POST["Country"]);
$Attendi->setMobile($_POST["Mobile"]);
$Attendi->setEmail( $_POST["Email"]);
$Attendi->setLastName( $_POST["LastName"]);
$Attendi->setClinicName($_POST["ClinicName"]);

$fname = $Attendi->getFirstName();
$lname = $Attendi->getLastName();
$cliname = $Attendi->getClinicName();
$cname = $Attendi->getCountry();
$mname = $Attendi->getMobile();
$ename = $Attendi->getEmail();


$Query = "INSERT INTO attendies(firstname,lastname,clinicname,country,mobile,email) VALUES ('$fname','$lname','$cliname','$cname','$mname','$ename')";  


$config = new DataBase();
$result = $config->insertData($Attendi,$Query);
if($result)
{
    header('Location: index.php');
        exit();
}
else
{
    echo "<br> Unable to Add Attendi.";
}

?>