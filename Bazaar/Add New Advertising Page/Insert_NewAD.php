<?php
include '../includes/Classes/Advertising.php';
include '../includes/Classes/Vehicle.php';
include '../includes/Classes/RealEstate.php';
include '../includes/Classes/Service.php';

session_start();

$holder = $_SESSION["holder"];
$adType = $_SESSION["adType"];
$sellerID = $_SESSION["sellerID"];

##$##  Advertising ##$##
$parameter_AdvertisingTitle = $holder->getAdvertisingTitle();
$parameter_PhoneNumber      = $holder->getPhoneNumber();
$parameter_City             = $holder->getCity();
$parameter_Price            = $holder->getPrice();
$parameter_Owner            = $holder->getOwner();
$parameter_AdType           = $holder->getAdType();
$parameter_Description      = $holder->getDescription();
$parameter_Images           = $holder->getImages();
        
    try{
    // connact to database
    include '../includes/classes/Database.php';
    $pdo = new Database('localhost', 'root', '', 'bazaar');
    $db = $pdo->startConnact();
    echo " Conected to DB ";

    // insert data of advertising
    $advertisingSQLCode = 'INSERT INTO advertising (seller_ID ,title, phone_number, city, price ,owner ,type, description)'
            . ' VALUES (?, ?, ?, ?, ? ,? ,?, ?)';
    $stmtAdvertising = $db->prepare($advertisingSQLCode);
    $stmtAdvertising->execute([$sellerID, $parameter_AdvertisingTitle, $parameter_PhoneNumber, $parameter_City, $parameter_Price, $parameter_Owner, $parameter_AdType, $parameter_Description]);
    echo "advertising data is uploaded to DB". "<br/>";

    // to get id of this ad     
    $getAdvertisingIDSQLCode = "SELECT MAX(ad_number) FROM advertising WHERE seller_ID = ?;"; 
    $stmtGetAdvertisingID = $db->prepare($getAdvertisingIDSQLCode); 
    $stmtGetAdvertisingID->execute([$sellerID]);
    $adNumber = $stmtGetAdvertisingID->fetchColumn();

    // insert images 
    $SQLAdvertisingImagesCode  = 'INSERT INTO advertising_images (image, ad_number)'
            . 'VALUES (?, ?),(?, ?),(?, ?),(?, ?),(?, ?);';

    $stmtAdvertisingImages = $db->prepare($SQLAdvertisingImagesCode);
    $stmtAdvertisingImages->execute([$parameter_Images[0], $adNumber, $parameter_Images[1], $adNumber, $parameter_Images[2], $adNumber, $parameter_Images[3], $adNumber, $parameter_Images[4], $adNumber]);                


    if ($adType == "vehicle") {
                          # VEHICLE #
                      # *#############* # 
            $parameter_brand = $holder->getBrand();
            $parameter_model = $holder->getModel();
            $parameter_year = $holder->getYear();
            $parameter_type = $holder->getType();
            $parameter_vehicleTitle = $holder->getVehicleTitle();
            $parameter_condition = $holder->getCondition();
            $parameter_odometer = $holder->getOdometer();
            $parameter_interiorColor = $holder->getInteriorColor();
            $parameter_Color = $holder->getColor();
            $parameter_plateNationality = $holder->getPlateNationality();
            $parameter_vehicleRegistration = $holder->getVehicleRegistration();
            $parameter_periodicInspection = $holder->getPeriodicInspection();
            $parameter_gear = $holder->getGear();
            $parameter_gearNumber = $holder->getGearNumber();
            $parameter_bodyType = $holder->getBodyType();
            $parameter_doorsNumber = $holder->getDoorsNumber();
            $parameter_engineCapacity = $holder->getEngineCapacity();
            $parameter_cylindersNumber = $holder->getCylindersNumber();
            $parameter_warranty = $holder->getWarranty();
            $parameter_installments = $holder->getInstallments();
            $parameter_swap = $holder->getSwap();
            $parameter_shipping = $holder->getShipping();
            $parameter_fromWhoVehicle = $holder->getFromWho();
            $parameter_passengers = $holder->getPassengers();
            $parameter_driveType = $holder->getDriveType();
            $parameter_fuel = $holder->getFuel();
        $SQLVehicleCode = 'INSERT INTO vehicle (ad_number, brand , model , year , type , vehicle_title , vehicle_condition ,'
                . ' odometer, color, interior_color ,Fuel ,plate_nationality ,vehicle_registration '
                . ',periodic_inspection ,Gear ,number_of_gears,body_type ,number_of_doors ,engine_capacity ,'
                . 'number_of_cylinders ,Warranty ,Installments,swap,Shipping ,from_who ,passengers ,drive_type ) '
                . 'VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $db->prepare($SQLVehicleCode);
        $stmt->execute([$adNumber, $parameter_brand, $parameter_model, $parameter_year, $parameter_type, $parameter_vehicleTitle,
            $parameter_condition, $parameter_odometer, $parameter_Color, $parameter_interiorColor,
            $parameter_fuel, $parameter_plateNationality, $parameter_vehicleRegistration, $parameter_periodicInspection,
            $parameter_gear, $parameter_gearNumber, $parameter_bodyType, $parameter_doorsNumber,
            $parameter_engineCapacity, $parameter_cylindersNumber, $parameter_warranty, $parameter_installments,
            $parameter_swap, $parameter_shipping, $parameter_fromWhoVehicle, $parameter_passengers, $parameter_driveType]);
            echo "vehicle data is uploaded to DB". "<br/> ";

    }if ($adType == "realEstate") {
                          #  HOMES  #
                      # * ########### * #
            $parameter_ContractDuration = $holder->getContractDuration();
            $parameter_TypeHome = $holder->getType();
            $parameter_Balcony = $holder->getBalcony();
            $parameter_Yard = $holder->getYard();
            $parameter_NumberOfRooms = $holder->getRoomsNumber();
            $parameter_StreetNumber = $holder->getStreetNumber();
            $parameter_Kitchen = $holder->getKitchen();
            $parameter_FloorLocation = $holder->getFloorLocation();
            $parameter_BuildingAge = $holder->getBuildingAge();
            $parameter_ContractType = $holder->getContractType();
            $parameter_FloorsNumber = $holder->getFloorsNumber();
            $parameter_BathroomsNumber = $holder->getBathroomsNumber();
            $parameter_Furnished = $holder->getFurnished();
            $parameter_Fees = $holder->getFees();
            $parameter_FromWhoHomes = $holder->getFromWho();
            $parameter_swap = $holder->getSwap();
            $parameter_AirConditionSystem = $holder->getAirConditionSystem();
            $parameter_M2Gross = $holder->getM2Gross();
            $parameter_Front = $holder->getFront();
            $parameter_PlaceStairs = $holder->getPlaceStairs();
            $parameter_ExtRoom = $holder->getExtRoom();
            $parameter_GarageCapacity = $holder->getGarageCapacity();
            $parameter_M2Net = $holder->getM2Net();

        $SQLHomesCode = 'INSERT INTO real_estates (ad_number , type, number_of_rooms , number_of_bathrooms, kitchen,'
                . ' ext_room, air_condition_system, place_stairs, yard, balacon, garage_capacity, furnished, front,'
                . ' number_of_floors, floor_location, building_age, number_of_street, m2_Net, m2_Gross, swap,'
                . ' from_who, contract_type, fees, contract_duration) '
                . 'VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $db->prepare($SQLHomesCode);
        $stmt->execute([ $adNumber, $parameter_TypeHome, $parameter_NumberOfRooms, $parameter_BathroomsNumber, $parameter_Kitchen ,
            $parameter_ExtRoom, $parameter_AirConditionSystem, $parameter_PlaceStairs, $parameter_Yard, $parameter_Balcony,
            $parameter_GarageCapacity, $parameter_Furnished, $parameter_Front, $parameter_FloorsNumber, $parameter_FloorLocation,
            $parameter_BuildingAge, $parameter_StreetNumber, $parameter_M2Net, $parameter_M2Gross, $parameter_swap, $parameter_FromWhoHomes,
            $parameter_ContractType, $parameter_Fees, $parameter_ContractDuration]);
            echo "Real Estat data is uploaded to DB". "<br/> ";

    }if ($adType == "service") {
                            # Service #
                        # * ########### * #
            $parameter_Experience = $holder->getExperience();
            $parameter_GeographicalScope = $holder->getGeographicalScope();
            $parameter_ServiceTitle = $holder->getServiceTitle();

            $SQLServiceCode = 'INSERT INTO service(ad_number, service_title, experience, geographicals_scope) VALUES (?,?,?,?)';
        $stmt = $db->prepare($SQLVehicleCode);
        $stmt->execute([$adNumber, $parameter_ServiceTitle, $parameter_Experience, $parameter_GeographicalScope]);
        echo "service data is uploaded to DB". "<br/> ";
    }
    
     header("location: ../Profile/Profile Page.php");
}
catch (Exception $exc) { echo  "There is a problem. Error is : ". "<br/> ". $exc; }
?>
