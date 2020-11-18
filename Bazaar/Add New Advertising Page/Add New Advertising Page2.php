<?php
include '../includes/Classes/Advertising.php';
include '../includes/Classes/Vehicle.php';
include '../includes/Classes/RealEstate.php';
include '../includes/Classes/Service.php';

session_start();
$holder= $_SESSION["holder"];
$adType = $_SESSION["adType"];

if (isset($_POST['goTo'])) {
    
    switch ($adType) {
        case "vehicle":
            
            $holder->setType($_POST["vehicleType"]);
            $holder->setBrand($_POST["brand"]);
            $holder->setModel($_POST["model"]);
            $holder->setYear($_POST["year"]);
            $holder->setVehicleTitle($_POST["vehicleTitle"]);
            $holder->setCondition($_POST["condition"]);
            $holder->setOdometer($_POST["odometer"]);
            $holder->setColor($_POST["color"]);
            $holder->setInteriorColor($_POST["interiorColor"]);
            $holder->setFuel($_POST["fule"]);
            $holder->setPlateNationality($_POST["plateNationality"]);
            $holder->setVehicleRegistration($_POST["vehicleRegistration"]);
            $holder->setPeriodicInspection($_POST["periodicInspection"]);
            $holder->setGear($_POST["gear"]);
            $holder->setGearNumber($_POST["gearNumber"]);
            $holder->setBodyType($_POST["bodyType"]);
            $holder->setDoorsNumber($_POST["doorsNumber"]);
            $holder->setEngineCapacity($_POST["engineCapacity"]);
            $holder->setCylindersNumber($_POST["cylindersNumber"]);
            $holder->setWarranty($_POST["warranty"]);
            $holder->setInstallments($_POST["installments"]);
            $holder->setSwap($_POST["swapVehicle"]);
            $holder->setShipping($_POST["shipping"]);
            $holder->setFromWho($_POST["fromWhoVehicle"]);
            $holder->setPassengers($_POST["passengers"]);
            $holder->setDriveType($_POST["driveType"]);
            
            echo "Your Car was added!";
            break;

        case "realEstate":
            $holder->setType($_POST["realEstatType"]);
            $holder->setBalcony($_POST["balcony"]);
            $holder->setContractDuration($_POST["contractDuration"]);
            $holder->setYard($_POST["yard"]);
            $holder->setStreetNumber($_POST["streetNumber"]);
            $holder->setKitchen($_POST["kitchen"]);
            $holder->setRoomsNumber($_POST["roomsNumber"]);
            $holder->setFloorLocation($_POST["floorLocation"]);
            $holder->setBuildingAge($_POST["buildingAge"]);
            $holder->setContractType($_POST["contractType"]);
            $holder->setBathroomsNumber($_POST["bathroomsNumber"]);
            $holder->setFurnished($_POST["furnished"]);
            $holder->setFees($_POST["fees"]);
            $holder->setFromWho($_POST["fromWhoRealEstate"]);
            $holder->setSwap($_POST["swapRealEstate"]);
            $holder->setAirConditionSystem($_POST["airConditionSystem"]);
            $holder->setM2Net($_POST["m2Net"]);
            $holder->setM2Gross($_POST["m2Gross"]);
            $holder->setFront($_POST["front"]);
            $holder->setPlaceStairs($_POST["placeStairs"]);
            $holder->setExtRoom($_POST["extRoom"]);
            $holder->setGarageCapacity($_POST["garageCapacity"]);

            echo "Your RealEstate  is added!";
            break;

        case "service":
            $holder->setExperience($_POST["experience"]);
            $holder->setGeographicalScope($_POST["GeographicalScope"]);
            $holder->setServiceTitle($_POST["serviceTitle"]);
            
            echo "Your service is added!";
            break;
        
        default:
            echo "Your AD dosen't uploaded! , try again";
    }
    
    header("location: Add New Advertising Page3.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add New Advertising Page</title>
        <link rel="stylesheet" href="../layout/css/normalizer.css" />
        <link rel="stylesheet" href="../layout/css/framework.css"/>
        <link rel="stylesheet" href="../layout/css/navegation_css.css"/>
        <link rel="stylesheet" href="../layout/css/contact Us footer.css"/>
        <link rel="stylesheet" href="../layout/css/footer.css"/>
        <link rel="stylesheet" href="../layout/css/go up_css.css"/>
        <link rel="stylesheet" href="../layout/css/Add New Advertising Page_css.css"/>
    </head>
    <body>

        <?php
        // navegation
        include '../includes/templates/navegation.php';
        ?>  

        <!-- start header -->

        <header >
            <h2>information of advertising: </h2>
        </header>

        <!-- end header -->


        <!-- start info -->

        <div class="more_info float_right">
            <h4 class="text_center">more information</h4>
            <?php
            
            if ($adType == 'vehicle') {
                echo '            
            <!-- start form for cars -->
            <form class="cars" id="cars" method="post">                              
               

                 <label>Vehivle Type:</label>
                <select name="vehicleType" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Car">Car</option>
                    <option value="BUS 50 P">BUS 50 P</option>
                    <option value="BUS 30 P">BUS 30 P</option>
                    <option value="BUS 15 P">BUS 15 P</option>
                    <option value="Truck">Truck</option>
                    <option value="Motorcycle">Motorcycle</option>
                </select>

                <label>Brand:</label>
                <select name="brand" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="BMW">BMW</option>                    
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Ford">Ford</option>
                    <option value="GMC">GMC</option>
                    <option value="Dodge">Dodge</option>
                    <option value="Cadillac">Cadillac</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Audi">Audi</option>
                    <option value="Tesla">Tesla</option>
                    <option value="Buick">Buick</option>
                    <option value="Infiniti">Infiniti</option>
                    <option value="Lincoln">Lincoln</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Rolls-Royce">Rolls-Royce</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Kia">Kia</option>
                    <option value="HAVAL">HAVAL</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Volvo">Volvo</option>                
                    <option value="Chrysler">Chrysler</option>
                    <option value="Fiat">Fiat</option>
                    <option value="Hummer">Hummer</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="MG">MG</option>
                    <option value="Daihatsu">Daihatsu</option>
                    <option value="Honda">Honda</option>
                    <option value="Jeep">Jeep</option>
                    <option value="LandRover">Land Rover</option>
                    <option value="Mercury">Mercury</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Pontiac">Pontiac</option>
                   </select>


                <label>Model: </label>
                <input type="text" name="model"/>

                <label>Year:</label>
                <input type="Numbre" name="year"/>

                <label>Vehicle Title:</label>
                <input type="text" name="vehicleTitle"/>

                <label>Condition:</label>
                <input type="text" name="condition"/>

                <label>Odometer:</label>
                <input type="text" name="odometer"/>

                <label>Color:</label>
                <input type="text" name="color"/>

                <label>Interior Color:</label>
                <input type="text" name="interiorColor"/>

                <label>Fuel:</label>
                <select name="fule" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Gas">Gas</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                    <option value="Hybrid">Hybrid</option>
                </select>

                <label>Plate Nationality:</label>
                <input type="text" name="plateNationality"/>
                
                <label>Vehicle Registration:</label>
                <select name="vehicleRegistration" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="New">New</option>
                    <option value="Expired">Expired</option>
                </select>

                <label>Periodic Inspection:</label>
                <select name="periodicInspection" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="New">New</option>
                    <option value="Expired">Expired</option>
                </select>

                
                <label>Gearbox Type:</label>
                <select name="gear" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Auto">Auto</option>
                    <option value="Manual">Manual</option>
                    <option value="Tiptronic">Tiptronic</option>
                </select>
                
                <label>Gearbox Number:</label>
                <input type="number" name="gearNumber"/>

                <label>Body Type:</label>
                <select name="bodyType" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Sedan">SEDAN</option>
                    <option value="SUV">SUV</option>
                    <option value="PICKUP">PICKUP</option>                    
                    <option value="TRUCK">TRUCK</option>                    
                    <option value="Coupe">COUPE</option>
                    <option value="Van">VAN</option>
                    <option value="SportCar">SPORT CAR</option>
                    <option value="WAGON">STATION WAGON</option>
                    <option value="HATCHBACK">HATCHBACK</option>
                </select>

                <label>Number of Doors:</label>
                <input type="number" name="doorsNumber"/>

                <label>Engine Capacity (cc - m3):</label>
                <input type="mumber" name="engineCapacity"/>
                
                <label>Number of Cylinders: </label>
                <select name="cylindersNumber" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="3">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                </select>
                
                   <label>Warranty:</label>
                <select name="warranty" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="New">New</option>
                    <option value="Expired">Expired</option>
                </select>


                   <label>Installments:</label>
                <select name="installments" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">NO</option>
                </select>
               
                <label>Swap:</label>
                <select name="swapVehicle" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">NO</option>
                </select>
                
                <label>Shipping:</label>
                <select name="shipping" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">NO</option>
                </select>

                
                <label>From who:</label>
                <select name="fromWhoVehicle" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Owner</option>
                    <option value="CarShowroom">Car Showroom</option>
                    <option value="carAgency">Car Agency</option>
                    <option value="RentalShop">Rental Shop</option>
                </select>

                <label>Passengers:</label>
                <input type="text" name="passengers"/>

                <label>Drive type:</label>
                <select name="driveType" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="RWD">Rear-Wheel Drive</option>
                    <option value="FWD">Front-Wheel Drive</option>
                    <option value="CFWD">Continuous Four-Wheel drive</option>
                    <option value="4x4">4X4</option>
                    <option value="6x6">6X6</option>
                   </select>

                <input type="submit" name="goTo" value="Next --->"/>
                
            </form>
            <!-- end form for cars -->';
                
            } elseif ($adType == 'realEstate') {
                echo '
            
            <!-- start form for homes -->
            <form class="homes" id="homes" method="post">
               
                <label>Duration Contract:</label>
                <input type="text" name="contractDuration" required/>
                
                <label>Yard: </label>
                <select name="yard" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">NO</option>
                </select>
                
                <label>RealEstat type:</label>
                <select name="realEstatType" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="villa">Villa</option>
                    <option value="flat">Flat </option>
                    <option value="land">Land</option>
                    <option value="fram">Fram</option>
                    <option value="gasStation">Gas station</option>
                    <option value="residentialBuilding">Residential Building</option>
                    <option value="weddingHall">Wedding hall</option>
                    <option value="eventHall">Event hall</option>
                    <option value="shop&Store">shop & Store</option>
                    <option value="warehouse"Warehouse</option>
                    <option value="sesturant">Resturant</option>
                    <option value="office">Office</option>
                    <option value="parkingSpot&Garage">Parking spot & Garage</option>
                    <option value="clinic">Clinic</option>
                    <option value="manufacturingFacility">Manufacturing facility</option>
                    <option value="workshop">Workshop</option>
                    <option value="animalBarn">Animal barn</option>
                    <option value="carShowroom">Car showroom</option>
                    <option value="carShowroom">Hotel</option>
                </select>
                
                
                <label>Number of Street:</label>
                <input type="number" name="streetNumber" required/>

                <label>Number of rooms:</label>
                <input type="number" name="roomsNumber" required/>
                
                <label>Kitchen:</label>
                <input type="nmuber" name="kitchen" required/>
                
                <label>Floor Location:</label>
                <input type="number" name="floorLocation" required/>
                
                <label>Building Age:</label>
                <input type="number" name="buildingAge" required/>
                
                <label>Contract Type:</label>
                <input type="text" name="contractType" required/>
                
                <label>Bathrooms Number:</label>
                <input type="number" name="bathroomsNumber" required/>
                
                <label>Furnished:</label>
                <select name="furnished" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Yes Full</option>
                    <option value="YesPart">Yes Parts</option>
                    <option value="YesAirConditions">Yes Only AirConditions</option>
                    <option value="No">NO</option>
                </select>

                <label>Fees:</label>
                <select name="fees" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="yesBoker ">Yes Boker </option>
                    <option value="YesOffice">Yes Office</option>
                    <option value="NO">NO</option>
                </select>
                
                <label>Balcony:</label>
                <select name="balcony" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="yes">Yes</option>
                    <option value="NO">No</option>
                </select>
                
                
                <label>From Who:</label>
                <select name="fromWhoRealEstate" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Owner</option>
                    <option value="carAgency">Office</option>
                    <option value="RentalShop">Rental shop</option>
                </select>
             
                
                <label>Swap:</label>
                <select name="swapRealEstate" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">NO</option>
                </select>
                
                <label>AirCondition System:</label>
                <select name="airConditionSystem" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="normal">Normal</option>
                    <option value="central">Central air-conditioning</option>
                </select>
                
                <label>Area Net (m²):</label>
                <input type="number" name="m2Net" required/>
                
                <label>Area Gross  (m²):</label>
                <input type="number" name="m2Gross" required/>
                
                <label>Front:</label>
                <input type="text" name="front" required/>
                
                <label>Place Stairs:</label>
                <select name="placeStairs" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="internal">Internal</option>
                    <option value="external">External</option>
                    <option value="NoStairs">NO Stairs</option>
                </select>
                
                <label>Exit Room:</label>
                <select name="extRoom" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="YesFloor">Yes in floor</option>
                    <option value="YesYard">Yes in yard</option>
                    <option value="YesYard">Yes in yard & floor</option>
                    <option value="No">NO</option>
                </select>

                <label>Garage Capacity (m²):</label>
                <input type="number" name="garageCapacity" required/>
                
                <input type="submit" name="goTo" value="Next --->"/>
            </form>
            <!-- end form for homes -->';
                
            } elseif ($adType == 'service') {
                echo '            
             <!-- start form for services -->
            <form class="services" id="services" method="post">
               
                <label>Years Experience:</label>
                <input type="number" name="experience" required/>
                
                <label>Geographical Scope:</label>
                <input type="text" name="GeographicalScope" required/>
                
                <label>Service Title:</label>
                <input type="text" name="serviceTitle" required/>
                
                <input type="submit" name="goTo" value="Next --->"/>

            </form>
            <!-- end form for services -->';
            }

//                header("location: Add New Advertising Page3.php");
            ?>


        </div>


        <!-- end info -->




        <?php
// add contact us at footer
        include '../includes/templates/contact Us footer.php';
// add footer which has coopyright
        include '../includes/templates/footer.php';
// add button to go up
        include '../includes/templates/go up.php';
        ?>

        <script src="../layout/javascript/Add New Advertising Page_js.js"></script>
        <script src="../layout/javascript/navegation.js"></script>
        <script src="../layout/javascript/images slider.js"></script>
        <script src="../layout/javascript/go up_js.js"></script>
    </body>
</html>

