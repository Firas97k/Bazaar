<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehicle
 *
 * @author hsn99
 */
class Vehicle extends Advertising{
    
    private $type;
    private $year;
    private $color;
    private $interiorColor;
    private $fuel;
    private $odometer;
    private $gearNumber;
    private $VID;
    private $brand;
    private $model;
    private $driveType;
    private $gear;
    private $bodyType;
    private $engineCapacity;
    private $plateNationality;
    private $cylindersNumber;
    private $warranty;
    private $doorsNumber;
    private $vehicleTitle;
    private $vehicleRegistration;
    private $periodicInspection;
    private $passengers;
    private $fromWho;
    private $shipping;
    private $swap;
    private $condition;
    private $installments;
    
            
    function __Vehicle($adNumber, $sellerID, $title, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images, $type, $year, $color, $interiorColor, $fuel, $odometer, $gearNumber, $VID, $brand, $model, $driveType, $gear, $bodyType, $engineCapacity, $plateNationality, $cylindersNumber, $warranty, $doorsNumber, $vehicleTitle, $vehicleRegistration, $periodicInspection, $passengers, $fromWho, $shipping, $swap, $condition, $installments) {
        parent::Advertising($adNumber, $sellerID, $title, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images);
        $this->type = $type;
        $this->year = $year;
        $this->color = $color;
        $this->interiorColor = $interiorColor;
        $this->fuel = $fuel;
        $this->odometer = $odometer;
        $this->gearNumber = $gearNumber;
        $this->VID = $VID;
        $this->brand = $brand;
        $this->model = $model;
        $this->driveType = $driveType;
        $this->gear = $gear;
        $this->bodyType = $bodyType;
        $this->engineCapacity = $engineCapacity;
        $this->plateNationality = $plateNationality;
        $this->cylindersNumber = $cylindersNumber;
        $this->warranty = $warranty;
        $this->doorsNumber = $doorsNumber;
        $this->vehicleTitle = $vehicleTitle;
        $this->vehicleRegistration = $vehicleRegistration;
        $this->periodicInspection = $periodicInspection;
        $this->passengers = $passengers;
        $this->fromWho = $fromWho;
        $this->shipping = $shipping;
        $this->swap = $swap;
        $this->condition = $condition;
        $this->installments = $installments;
    }

    
    function getType() {
        return $this->type;
    }

    function getYear() {
        return $this->year;
    }

    function getColor() {
        return $this->color;
    }

    function getInteriorColor() {
        return $this->interiorColor;
    }

    function getFuel() {
        return $this->fuel;
    }

    function getOdometer() {
        return $this->odometer;
    }

    function getGearNumber() {
        return $this->gearNumber;
    }

    function getVID() {
        return $this->VID;
    }

    function getBrand() {
        return $this->brand;
    }

    function getModel() {
        return $this->model;
    }

    function getDriveType() {
        return $this->driveType;
    }

    function getGear() {
        return $this->gear;
    }

    function getBodyType() {
        return $this->bodyType;
    }

    function getEngineCapacity() {
        return $this->engineCapacity;
    }

    function getPlateNationality() {
        return $this->plateNationality;
    }

    function getCylindersNumber() {
        return $this->cylindersNumber;
    }

    function getWarranty() {
        return $this->warranty;
    }

    function getDoorsNumber() {
        return $this->doorsNumber;
    }

    function getVehicleTitle() {
        return $this->vehicleTitle;
    }

    function getVehicleRegistration() {
        return $this->vehicleRegistration;
    }

    function getPeriodicInspection() {
        return $this->periodicInspection;
    }

    function getPassengers() {
        return $this->passengers;
    }

    function getFromWho() {
        return $this->fromWho;
    }

    function getShipping() {
        return $this->shipping;
    }

    function getSwap() {
        return $this->swap;
    }

    function getCondition() {
        return $this->condition;
    }

    function getInstallments() {
        return $this->installments;
    }
    
    
    
    
    

    function setType($type): void {
        $this->type = $type;
    }

    function setYear($year): void {
        $this->year = $year;
    }
    
    function setColor($color): void {
        $this->color = $color;
    }

    
    function setInteriorColor($interiorColor): void {
        $this->interiorColor = $interiorColor;
    }

    function setFuel($fuel): void {
        $this->fuel = $fuel;
    }

    function setOdometer($odometer): void {
        $this->odometer = $odometer;
    }

    function setGearNumber($gearNumber): void {
        $this->gearNumber = $gearNumber;
    }

    function setVID($VID): void {
        $this->VID = $VID;
    }

    function setBrand($brand): void {
        $this->brand = $brand;
    }

    function setModel($model): void {
        $this->model = $model;
    }

    function setDriveType($driveType): void {
        $this->driveType = $driveType;
    }

    function setGear($gear): void {
        $this->gear = $gear;
    }

    function setBodyType($bodyType): void {
        $this->bodyType = $bodyType;
    }

    function setEngineCapacity($engineCapacity): void {
        $this->engineCapacity = $engineCapacity;
    }

    function setPlateNationality($plateNationality): void {
        $this->plateNationality = $plateNationality;
    }

    function setCylindersNumber($cylindersNumber): void {
        $this->cylindersNumber = $cylindersNumber;
    }

    function setWarranty($warranty): void {
        $this->warranty = $warranty;
    }

    function setDoorsNumber($doorsNumber): void {
        $this->doorsNumber = $doorsNumber;
    }

    function setVehicleTitle($vehicleTitle): void {
        $this->vehicleTitle = $vehicleTitle;
    }

    function setVehicleRegistration($vehicleRegistration): void {
        $this->vehicleRegistration = $vehicleRegistration;
    }

    function setPeriodicInspection($periodicInspection): void {
        $this->periodicInspection = $periodicInspection;
    }

    function setPassengers($passengers): void {
        $this->passengers = $passengers;
    }

    function setFromWho($fromWho): void {
        $this->fromWho = $fromWho;
    }

    function setShipping($shipping): void {
        $this->shipping = $shipping;
    }

    function setSwap($swap): void {
        $this->swap = $swap;
    }

    function setCondition($condition): void {
        $this->condition = $condition;
    }

    function setInstallments($installments): void {
        $this->installments = $installments;
    }


    // get All data about vehicle from database
    function getAllVehicleDataByID($ID, $db): void{
        
        $SQLCode = 'SELECT * FROM vehicle WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            $this->setBodyType($result->bodyType);
            $this->setBrand($result->brand);
            $this->setCondition($result->condition);
            $this->setCylindersNumber($result->cylindersNumber);
            $this->setDoorsNumber($result->doorsNumber);
            $this->setDriveType($result->driveType);
            $this->setEngineCapacity($result->engineCapacity);
            $this->setFromWho($result->fromWho);
            $this->setFuel($result->fuel);
            $this->setGear($result->gear);
            $this->setGearNumber($result->gearNumber);
            $this->setInstallments($result->installments);
            $this->setInteriorColor($result->interiorColor);
            $this->setModel($result->model);
            $this->setOdometer($result->odometer);
            $this->setPassengers($result->passengers);
            $this->setPeriodicInspection($result->periodicInspection);
            $this->setPlateNationality($result->plateNationality);
            $this->setShipping($result->shipping);
            $this->setSwap($result->swap);
            $this->setType($result->type);
            $this->setVID($result->VID);
            $this->setVehicleRegistration($result->vehicleRegistration);
            $this->setVehicleTitle($result->vehicleTitle);
            $this->setWarranty($result->warranty);
            $this->setYear($result->year);
        } else {
            echo 'there are no data about this vehicle, ID'.$ID;
        }        
               
    }
    
    // get specific data (specific column) about vehicle from database
    function returnSpecificColumnFromVehicleByID($ID, $columnName, $db){
        
        $SQLCode = 'SELECT '.$columnName.' FROM vehicle WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            return $result->$columnName;
        } else {
            echo 'there is no '.$columnName.' about this vehicle, ID = '.$ID;
        }
    }
}
