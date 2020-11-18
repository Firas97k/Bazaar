<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RealEstate
 *
 * @author hsn99
 */
class RealEstate extends Advertising{
    
    private $garageCapacity;
    private $extRoom;
    private $m2Net;
    private $m2Gross;
    private $placeStairs;
    private $front;
    private $airConditionSystem;
    private $fromWho;
    private $fees;
    private $swap;
    private $furnished;
    private $floorsNumber;
    private $type;
    private $RID;
    private $contractDuration;
    private $streetNumber;
    private $kitchen;
    private $buildingAge;
    private $yard;
    private $balcony;
    private $floorLocation;
    private $contractType;
    private $bathroomsNumber;
    
    function __RealEstate($adNumber, $sellerID, $title, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images, $garageCapacity, $extRoom, $m2Net, $m2Gross, $placeStairs, $front, $airConditionSystem, $fromWho, $fees, $swap, $furnished, $floorsNumber, $type, $RID, $contractDuration, $streetNumber, $kitchen, $buildingAge, $yard, $balcony, $floorLocation, $contractType, $bathroomsNumber) {
        parent::Advertising($adNumber, $sellerID, $title, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images);
        $this->garageCapacity = $garageCapacity;
        $this->extRoom = $extRoom;
        $this->m2Net = $m2Net;
        $this->m2Gross = $m2Gross;
        $this->placeStairs = $placeStairs;
        $this->front = $front;
        $this->airConditionSystem = $airConditionSystem;
        $this->fromWho = $fromWho;
        $this->fees = $fees;
        $this->swap = $swap;
        $this->furnished = $furnished;
        $this->floorsNumber = $floorsNumber;
        $this->type = $type;
        $this->RID = $RID;
        $this->contractDuration = $contractDuration;
        $this->streetNumber = $streetNumber;
        $this->kitchen = $kitchen;
        $this->buildingAge = $buildingAge;
        $this->yard = $yard;
        $this->balcony = $balcony;
        $this->floorLocation = $floorLocation;
        $this->contractType = $contractType;
        $this->bathroomsNumber = $bathroomsNumber;
    }

    //getters 
    function getGarageCapacity() {
        return $this->garageCapacity;
    }

    function getExtRoom() {
        return $this->extRoom;
    }

    function getM2Net() {
        return $this->m²Net;
    }

    function getM2Gross() {
        return $this->m²Gross;
    }

    function getPlaceStairs() {
        return $this->placeStairs;
    }

    function getFront() {
        return $this->front;
    }

    function getAirConditionSystem() {
        return $this->airConditionSystem;
    }

    function getFromWho() {
        return $this->fromWho;
    }

    function getFees() {
        return $this->fees;
    }

    function getSwap() {
        return $this->swap;
    }

    function getFurnished() {
        return $this->furnished;
    }

    function getFloorsNumber() {
        return $this->floorsNumber;
    }

    function getType() {
        return $this->type;
    }

    function getRID() {
        return $this->RID;
    }

    function getContractDuration() {
        return $this->contractDuration;
    }

    function getStreetNumber() {
        return $this->streetNumber;
    }

    function getKitchen() {
        return $this->kitchen;
    }

    function getBuildingAge() {
        return $this->buildingAge;
    }

    function getYard() {
        return $this->yard;
    }

    function getBalcony() {
        return $this->balcony;
    }

    function getFloorLocation() {
        return $this->floorLocation;
    }

    function getContractType() {
        return $this->contractType;
    }

    function getBathroomsNumber() {
        return $this->bathroomsNumber;
    }


    // setters
    function setGarageCapacity($garageCapacity): void {
        $this->garageCapacity = $garageCapacity;
    }

    function setExtRoom($extRoom): void {
        $this->extRoom = $extRoom;
    }

    function setM²Net($m²Net): void {
        $this->m²Net = $m²Net;
    }

    function setM²Gross($m²Gross): void {
        $this->m²Gross = $m²Gross;
    }

    function setPlaceStairs($placeStairs): void {
        $this->placeStairs = $placeStairs;
    }

    function setFront($front): void {
        $this->front = $front;
    }

    function setAirConditionSystem($airConditionSystem): void {
        $this->airConditionSystem = $airConditionSystem;
    }

    function setFromWho($fromWho): void {
        $this->fromWho = $fromWho;
    }

    function setFees($fees): void {
        $this->fees = $fees;
    }

    function setSwap($swap): void {
        $this->swap = $swap;
    }

    function setFurnished($furnished): void {
        $this->furnished = $furnished;
    }

    function setFloorsNumber($floorsNumber): void {
        $this->floorsNumber = $floorsNumber;
    }

    function setType($type): void {
        $this->type = $type;
    }

    function setRID($RID): void {
        $this->RID = $RID;
    }

    function setContractDuration($contractDuration): void {
        $this->contractDuration = $contractDuration;
    }

    function setStreetNumber($streetNumber): void {
        $this->streetNumber = $streetNumber;
    }

    function setKitchen($kitchen): void {
        $this->kitchen = $kitchen;
    }

    function setBuildingAge($buildingAge): void {
        $this->buildingAge = $buildingAge;
    }

    function setYard($yard): void {
        $this->yard = $yard;
    }

    function setBalcony($balcony): void {
        $this->balcony = $balcony;
    }

    function setFloorLocation($floorLocation): void {
        $this->floorLocation = $floorLocation;
    }

    function setContractType($contractType): void {
        $this->contractType = $contractType;
    }

    function setBathroomsNumber($bathroomsNumber): void {
        $this->bathroomsNumber = $bathroomsNumber;
    }

    
    // get All data about real estate from database
    function getAllRealEstateDataByID($ID, $db): void{
        
        $SQLCode = 'SELECT * FROM realEstate WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            $this->setAirConditionSystem($result->airConditionSystem);
            $this->setBalcony($result->balcony);
            $this->setBathroomsNumber($result->bathroomsNumber);
            $this->setBuildingAge($result->buildingAge);
            $this->setContractDuration($result->contractDuration);
            $this->setContractType($result->contractType);
            $this->setExtRoom($result->extRoom);
            $this->setFees($result->fees);
            $this->setFloorLocation($result->floorLocation);
            $this->setFloorsNumber($result->floorsNumber);
            $this->setFromWho($result->fromWho);
            $this->setFront($result->front);
            $this->setFurnished($result->furnished);
            $this->setGarageCapacity($result->garageCapacity);
            $this->setKitchen($result->kitchen);
            $this->setM²Gross($result->m²Gross);
            $this->setM²Net($result->m²Net);
            $this->setPlaceStairs($result->placeStairs);
            $this->setRID($result->RID);
            $this->setStreetNumber($result->streetNumber);
            $this->setSwap($result->swap);
            $this->setType($result->type);
            $this->setYard($result->yard);
        } else {
            echo 'there are no data about this real estate, ID'.$ID;
        }
    }
    
    // get specific data (specific column) about real estate from database
    function returnSpecificColumnFromRealEstateByID($ID, $columnName, $db){
        
        $SQLCode = 'SELECT '.$columnName.' FROM realEstate WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            return $result->$columnName;
        } else {
            echo 'there is no '.$columnName.' about this real estate, ID = '.$ID;
        }
    }

}
