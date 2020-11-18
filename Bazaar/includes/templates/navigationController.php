<?php
session_start();
$status = $_SESSION['status'];
$sellerID = $_SESSION['sellerID'];

$itemNavClicked = $_GET['itemNavClicked'];
switch ($itemNavClicked) {
    case 'home':
        header('location: http://localhost/PhpProject%D9%A1/Bazaar/Home/Home%20Page.php?setCounter=true');
        break;
    
    case 'profile':
        if($status == 1){ // if he log in, open profle
            header('location: http://localhost/PhpProject%D9%A1/Bazaar/Profile/Profile%20Page.php');
        } else { // if not, go to log in page
            header('location: http://localhost/PhpProject%D9%A1/Bazaar/Log%20in/Login.php?notLogin=true');
        }
        break;
    
    case 'contactUs':
        header('location: http://localhost/PhpProject%D9%A1/Bazaar/Contact%20Us/Contact%20Us.php');
        break;
    
    case 'logout':
        include '../classes/Database.php';

        // connact to database
        $pdo = new Database('localhost', 'root', '', 'test');
        $db = $pdo->startConnact();
        $pdo->setDeafultFetchAsObject($db);
        
        // reset status of log in
        $resetStatusSQLCode = 'UPDATE seller SET status = 0 WHERE seller_ID = ?';
        $stmtResetStatus = $db->prepare($resetStatusSQLCode);
        $stmtResetStatus->execute([$sellerID]);
        
        $_SESSION['status'] = 0;
        $_SESSION['sellerID'] = 0;
        header('location: http://localhost/PhpProject%D9%A1/Bazaar/Log%20in/Login.php');
        break;

    default:
        break;
}

