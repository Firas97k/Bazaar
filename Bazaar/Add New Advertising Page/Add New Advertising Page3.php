<?php
include '../includes/Classes/Advertising.php';
include '../includes/Classes/Vehicle.php';
include '../includes/Classes/RealEstate.php';
include '../includes/Classes/Service.php';
session_start();
$holder = $_SESSION["holder"];
$adType = $_SESSION["adType"];

if (isset($_POST['addAd'])) {

    switch ($adType) {
        case "vehicle":

            $holder->setDescription($_POST["LASTdescription"]);
            echo "Your Description is added!";
            break;

        case "realEstate":

            $holder->setDescription($_POST["LASTdescription"]);
            echo "Your Description is added!";
            break;

        case "service":
            $holder->setDescription($_POST["LASTdescription"]);
            echo "Your Description is added!";
            break;

        default:
            echo "Your Description is added!";
    }
    
    $_SESSION["holder"] = $holder;
    $_SESSION["adType"] = $adType;
    
    header("location: Insert_NewAD.php");
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
            <h2>Information of advertising: </h2>
        </header>

        <!-- end header -->

        <!-- start description -->

        <div class="description float_left">
            <h3>Description:</h3>
            <form method="post" class= "float_left" >
                <textarea name="LASTdescription" placeholder="Write Here..."></textarea>
                <input type="submit" value="Add Advertising " id="add" name="addAd" class="add_button"/>
            </form>
        </div>

        <!-- end description -->

        <!-- submit -->



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
