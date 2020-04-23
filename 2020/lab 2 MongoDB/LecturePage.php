<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;


$where=array( '$and' => array( array("type" => "lecture"), array("disciple" => $_POST['disciple']),  array("teacher" => $_POST['teacher'])));
$cursor = $collection->find($where);

echo '<table border="1"> <caption>Расписание лекций по дисциплине ',$_POST['disciple'],' у ',$_POST['teacher'],'</caption><tr><th>дата</th><th>№ пары</th><th>аудитория</th><th>группы</th>';


foreach ($cursor as $document) 
{
    echo '<tr>   <td>',$document['date'],'</td>',
                '<td>',$document['lessons_number'],'</td>',
                '<td>',$document['auditorium'],'</td>',
                '<td>';
                foreach($document['groups'] as $array)
                {
                    echo $array," ";
                }
    echo '</td></tr>';   

}

echo '</table><br><a href="MainPage.php">Back</a>';
?>