<?php

require('Person.php');

class Attendies extends Person
{
    private $Country;
    private  $Mobile;
    private $Email;


    public function getCountry()
    {
        return $this->Country;
    }

    public function getMobile()
    {
        return $this->Mobile;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setCountry($country)
    {
        $this->Country = $country;
    }

    public function setMobile($mobile)
    {
        $this->Mobile = $mobile;
    }
    
    public function setEmail($email)
    {
        $this->Email = $email;
    }
}
?>