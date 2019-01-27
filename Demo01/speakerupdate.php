<?php
require('Speaker.php');
require('DataBase.php');

$db = new DataBase();
$TableName = "speaker";
$speaker = new Speaker();

if(isset($_POST["submit"]))
{
    $db = new DataBase();
    $id = $_POST["id"];
    $speaker->setFirstName($_POST["FirstName"]);
    $speaker->setLastName($_POST["LastName"]);
    $speaker->setClinicName($_POST["ClinicName"]);
    $speaker->setDesignation( $_POST["designation"]);
    $speaker->setSpecialization( $_POST["specialization"]);
    $speaker->setDescription($_POST["description"]);

       $fname = $speaker->getFirstName();
        $lname = $speaker->getLastName();
        $cliname = $speaker->getClinicName();
        $dname = $speaker->getDesignation();
        $sname = $speaker->getSpecialization();
        $dsname = $speaker->getDescription();


    $Query = "UPDATE .$TableName SET firstname='$fname',lastname='$lname',clinicname='$cliname',designation='$dname',specialization='$sname',descript='$dsname' WHERE id=$id";
    
    $result = $db->updateData($id,$TableName,$Query); 
   
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
            <form action=\"speakerupdate.php\" method=\"POST\">
                <input type=\"hidden\"  name=\"id\" value=\"".$row["id"]."\"/></br>
                FirstName:</br>
                <input type=\"text\"  name=\"FirstName\" value=\"".$row["firstname"]."\"/></br>
                LastName:</br>
                <input type=\"text\"  name=\"LastName\" value=\"".$row["lastname"]."\"/></br>
                ClinicName:</br>
                <input type=\"text\"  name=\"ClinicName\" value=\"".$row["clinicname"]."\"/></br>
                Designation:</br>
                <input type=\"text\"  name=\"designation\" value=\"".$row["designation"]."\"/></br>
                Specialization:</br>
                <input type=\"text\"  name=\"specialization\" value=\"".$row["specialization"]."\"/></br>
                Description:</br>
                <input type=\"text\"  name=\"description\" value=\"".$row["descript"]."\"/></br>
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


