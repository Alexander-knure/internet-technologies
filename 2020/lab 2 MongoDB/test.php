<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;

$cursor = $collection->find([], [
   "type" => "laboratory", "group" => "КИУКИ-17-5"
]);
foreach ($cursor as $document) 
{
   printf("%s: %s<br>", $document['laboratory'],
   $document['disciple ']);
}
?>


