<?php 
require_once __DIR__ . "../vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;

if($_GET['name'] != null && $_GET['phone'] != null &&  $_GET['lastName'] != null && $_GET['address'] != null){
   $doc = array("name" => $_GET['name'],
   "phone" => $_GET['phone'],
   "lastname" => $_GET['lastName'],
   "email" => $_GET['email'],
   "address" => $_GET['address'],
   "address2" => $_GET['address2']
);
   $collection->insertOne($doc);
}


header('Location: MainPage.php');
?>