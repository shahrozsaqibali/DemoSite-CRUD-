<?php

class Person
{
   private $FirstName;
   private $LastName;
   private $ClinicName;

    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function getClinicName()
    {
        return $this->ClinicName;
    }

    public function setFirstName($Name)
    {
        $this->FirstName = $Name;
    }
    
    public function setLastName($Name)
    {
        $this->LastName = $Name;
    }

    public function setClinicName($Clinic)
    {
        $this->ClinicName = $Clinic;
    }
}
?>