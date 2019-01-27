<?php

class DataBase{
    
   //Database Details
   private $username =  "root";
   private  $password=  "";
   private  $db= "demo01";
   private $host = "localhost";
 
    public function insertData($obj,$Query)
    {
       
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);    
        if($conn->connect_errno)
        {
            die("Connection Failed:". mysqli_connect_error());
        }
        else
        {
            $InsertQuery = $Query;                                                               
            if(mysqli_query($conn,$InsertQuery))
            {
                return true;
            }
            else
            {
                echo  mysqli_error($InsertQuery);
            }
        }
        mysqli_close($conn);
    }

    public function getCount($TableName)
    {
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);    

        if($conn->connect_errno)
        {
            die("Connection Failed:". mysqli_connect_error());
        }
        else
        {
            $countQuery = "SELECT count(*) AS total FROM $TableName";

            if(($result = mysqli_query($conn,$countQuery)) != null)
           {
                $values = mysqli_fetch_assoc($result);
                return $values['total'];
     
           }
           else
           {
               echo "Error: ". mysqli_error($countQuery);
           }
            
        }
        mysqli_close($conn);
    }

    public function displayData($id,$TableName)
    {
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);    

        if($conn->connect_errno)
        {
            die("Connection Failed:". mysqli_connect_error());
        }
        else
        {
            if(isset($id))
            {   
                $displayQuery = "SELECT * FROM $TableName WHERE id = $id";
                $result = mysqli_query($conn,$displayQuery);
                return $result;
                
            }else
            {
                $displayQuery = "SELECT * FROM $TableName";
                $result = mysqli_query($conn,$displayQuery);  
                return $result;
            }
        }
        mysqli_close($conn);
    }
     

    public function delete($AttendentID,$TableName)
    {
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);    

        if($conn->connect_errno)
        {
            die("Connection Failed:". mysqli_connect_error());
        }
        else
        {
            $deleteQuery = "DELETE FROM $TableName WHERE id = ".$AttendentID;;
           if(mysqli_query($conn,$deleteQuery))
           {
                return true;
           } 
           else
           {
                echo mysqli_error($conn);
                return false;
           }
        }
        mysqli_close($conn);
    }
    
    public function updateData($id,$TableName,$Query)
    {
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);    

        if($conn->connect_errno)
        {
            die("Connection Failed:". mysqli_connect_error());
        }
        else
        {
            $UpdateQuery = $Query;
            if(mysqli_query($conn,$UpdateQuery))
            {
                return true;
            }
            else
            {
                echo mysqli_error($conn);
                return false;
            }

        }
        mysqli_close($conn);
    }


    //Take CSV File Location as Parameter and Upload. NTOE : Require Field Customiztion based on File Passed as reference.
    public function insertCSVFile($FileDirectory)
    {   $currentrow = 0;
        $status = true;
        $row;
        $csv = fopen($FileDirectory,"r");
        //DataBase CONNECTION
        $conn = new mysqli($this->host,$this->username,$this->password,$this->db);    
        if($csv != NULL)
        {   
            while($row = fgetcsv($csv))
            {
                //EDIT AS PER CSV FIELDS
                $query = "INSERT INTO attendies(firstname,lastname,clinicname,country,mobile,email) VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]')";  
                //Error Handling. Checking Values are not empty
                $currentrow++;
               foreach($row as $value)
               {
                   
                   if($value == '')
                   {
                       $status = false;
                       break;
                   }
                   else
                   {
                       $status = true;
                   }
               }

               //Insert Data
               if($status == true)
               {
                    if(mysqli_query($conn,$query))
                    {
                        echo "<b>Added :</b> Row <b>".$currentrow."</b><br>";
                    }
                    else
                    {
                        echo mysqli_error($conn);
                        return false;
                    }    
               }
               else
               {
                    echo "<b>Error :</b>Fields are missing values at row <b> ".$currentrow . "</b><br>";
               }
            }
            fclose($csv);
            return true;
        }
        else
        {
            return false;
        }
    }

 }

?>