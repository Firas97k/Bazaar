<?php
include './includes/classes/Database.php';
$pdo = new Database('localhost', 'root', '', 'test');
$db = $pdo->startConnact();
$pdo->setDeafultFetchAsObject($db);

include './includes/classes/Advertising.php';
$ad = new Advertising();

$ad->getAllAdvertisingDataByID(13, $db);
$img = $ad->getImages();

$ad->displayImage($img[0]);
?>