<?php
require_once __DIR__ . "/vendor/autoload.php";

$collection = (new MongoDB\Client)->lab2->lessons;

$where=array( '$and' => array( array("type" => "lecture"), array("disciple" => $_POST['disciple']),  array("teacher" => $_POST['teacher'])));
$cursor = $collection->find($where);

echo '<table border="1"> <caption>Расписание лекций по дисциплине ',$_POST['disciple'],' у ',$_POST['teacher'],'</caption><tr><th>дата</th><th>№ пары</th><th>аудитория</th><th>группы</th>';

?>
<script type="text/javascript">
    localStorage.clear();
    localStorage.setItem("page", "LecturePage");
    localStorage.setItem("type", "lecture");
    localStorage.setItem("disciple","<?echo $_POST["disciple"];?>");
    localStorage.setItem("teacher", "<?echo $_POST["teacher"];?>");
</script>
<?
$arr_date = array();
$arr_lessons_number = array();
$arr_auditorium = array();
$arr_group = array();
$arr_groups = array();
$size = 0;
foreach ($cursor as $document) 
{
    echo '<tr>   <td>',$document['date'],'</td>',
                '<td>',$document['lessons_number'],'</td>',
                '<td>',$document['auditorium'],'</td>',
                '<td>';
                foreach($document['groups'] as $array)
                {
                    echo $array," ";
                    array_push($arr_group, $array);
                }
    echo '</td></tr>';   

    array_push($arr_date, $document['date']);
    array_push($arr_lessons_number, $document['lessons_number']);
  
    $dot_separated = "";
    $dot_separated = implode(" ", $arr_group);
    array_push($arr_groups, $dot_separated);
    $dot_separated = implode(".", $arr_groups);

    array_push($arr_auditorium, $document['auditorium']);
    $arr_group = array();
    $size++;
}
echo '</table><br><a href="MainPage.php">Back</a>';
?>

<script type="text/javascript">
    var arr_date = <?echo json_encode($arr_date);?>;
    var arr_lessons_number = <?echo json_encode($arr_lessons_number);?>;
    var arr_auditorium = <?echo json_encode($arr_auditorium);?>;
    var arr_group = <?echo json_encode($arr_groups);?>;

    localStorage.setItem("size","<?echo $size;?>");
    localStorage.setItem("date",JSON.stringify(arr_date));
    localStorage.setItem("lessons_number",JSON.stringify(arr_lessons_number));
    localStorage.setItem("auditorium",JSON.stringify(arr_auditorium));
    localStorage.setItem("group",JSON.stringify(arr_group));
</script>
