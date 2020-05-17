<?php require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;

$key = $_GET['dKey'];
$value = $_GET['dValue'];

$collection->deleteOne([$key => $value]);

header('Location: MainPage.php');
?>