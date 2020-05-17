<?php 
require_once __DIR__ . "../vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;

if($_GET['name'] != null && $_GET['phone'] != null){
$doc = array("name" => $_GET['name'],
   "phone" => $_GET['phone']
);
$collection->insertOne($doc);
}


header('Location: MainPage.php');
?>