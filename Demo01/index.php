<?php
include("header.php"); 
require('DataBase.php');
$db = new DataBase();
$AttendiTable = "attendies";
$SpeakerTable = "speaker";

$NumberofSpeaker = $db->getCount($SpeakerTable);
$NumberofAttendies = $db->getCount($AttendiTable);
echo "<br>";
echo  "Total Speaker : ". $NumberofSpeaker;
echo  "</br>Total Attendenies : ". $NumberofAttendies;
$id = NULL;

$AttendentData = $db->displayData($id,$AttendiTable);
$SpeakerData = $db->displayData($id,$SpeakerTable);

?>
<html>
    <head>
    </head>
    <body>
        <table border="1">
            <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Clinic Name</td>
                <td>Country</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>EDIT</td>
            </tr>
        <?php
        while($row = mysqli_fetch_array($AttendentData))
        {
            echo "<tr>
            <td>".$row["firstname"]."</td>
            <td>".$row["lastname"]."</td>
            <td>".$row["clinicname"]."</td>
            <td>".$row["country"]."</td>
            <td>".$row["mobile"]."</td>
            <td>".$row["email"]."</td>
            <td><a href=\"updateattendi.php?update=".$row["id"]."\">UPDATE</a></td>
            <td><a href=\"updateattendi.php?delete=".$row["id"]."\">DELETE</a></td>
            </tr>
            ";
        } ?>
        </thead>
        </table>

        <hr>
        <h3>Speaker Data</h3>
  
        <table border="1">
            <thead>
            <tr>
                <td>Picture</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Clinic Name</td>
                <td>Designation</td>
                <td>Specialization</td>
                <td>Description</td>
            </tr>
        <?php
        while($row = mysqli_fetch_array($SpeakerData))
        {
            echo "<tr>
            <td><img src = ".$row["imgurl"]." width=\"200\" height=\"200\" /></td>
            <td>".$row["firstname"]."</td>
            <td>".$row["lastname"]."</td>
            <td>".$row["clinicname"]."</td>
            <td>".$row["designation"]."</td>
            <td>".$row["specialization"]."</td>
            <td>".$row["descript"]."</td>
            <td><a href=\"speakerupdate.php?update=".$row["id"]."\">UPDATE</a></td>
            <td><a href=\"speakerupdate.php?delete=".$row["id"]."\">DELETE</a></td>
            </tr>
            ";
        } ?>
        </thead>
        </table>
  
    </body>
</html>
            











