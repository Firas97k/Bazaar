

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertising Page</title>
    <link rel="stylesheet" href="../layout/css/normalizer.css" />
    <link rel="stylesheet" href="../layout/css/framework.css"/>
    <link rel="stylesheet" href="../layout/css/navegation_css.css"/>
    <link rel="stylesheet" href="../layout/css/contact Us footer.css"/>
    <link rel="stylesheet" href="../layout/css/footer.css"/>
    <link rel="stylesheet" href="../layout/css/go up_css.css"/>
    <link rel="stylesheet" href="../layout/css/Advertising page_css.css"/>
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

    <!-- start images -->

    <div class="img_box float_left ">
        <h3>images of advertising:</h3>
        <div class="images shadow">
        
            <img src="../layout/images/fisrt_car.jpg"/>
            <img src="../layout/images/second_car.jpg"/>
            <img src="../layout/images/third_car.jpg"/>
            <img src="../layout/images/fourth_car.jpg"/>
            <img src="../layout/images/fifth_car.jpg"/>
       
        </div>
        <div class="control  shadow">
            <span id="previous" class="previous float_left text_center">Previous</span>
            <span id="dots" class="dots">
                <ul id="ul_dots">
                    <li data-index="1">1</li>
                    <li data-index="2">2</li>
                    <li data-index="3">3</li>
                    <li data-index="4">4</li>
                    <li data-index="5">5</li>
                </ul>
            </span>
            <span id="next" class="next float_right text_center">Next</span>
        </div>
    </div>

    <!-- end images -->

    <!-- start info -->

    <div class="info float_right" >
        <h3>information:</h3>

        <div class="public_info">
            <h4 class="text_center">public information</h4>
        </div>

        <div class="special_info">
            <h4 class="text_center">special information</h4>
        </div>
    </div>

    <!-- end info -->

    <!-- start description -->

    <div class="description float_left">
        <h3>description:</h3>
    
        <div>
            <p></p>
        </div>
    
    </div>

    <!-- end description -->

    <?php
        // add contact us at footer
        include '../includes/templates/contact Us footer.php';
        // add footer which has coopyright
        include '../includes/templates/footer.php';
        // add button to go up
        include '../includes/templates/go up.php';
    ?>
    
    <script src="../layout/javascript/Advertising page_js.js"></script>
    <script src="../layout/javascript/navegation.js"></script>
    <script src="../layout/javascript/images slider.js"></script>
    <script src="../layout/javascript/go up_js.js"></script>
</body>
</html>