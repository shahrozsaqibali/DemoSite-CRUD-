<?php
require('Person.php');
class Speaker extends Person
{
    private $Designation;
    private $Specialization;
    private $Description;
    private $ImageDirectory;


    public function getImageDirectory()
    {
        return $this->ImageDirectory;
    }

    public function getDesignation()
    {
        return $this->Designation;
    }

    public function getSpecialization()
    {
        return $this->Specialization;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDesignation($designation)
    {
        $this->Designation = $designation;
    }

    
    public  function setSpecialization($specialization)
    {
        $this->Specialization = $specialization;
    }

    
    public function setDescription($description)
    {
        $this->Description = $description;
    }

    public function setImageDirectory($imagedirectory)
    {
        $this->ImageDirectory = $imagedirectory;
    }
}
?>