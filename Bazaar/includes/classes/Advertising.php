<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Advertising
 *
 * @author hsn99
 */
class Advertising {
    
    private $adNumber;
    private $sellerID;
    private $advertisingTitle;
    private $owner;
    private $adType;
    private $description;
    private $status;
    private $blocked;
    private $approve;
    private $comment;
    private $date;
    private $price;
    private $city;
    private $phoneNumber;
    private $images = [];
            
    function __Advertising($adNumber, $sellerID, $advertisingTitle, $owner, $adType, $description, $status, $blocked, $approve, $comment, $date, $price, $city, $phoneNumber, $images) {
        $this->adNumber = $adNumber;
        $this->sellerID = $sellerID;
        $this->advertisingTitle = $advertisingTitle;
        $this->owner = $owner;
        $this->adType = $adType;
        $this->description = $description;
        $this->status = $status;
        $this->blocked = $blocked;
        $this->approve = $approve;
        $this->comment = $comment;
        $this->date = $date;
        $this->price = $price;
        $this->city = $city;
        $this->phoneNumber = $phoneNumber;
        for($i = 0; $i<5; $i++){
            $this->images[$i] = $images[$i];
        }
       
    }


    // getters -----------------------------------------------------------------
    function getAdNumber() {
        return $this->adNumber;
    }

    function getSellerID() {
        return $this->sellerID;
    }
    
    function getAdvertisingTitle() {
        return $this->advertisingTitle;
    }

    
    function getOwner() {
        return $this->owner;
    }

    function getAdType() {
        return $this->adType;
    }

    function getDescription() {
        return $this->description;
    }

    function getStatus() {
        return $this->status;
    }

    function getBlocked() {
        return $this->blocked;
    }

    function getApprove() {
        return $this->approve;
    }

    function getComment() {
        return $this->comment;
    }

    function getDate() {
        return $this->date;
    }

    function getPrice() {
        return $this->price;
    }

    function getCity() {
        return $this->city;
    }

    function getPhoneNumber() {
        return $this->phoneNumber;
    }
    
    function getImages() {
        return $this->images;
    }
    
    function displayImage($img){
        echo '<img src="data:image;base64,'. base64_encode($img).'"/>';
        
    }

    // setters ----------------------------------------------------------------
    
    function setAdNumber($adNumber): void {
        $this->adNumber = $adNumber;
    }

    function setSellerID($sellerID): void {
        $this->sellerID = $sellerID;
    }

    function setOwner($owner): void {
        $this->owner = $owner;
    }

    function setAdType($adType): void {
        $this->adType = $adType;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function setBlocked($blocked): void {
        $this->blocked = $blocked;
    }

    function setApprove($approve): void {
        $this->approve = $approve;
    }

    function setComment($comment): void {
        $this->comment = $comment;
    }

    function setDate($date): void {
        $this->date = $date;
    }

    function setPrice($price): void {
        $this->price = $price;
    }

    function setCity($city): void {
        $this->city = $city;
    }

    function setPhoneNumber($phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }

    function setImages($image, $index): void {
        $this->images[$index] = $image;
    }
    
    function setAdvertisingTitle($advertisingTitle): void {
        $this->advertisingTitle = $advertisingTitle;
    }

    
    

    // get All data about advertising from database
    function getAllAdvertisingDataByID($ID, $db): void{
        
        $SQLCode = 'SELECT * FROM advertising WHERE ad_Number = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        $result = $statement->fetch();
        if($result){
            $this->setAdNumber($result->ad_number);
            $this->setAdType($result->type);
            $this->setApprove($result->approve);
            $this->setBlocked($result->blocked);
            $this->setCity($result->city);
            $this->setComment($result->comment);
            $this->setDate($result->date);
            $this->setDescription($result->description);
            $this->setOwner($result->owner);
            $this->setPhoneNumber($result->phone_number);
            $this->setPrice($result->price);
            $this->setSellerID($result->seller_ID);
            $this->setStatus($result->status);
            $this->setAdvertisingTitle($result->title);
        }else{
            echo 'there are no data about this advertising, ID = '.$ID;
        }
                
        // get images 
        $SQLCodeForImages = 'SELECT image FROM advertising_images WHERE ad_Number = ?';
        $statementForImages = $db->prepare($SQLCodeForImages);
        $statementForImages->execute([$ID]);

        $images = $statementForImages->fetchAll();
        
        for($i = 0; $i<5; $i++){
            $this->setImages($images[$i]->image, $i);
        }
        
        
    }
    
    // get All data about advertising for a specific seller from database
    function getAllAdvertisingDataBySellerID($ID, $db): void{
        
        $SQLCode = 'SELECT * FROM advertising WHERE sellerID = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        $result = $statement->fetch();
        if($result){
            $this->setAdNumber($result->adNumber);
            $this->setAdType($result->adType);
            $this->setApprove($result->approve);
            $this->setBlocked($result->blocked);
            $this->setCity($result->city);
            $this->setComment($result->comment);
            $this->setDate($result->date);
            $this->setDescription($result->description);
            $this->setOwner($result->owner);
            $this->setPhoneNumber($result->phoneNumber);
            $this->setPrice($result->price);
            $this->setSellerID($result->sellerID);
            $this->setStatus($result->status);
            $this->setTitle($result->title);
        }else{
            echo 'there are no data about this advertising, ID = '.$ID;
        }
                
        // get images 
        $SQLCodeForImages = 'SELECT image FROM advertising_images WHERE adNumber = ?';
        $statementForImages = $db->prepare($SQLCodeForImages);
        $statementForImages->execute([$result->adNumber]);
        
        $images = $statementForImages->fetchAll();
        
        if($images){
            foreach($images as $img){
                $i = 0;
                $this->setImages($img->image, $i);
                $i++;
            }
        }else{
            echo 'there are no Images about this advertising, ID = '.$ID;
        }
    }
    
    // get specific data (specific column) about advertising from database
    function returnSpecificColumnFromAdvertisingByID($ID, $columnName, $db){
        
        $SQLCode = 'SELECT '.$columnName.' FROM advertising WHERE adNumber = ?';
        
        $statement = $db->prepare($SQLCode);
        $statement->execute([$ID]);
        
        $result = $statement->fetch();
        if($result){
            return $result->$columnName;
        } else {
            echo 'there is no '.$columnName.' about this advertising, ID = '.$ID;
        }
    }

}
