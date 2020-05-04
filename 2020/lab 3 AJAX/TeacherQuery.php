<?php
header("Content-Type: text/xml");
include 'Connect.php';
$res = $dbh -> prepare("SELECT week_day,lesson_number,auditorium,disciple,title,type FROM lesson 
                        INNER JOIN lesson_groups ON lesson.ID_Lesson = lesson_groups.FID_Lesson2
                        INNER JOIN lesson_teacher ON lesson_teacher.FID_Lesson1 = lesson.ID_Lesson
                        INNER JOIN groups ON lesson_groups.FID_Groups = groups.ID_Groups
                        WHERE lesson_teacher.FID_Teacher = {$_GET['teacher']}
                        ");
                        
$res->execute();
$result = $res->fetchAll();

?>


<response>
<?php foreach ($result as $row):?>
        <week_day><?=$row['week_day']?></week_day>
        <lesson_number><?=$row['lesson_number']?></lesson_number>
        <auditorium><?=$row['auditorium']?></auditorium>
        <disciple><?=$row['disciple']?></disciple>
        <title><?=$row['title']?></title>
        <type><?=$row['type']?></type>
<?php endforeach; ?>
</response>