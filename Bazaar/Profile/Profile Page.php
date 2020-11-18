

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../layout/css/normalizer.css" />
    <link rel="stylesheet" href="../layout/css/framework.css"/>
    <link rel="stylesheet" href="../layout/css/navegation_css.css"/>
    <link rel="stylesheet" href="../layout/css/advertising container.css"/>
    <link rel="stylesheet" href="../layout/css/contact Us footer.css"/>
    <link rel="stylesheet" href="../layout/css/footer.css"/>
    <link rel="stylesheet" href="../layout/css/go up_css.css"/>
    <link rel="stylesheet" href="../layout/css/Profile Page_css.css"/>
</head>
<body>
    
    <?php 
        // navegation
        include '../includes/templates/navegation.php';
    ?> 

    <!-- start add advertising -->

    <div class="add float_left" id="add">
        <div>
            <div class="text_center">add new advertising</div>
            <div class="plus">
                <div class="lineV"></div>
                <div class="lineH"></div>
            </div>
        </div>
    </div>

    <!-- end add advertising -->

    <!-- start personal information -->

    <div class="person_info float_right">
        <h2>personal information</h2>
        <div class="person_img">
            <img>
        </div>
        <div class="person_attribute"></div>
    </div>

    <!-- end personal information -->


    <!-- start My ads -->

    <div class="my_ads float_left">
        <h2>my ads</h2>
    </div>
    
    <!-- end My ads-->
    
    <!-- start ad container -->
    
    <?php
//        for($i = 0; $i<7; $i++){
//            include '../includes/templates/advertising container.php';
//        }
    ?>

    <!-- end ad container -->

    <?php
        // add contact us at footer
        include '../includes/templates/contact Us footer.php';
        // add footer which has coopyright
        include '../includes/templates/footer.php';
        // add button to go up
        include '../includes/templates/go up.php';
    ?>

    <script src="../layout/javascript/Profile Page_js.js"></script>
    <script src="../layout/javascript/navegation.js"></script>
    <script src="../layout/javascript/advertising container.js"></script>
    <script src="../layout/javascript/go up_js.js"></script>
</body>
</html>