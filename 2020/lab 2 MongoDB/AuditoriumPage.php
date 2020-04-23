<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;

$cursor = $collection->find(array('auditorium' => $_POST['auditorium']));

echo '<table border="1"> <caption>Расписание аудитории ',$_POST['auditorium'],'</caption><tr><th>дата</th><th>№ пары</th><th>дисциплина</th><th>тип</th><th>группы</th><th>преподаватель</th>';
?>

<script type="text/javascript">
    localStorage.clear();
    localStorage.setItem("page", "AuditoriumPage");
    localStorage.setItem("auditorium","<?echo $_POST["auditorium"];?>");
</script>

<?
$arr_date = array();
$arr_lessons_number = array();
$arr_disciple = array();
$arr_type = array();
$arr_group = array();
$arr_groups = array();
$arr_date = array();
$arr_teacher = array();
$size=0;
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
                   array_push($arr_group, $array);
               }
    echo '</td><td>',$document['teacher'],'</td></tr>';   

    array_push($arr_date, $document['date']);
    array_push($arr_lessons_number, $document['lessons_number']);
    array_push($arr_disciple, $document['disciple']);
    array_push($arr_type, $document['type']);

    $dot_separated = "";
    $dot_separated = implode(" ", $arr_group);
    array_push($arr_groups, $dot_separated);
    $dot_separated = implode(".", $arr_groups);

    array_push($arr_teacher, $document['teacher']);
    $arr_group = array();
    $size++;
}

echo '</table><br><a href="MainPage.php">Back</a>';
?>


<script type="text/javascript">

    var arr_date = <?echo json_encode($arr_date);?>;
    var arr_lessons_number = <?echo json_encode($arr_lessons_number);?>;
    var arr_disciple = <?echo json_encode($arr_disciple);?>;
    var arr_type = <?echo json_encode($arr_type);?>;
    var arr_group = <?echo json_encode($arr_groups);?>;
    var arr_teacher = <?echo json_encode($arr_teacher);?>;


    localStorage.setItem("size","<?echo $size;?>");
    localStorage.setItem("date",JSON.stringify(arr_date));
    localStorage.setItem("lessons_number",JSON.stringify(arr_lessons_number));
    localStorage.setItem("disciple",JSON.stringify(arr_disciple));
    localStorage.setItem("type",JSON.stringify(arr_type));
    localStorage.setItem("group",JSON.stringify(arr_group));
    localStorage.setItem("teacher",JSON.stringify(arr_teacher));
</script>