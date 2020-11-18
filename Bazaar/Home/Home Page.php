
<?php 
session_start();

// number of advertising to show in single page
$NumberOfAdsInSinglePage = 5;

// when you come from any page, set counter
if(isset($_GET['setCounter'])){
    $_SESSION['counter'] = 1;
}

// when page refreshed, reset counter
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
if( $pageRefreshed == 1){
    
    // if refresh and next was clicked
    if(isset($_GET['nextPage'])){
        $_SESSION['counter'] = 0;
        
    }
    // if refresh and previous was clicked
    if (isset($_GET['previousPage'])) {
        $_SESSION['counter'] = 1;
    }
}

// import needed classes
include '../includes/classes/Advertising.php';
include './../includes/classes/Database.php';

// connact to database
$pdo = new Database('localhost', 'root', '', 'bazaar');
$db = $pdo->startConnact();
$pdo->setDeafultFetchAsObject($db);

// get number of ads in database, to use it in index of ad on page
$numberOfAdsSQLCode = "SELECT count(*) FROM advertising"; 
$numberOfAdsResult = $db->prepare($numberOfAdsSQLCode); 
$numberOfAdsResult->execute(); 
$numberOfAds = $numberOfAdsResult->fetchColumn();

// index of ad (which advertising showed)
$index = $numberOfAds;

$IDsOfAdsSQLCode = "SELECT ad_number FROM advertising"; 
$IDsOfAdsResult = $db->prepare($IDsOfAdsSQLCode); 
$IDsOfAdsResult->execute(); 

// IDs of advertising
// and it will add as object
$IDsOfAds = $IDsOfAdsResult->fetchAll();


// check before create advertising

// when click next -------------------------------------------------------------
if(isset($_GET['nextPage'])){

    $index = $index - ($NumberOfAdsInSinglePage * $_SESSION['counter']);

    ++$_SESSION['counter'];
    
}
 
// when click previous ---------------------------------------------------------
if(isset($_GET['previousPage'])){
    
    if($_SESSION['counter'] > 1){
        $index = $index - ($NumberOfAdsInSinglePage * ($_SESSION['counter']-2));
    
        --$_SESSION['counter'];
    }
    
}

// check we are in which page, for disabled next or previous buttons------------

// if index / $NumberOfAdsInSinglePage <= 1, then we are in last page
if($index/$NumberOfAdsInSinglePage <= 1){
    // then disabled next button
    echo '<style>.dis_next{pointer-events: none !important;'
                                . ' opacity: .4 !important;'
                                . ' user-select: none !important;'
                                . ' cursor: no-drop !important;}</style>';
    
} else { // if not, don't disabled next button
    echo '<style> .dis_next{pointer-events: auto !important; '
                                . ' opacity: 1 !important; '
                                . ' user-select: none !important;'
                                . ' cursor: pointer !important;}</style>';
}

// if counter <= 1, then we are in first page
if($_SESSION['counter'] <= 1){
    // then disabled previous button
    echo '<style>.dis_previous{pointer-events: none !important;'
                                . ' opacity: .4 !important;'
                                . ' user-select: none !important;'
                                . ' cursor: no-drop !important;}</style>';
    
} else { // if not, don't disabled previous button
    echo '<style> .dis_previous{pointer-events: auto !important; '
                                . ' opacity: 1 !important; '
                                . ' user-select: none !important;'
                                . ' cursor: pointer !important;}</style>';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="../layout/css/normalizer.css" />
    <link rel="stylesheet" href="../layout/css/framework.css"/>
    <link rel="stylesheet" href="../layout/css/navegation_css.css"/>
    <link rel="stylesheet" href="../layout/css/advertising container.css"/>
    <link rel="stylesheet" href="../layout/css/contact Us footer.css"/>
    <link rel="stylesheet" href="../layout/css/footer.css"/>
    <link rel="stylesheet" href="../layout/css/go up_css.css"/>
    <link rel="stylesheet" href="../layout/css/Home Page_css.css"/>
    

</head>
<body>
    
    <?php 
        // add navegation
        include '../includes/templates/navegation.php';
 
    ?>    

    <!-- start classes  -->

    <div id="classes" class="classes  float_right text_center">

        <h2>classes</h2>
        <!-- start vehicles -->
        <section class="vehicles">
            <h2>vehicles</h2>
            <ul class="types">
                <li class="cars"><a>cars</a></li>
                <li class="trucks"><a>trucks</a></li>
                <li class="bicycles"><a>bicycles</a></li>
                <li class="all"><a>all</a></li>
            </ul>
        </section>
        <!-- end vehicles -->

        <!-- start real_estate -->
        <section class="real_estate">
            <h2>real estate</h2>
            <ul class="types">
                <li class="houses"><a>houses</a></li>
                <li class="apartments"><a>apartment</a></li>
                <li class="Al-strahaat"><a>al-strahaat</a></li>
                <li class="lands"><a>lands</a></li>
                <li class="all"><a>all</a></li>
            </ul>
        </section>
        <!-- end real_estate -->

        <!-- start services -->
        <section class="services">
            <h2>services</h2>
            <ul class="types">
                <li class="teach"><a>teach</a></li>
                <li class="delivery"><a>delivery</a></li>
                <li class="all"><a>all</a></li>
            </ul>
        </section>
        <!-- end services -->
    </div>

    <!-- end classes -->

    <!-- start ad container -->
    
    <?php
    
    // start loop
    $start = 0;
    // create object from Advertising class
    $ad = new Advertising();
    
    // if last Ads are less than what we want to show in single page($NumberOfAdsInSinglePage)
    if($index<$NumberOfAdsInSinglePage){
        // then, chenge times of loops for last ads (change end)
        $end = $index;
        while ($start<$end){
            // get data of this object (ad), to show it
            $ad->getAllAdvertisingDataByID($IDsOfAds[$index-1]->ad_number, $db);
            $img = $ad->getImages();
            
            // add ad container
            include '../includes/templates/advertising container.php';
            // go next index (ad) of ads
            $index--;
            // go next loop
            $start++;
        }
    } else { // if not, show ads as much we want in $NumberOfAdsInSinglePage
        while ($start<$NumberOfAdsInSinglePage){
            // get data of this object (ad), to show it
            $ad->getAllAdvertisingDataByID($IDsOfAds[$index-1]->ad_number, $db);
            $img = $ad->getImages();
            // add ad container
            include '../includes/templates/advertising container.php';
            // go next index (ad) of ads
            $index--;
            // go next loop
            $start++;
        }
    }

       
    
    ?>
    
    <!-- end ad container -->
    
    <div class="clear"></div>
    
    <!-- start next and previous buttons-->

    <div class="control_pages">
        <a href='Home Page.php?previousPage=true' class="previousPage text_center dis_previous">Previous Page</a>
        <!-- to show number of page -->
        <span class="text_center"><?php echo "Page #". (ceil($index/$NumberOfAdsInSinglePage) +1);?></span>
        
        <a href='Home Page.php?nextPage=true' class="nextPage text_center dis_next" id="nextHome">Next Page</a>
    </div>
    
    <!-- end next and previous buttons-->

    <?php
        // add contact us at footer
        include '../includes/templates/contact Us footer.php';
        // add footer which has coopyright
        include '../includes/templates/footer.php';
        // add button to go up
        include '../includes/templates/go up.php';
    ?>


    <script src="../layout/javascript/Home Page_js.js"></script>
    <script src="../layout/javascript/navegation.js"></script>
    <script src="../layout/javascript/advertising container.js"></script>
    <script src="../layout/javascript/go up_js.js"></script>

</body>
</html>
