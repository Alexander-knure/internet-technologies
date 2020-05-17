<?php require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;

$key = $_GET['eKey'];
$value = $_GET['eValue'];
$changeKey = $_GET['eChangeKey'];
$changeValue = $_GET['eChangeValue'];

$collection->updateOne([$key => $value],['$set' => [$changeKey => $changeValue]]);

header('Location: MainPage.php');
?>