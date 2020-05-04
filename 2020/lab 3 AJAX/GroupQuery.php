<?php
include 'Connect.php';
$res = $dbh -> prepare("SELECT `week_day`,`lesson_number`,`auditorium`,`disciple`,`name`,`type` FROM `lesson` 
                        INNER JOIN lesson_groups ON lesson.ID_Lesson = lesson_groups.FID_Lesson2
                        INNER JOIN lesson_teacher ON lesson_teacher.FID_Lesson1 = lesson.ID_Lesson
                        INNER JOIN teacher ON lesson_teacher.FID_Teacher = teacher.ID_Teacher
                        WHERE lesson_groups.FID_Groups={$_GET['group']}
                        ");

$res->execute();

while($row = $res -> fetch(PDO::FETCH_ASSOC))
{ 
        echo '<tr>  <td>',$row['week_day'],'</td>',
                   '<td>',$row['lesson_number'],'</td>',
                   '<td>',$row['auditorium'],'</td>',
                   '<td>',$row['disciple'],'</td>',
                   '<td>',$row['name'],'</td>',
                   '<td>',$row['type'],'</td>',
             '</tr>';   
}
?>