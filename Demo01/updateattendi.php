<?php
require('Attendies.php');
require('DataBase.php');

$db = new DataBase();
$TableName = "attendies";


if(isset($_POST["submit"]))
{
    $db = new DataBase();
    $Attendent = new Attendies();
    $id = $_POST["id"];
    $Attendent->setFirstName($_POST["FirstName"]);
    $Attendent->setCountry($_POST["Country"]);
    $Attendent->setMobile($_POST["Mobile"]);
    $Attendent->setEmail( $_POST["Email"]);
    $Attendent->setLastName( $_POST["LastName"]);
    $Attendent->setClinicName($_POST["ClinicName"]);
    
    $result = $db->updateData($Attendent,$id,$TableName); 
    if($result)
    {
        header('Location: index.php');
        exit();
    }   
    else
    {
        echo "Error:Unable to Update Record.";
    }
}
if(isset($_GET["update"]))
{   
    $id = $_GET["update"];
    $RESULT = $db->displayData($id,$TableName);
    $row = mysqli_fetch_array($RESULT);
    
    echo "
    <html>
        <head></head>
        <body>
            <form action=\"updateattendi.php\" method=\"POST\">
                <input type=\"hidden\"  name=\"id\" value=\"".$row["id"]."\"/></br>
                FirstName:</br>
                <input type=\"text\"  name=\"FirstName\" value=\"".$row["firstname"]."\"/></br>
                LastName:</br>
                <input type=\"text\"  name=\"LastName\" value=\"".$row["lastname"]."\"/></br>
                ClinicName:</br>
                <input type=\"text\"  name=\"ClinicName\" value=\"".$row["clinicname"]."\"/></br>
                Country:</br>
                <input type=\"text\"  name=\"Country\" value=\"".$row["country"]."\"/></br>
                Mobile:</br>
                <input type=\"text\"  name=\"Mobile\" value=\"".$row["mobile"]."\"/></br>
                Email:</br>
                <input type=\"text\"  name=\"Email\" value=\"".$row["email"]."\"/></br>
                </br>
                <input type=\"submit\" value=\"Submit\" name=\"submit\" />
            </form>
        </body>
    </html>
    ";
}
if(isset($_GET["delete"]))
{
    $id = $_GET["delete"];
    $result =  $db->delete($id,$TableName);

    if($result)
    {
        header('Location: index.php');
        exit();
    }
    else
    {
        echo "<br>Error: Unable to Delete Attendi.";
    }

}
?>


