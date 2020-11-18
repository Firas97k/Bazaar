<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seller
 *
 * @author hsn99
 */
class Seller {
    
    private $sellerID;
    private $address;
    private $phoneNumber;
    private $email;
    private $username;
    private $password;
    private $numberOfAds;
    private $gender;
    private $age;
    private $firstName;
    private $lastName;
    
    private $ID;
    private $blocked;
    private $approve;
    private $status;
    private $image;
    
    function Seller($sellerID, $address, $phoneNumber, $email, $username, $password, $numberOfAds, $gender, $age, $firstName, $lastName, $ID, $blocked, $approve, $status, $image) {
        $this->sellerID = $sellerID;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->numberOfAds = $numberOfAds;
        $this->gender = $gender;
        $this->age = $age;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->ID = $ID;
        $this->blocked = $blocked;
        $this->approve = $approve;
        $this->status = $status;
        $this->image = $image;
    }
    
    
    // getters
    function getSellerID() {
        return $this->sellerID;
    }

    function getAddress() {
        return $this->address;
    }

    function getPhoneNumber() {
        return $this->phoneNumber;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getNumberOfAds() {
        return $this->numberOfAds;
    }

    function getGender() {
        return $this->gender;
    }

    function getAge() {
        return $this->age;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getID() {
        return $this->ID;
    }

    function getBlocked() {
        return $this->blocked;
    }

    function getApprove() {
        return $this->approve;
    }

    function getStatus() {
        return $this->status;
    }

    function getImage() {
        return $this->image;
    }

    function displayImage($img){
        echo '<img src="data:image;base64,'. base64_encode($img).'"/>';
    }

    
    // setters
    function setSellerID($sellerID): void {
        $this->sellerID = $sellerID;
    }

    function setAddress($address): void {
        $this->address = $address;
    }

    function setPhoneNumber($phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setUsername($username): void {
        $this->username = $username;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setNumberOfAds($numberOfAds): void {
        $this->numberOfAds = $numberOfAds;
    }

    function setGender($gender): void {
        $this->gender = $gender;
    }

    function setAge($age): void {
        $this->age = $age;
    }

    function setFirstName($firstName): void {
        $this->firstName = $firstName;
    }

    function setLastName($lastName): void {
        $this->lastName = $lastName;
    }

    function setID($ID): void {
        $this->ID = $ID;
    }

    function setBlocked($blocked): void {
        $this->blocked = $blocked;
    }

    function setApprove($approve): void {
        $this->approve = $approve;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function setImage($image): void {
        $this->image = $image;
    }



}
