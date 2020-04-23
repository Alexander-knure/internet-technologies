<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;

$cursor = $collection->find(array('auditorium' => $_POST['auditorium']));

echo '<table border="1"> <caption>Расписание аудитории</caption><tr><th>дата</th><th>№ пары</th><th>дисциплина</th><th>тип</th><th>группы</th><th>преподаватель</th>';


foreach ($cursor as $document) 
{
    echo '<tr>  <td>',$document['date'],'</td>',
               '<td>',$document['lessons_number'],'</td>',
               '<td>',$document['disciple'],'</td>',
               '<td>',$document['type'],'</td>',
               '<td>';
               foreach($document['groups'] as $array)
               {
                   echo $array," ";
               }
    echo '</td>','<td>',$document['teacher'],'</td>','</tr>';   

}

echo '</table><br><a href="MainPage.php">Back</a>';
?>