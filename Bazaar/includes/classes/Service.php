<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author hsn99
 */
class Service extends Advertising{
    
    private $ID;
    private $geographicalScope;
    private $experience;
    private $serviceTitle;
    
    function __Service($adNumber, $sellerID, $title, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images, $ID, $geographicalScope, $experience, $serviceTitle) {
        parent::Advertising($adNumber, $sellerID, $title, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images);
        $this->ID = $ID;
        $this->geographicalScope = $geographicalScope;
        $this->experience = $experience;
        $this->serviceTitle = $serviceTitle;
    }
    
    
    // getters
    function getID() {
        return $this->ID;
    }

    function getGeographicalScope() {
        return $this->geographicalScope;
    }

    function getExperience() {
        return $this->experience;
    }

    function getServiceTitle() {
        return $this->serviceTitle;
    }


    // setters
    function setID($ID): void {
        $this->ID = $ID;
    }

    function setGeographicalScope($geographicalScope): void {
        $this->geographicalScope = $geographicalScope;
    }

    function setExperience($experience): void {
        $this->experience = $experience;
    }

    function setServiceTitle($serviceTitle): void {
        $this->serviceTitle = $serviceTitle;
    }

    
    // get All data about service from database
    function getAllServiceDataByID($ID, $db): void{
        
        $SQLCode = 'SELECT * FROM service WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            $this->setExperience($result->experience);
            $this->setGeographicalScope($result->geographicalScope);
            $this->setID($result->ID);
            $this->setServiceTitle($result->serviceTitle);
        } else {
            echo 'there are no data about this service, ID'.$ID;
        }

    }
    
    // get specific data (specific column) about service from database
    function returnSpecificColumnFromServiceByID($ID, $columnName, $db){
        
        $SQLCode = 'SELECT '.$columnName.' FROM service WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            return $result->$columnName;
        } else {
            echo 'there is no '.$columnName.' about this service, ID = '.$ID;
        }
    }

}

