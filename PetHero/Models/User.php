<?php
namespace Models;

class User{

    private $intId;
    private $strName;
    private $strLastName;
    private $strAddress;
    private $strCity;
    private $strGenre;
    private $strDni;
    private $strEmail;
    private $strPhone;
    private $strUserName;
    private $strPassword;
    private $bitActive;
    private $intIdOwner;
    private $intIdKeeper;

    public function SetId($id){
        $this->intId = $id;
    }
    public function SetName($name){
        $this->strName = $name;
    }
    public function SetLastName($lastName){
        $this->strLastName = $lastName;
    }
    public function SetAddress($address){
        $this->strAddress = $address;
    }
    public function SetCity($city){
        $this->strCity = $city;
    }
    public function SetGenre($genre){
        $this->strGenre = $genre;
    }
    public function SetDni($dni){
        $this->strDni = $dni;
    }
    public function SetEmail($email){
        $this->strEmail = $email;
    }
    public function SetPhone($phone){
        $this->strPhone = $phone;
    }
    public function SetUserName ($user){
        $this->strUserName = $user;
    }
    public function SetPassword($pass){
        $this->strPassword = $pass;
    }
    public function SetActive($active){
        $this->bitActive = $active;
    }
    public function SetIdOwner($idOwner){
        $this->intIdOwner = $idOwner;
    }
    public function SetIdKeeper($idKeeper){
        $this->intIdKeeper = $idKeeper;
    }

    public function GetId(){return $this->strId;}
    public function GetName(){return $this->strName;}
    public function GetLastName(){return $this->strLastName;}
    public function GetAddress(){return $this->strAddress;}
    public function GetCity(){return $this->strCity;}
    public function GetGenre(){return $this->strGenre;}
    public function GetDni(){return $this->strDni;}
    public function GetEmail(){return $this->strEmail;}
    public function GetPhone(){return $this->strPhone;}
    public function GetUserName(){return $this->strUserName;}
    public function GetPassword(){return $this->strPassword;}
    public function GetActive(){return $this->bitActive;}
    public function GetIdOwner(){return $this->intIdOwner;}
    public function GetIdKeeper(){return $this->intIdKeeper;}
}
?>