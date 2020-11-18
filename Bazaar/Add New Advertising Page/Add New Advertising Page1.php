<?php
include '../includes/Classes/Advertising.php';
include '../includes/Classes/Vehicle.php';
include '../includes/Classes/RealEstate.php';
include '../includes/Classes/Service.php';


if (isset($_POST['goTo'])) {
    
    $adType = trim($_POST['adType']);
    
    switch ($adType) {
        case "vehicle":
            $holder = new Vehicle();
            break;
        
        case "realEstate":
            $holder = new RealEstate();
            break;
        
        case "service":
            $holder = new Service();
            break;
        
        default:
    }
    
    $holder->setAdvertisingTitle($_POST["advertisingTitle"]);
    $holder->setPhoneNumber($_POST["phoneNumber"]);
    $holder->setCity($_POST["city"]);
    $holder->setPrice($_POST["price"]);
    $holder->setOwner($_POST["owner"]);
    $holder->setAdType($_POST["adType"]);
    
    for($i = 0; $i<5; $i++){
        $image = file_get_contents($_FILES['images']['tmp_name'][$i]);
        $holder->setImages($image, $i);
    }
            
            
    session_start();
    $_SESSION["holder"] = $holder;
    $_SESSION["adType"] = $adType;
    
    header("location: Add New Advertising Page2.php");
   
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


        <div class="public_info float_left">
            <h4 class="text_center">public information</h4>
            <form  method="post" id="x" enctype="multipart/form-data" required>

                <label>Advertising title: </label>
                <input type="text" name="advertisingTitle" required/>

                <label>Phone Number:</label>
                <input type="text" name="phoneNumber" required/>

                <label>City:</label>
                <input type="text" name="city" required/>

                <label>Price:</label>
                <input type="text" name="price" required/>

                <label>Owner:</label>
                <input type="text" name="owner" required/>

                <label>Type Of Advertising:</label>
                <select name="adType" id="select" required>
                    <option hidden selected>Select one...</option>
                    <option value="vehicle">Vehicle</option>
                    <option value="realEstate">Real Estate</option>
                    <option value="service">Service</option>
                </select>

                <label >Images Of Advertising:</label>
                <input type="file" id="image_uploads" name="images[]" multiple="multiple" accept="image/*" required/>
                <div class="click text_center">Click Here To Choose Images - Just 5</div>
                <div class="preview">
                    <p>No files currently selected for upload</p>
                </div>

                <input type="submit" name="goTo" value="Next --->"/>

            </form>
        </div>


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
