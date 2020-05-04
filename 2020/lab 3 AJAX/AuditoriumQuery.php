<?php
header("Content-Type: application/json");
include 'Connect.php';


$sth = $dbh->prepare("SELECT `week_day`,`lesson_number`,`disciple`,`name`,`title`,`type` 
                        FROM `lesson` Left join lesson_groups on lesson.ID_Lesson=lesson_groups.FID_Lesson2
                        Left join lesson_teacher on lesson_teacher.FID_Lesson1=lesson.ID_Lesson
                        Left join groups on lesson_groups.FID_Groups=groups.ID_Groups
                        Left join teacher on lesson_teacher.FID_Teacher=teacher.ID_Teacher 
                        WHERE auditorium=('".$_GET['aud']."')
                        ");
$sth->execute();
$res = $sth->fetchAll(PDO::FETCH_OBJ);

echo json_encode($res);
?>