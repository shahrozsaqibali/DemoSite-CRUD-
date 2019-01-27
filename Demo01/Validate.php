<?php
class Validate
{

    //Takes Image Object, Image Name and Extention for Validation as a Parameter
    public function ImageValidity($Image,$FieldName,$Valid_File_Type)
    {
        if($Image[$FieldName]["size"] > 0 && $Image[$FieldName]["error"] == 0)
        {
            if($Image[$FieldName]["type"] == in_array($Image[$FieldName]["type"],$Valid_File_Type))
            {
                return true;
            }
            else
            {
                echo "<h2>Error: Invalid File Type Upload</h2><br><p>Make  Sure your File is in Jpeg,Jpg or Png Format and is Less than 3MB.</p>";
                return false;
            }

        }
        else
            {
                echo "<h2>Error: No File is Found or There is a File Issue.</h2><br><p>Make  Sure your File is in Jpeg,Jpg or Png Format and is Less than 3MB.</p>";
                return false;
            }

    }

    

}
?>
