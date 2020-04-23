<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;

$where=array( '$and' => array( array("type" => "laboratory"), array("groups" => $_POST['group'])));
$cursor = $collection->find($where);

echo '<table border="1"> <caption>Расписание лабораторных работ ',$_POST['group'],'</caption><tr><th>дата</th><th>№ пары</th><th>аудитория</th><th>дисциплина</th><th>преподаватель</th>';
?>
<script type="text/javascript">
    localStorage.clear();
    localStorage.setItem("page", "LaboratoryPage");
    localStorage.setItem("group", "<?echo $_POST["group"];?>");
    localStorage.setItem("type", "laboratory");
</script>

<?
$arr_date = array();
$arr_lessons_number = array();
$arr_auditorium = array();
$arr_disciple = array();
$arr_teacher = array();
$size=0;

foreach ($cursor as $document) 
{
    echo '<tr>  <td>',$document['date'],'</td>',
               '<td>',$document['lessons_number'],'</td>',
               '<td>',$document['auditorium'],'</td>',
               '<td>',$document['disciple'],'</td>',
               '<td>',$document['teacher'],'</td>',
         '</tr>';   

    array_push($arr_date, $document['date']);
    array_push($arr_lessons_number, $document['lessons_number']);
    array_push($arr_auditorium, $document['auditorium']);
    array_push($arr_disciple, $document['disciple']);
    array_push($arr_teacher, $document['teacher']);
    $size++;
}
echo '</table><br><a href="MainPage.php">Back</a>';
?>

<script type="text/javascript">
    var arr_date = <?echo json_encode($arr_date);?>;
    var arr_lessons_number = <?echo json_encode($arr_lessons_number);?>;
    var arr_auditorium = <?echo json_encode($arr_auditorium);?>;
    var arr_disciple = <?echo json_encode($arr_disciple);?>;
    var arr_teacher = <?echo json_encode($arr_teacher);?>;

    localStorage.setItem("size","<?echo $size;?>");
    localStorage.setItem("date", JSON.stringify(arr_date));
    localStorage.setItem("lessons_number",JSON.stringify(arr_lessons_number));
    localStorage.setItem("auditorium",JSON.stringify(arr_auditorium));
    localStorage.setItem("disciple",JSON.stringify(arr_disciple));
    localStorage.setItem("teacher",JSON.stringify(arr_teacher));
</script> 