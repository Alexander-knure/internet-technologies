<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;

$where=array( '$and' => array( array("type" => "laboratory"), array("groups" => $_POST['group'])));
$cursor = $collection->find($where);

echo '<table border="1"> <caption>Расписание лабораторных работ ',$_POST['group'],'</caption><tr><th>дата</th><th>№ пары</th><th>аудитория</th><th>дисциплина</th><th>преподаватель</th>';


foreach ($cursor as $document) 
{
    echo '<tr>  <td>',$document['date'],'</td>',
               '<td>',$document['lessons_number'],'</td>',
               '<td>',$document['auditorium'],'</td>',
               '<td>',$document['disciple'],'</td>',
               '<td>',$document['teacher'],'</td>',
         '</tr>';   

}

echo '</table><br><a href="MainPage.php">Back</a>';
?>