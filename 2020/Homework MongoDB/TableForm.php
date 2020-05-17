<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;
?>

<table class="table table-striped">
    <thead class="bg-primary">
        <tr>
 <?php 

$headers = $collection->findOne();
while ( $keys = current($headers)) 
{
    if(key($headers) != "_id")
    {
        echo '<th scope="col">',key($headers),'</th>';
    }
    next($headers);
}

echo '</tr></thead><tbody>';

$cursorTable = $collection->find();
foreach ($cursorTable as $document) 
{
    echo '<tr class="table-light text-dark">';  
    $keysForCells = $collection->findOne();
    while ( $keys = current($keysForCells)) {

        if(key($keysForCells) != "_id")
        {
            echo '<td>',$document[key($keysForCells)],'</td>';
            
        }
        
        next($keysForCells);
    }
    echo '</tr>';
    
}

echo '</tbody></table></div>';
?>