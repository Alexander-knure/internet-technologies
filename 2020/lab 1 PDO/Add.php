 <?php
include 'Connect.php';
$dbh->beginTransaction();

$res0=$dbh->query("SELECT COUNT(*) from lesson");
$count=$res0 ->fetchColumn();
//echo $count;

$q = "INSERT INTO lesson SET
ID_Lesson='".$count."',
week_day='".$_POST['week']."',
lesson_number='".$_POST['numberL']."',
auditorium='".$_POST['audN']."',
disciple='".$_POST['disciple']."',
type='Practical'";

//$dbh->query($q);
echo $q;
//print_r($_POST);
//echo $_POST['disciple'];

/*$dbh->query("INSERT INTO lesson SET
ID_Lesson='".$count."',
week_day='".$_POST['week']."',
lesson_number='".$_POST['numberL']."',
auditorium='".$_POST['audN']."',
disciple='".$_POST[`nameD`]."',
type='Practical'");*/


$dbh->query("INSERT INTO lesson_groups SET 
FID_Lesson2={$count},
FID_Groups={$_POST['group']}");

$dbh->query("INSERT INTO lesson_teacher SET 
FID_Teacher={$_POST['teacher']},
FID_Lesson1={$count}");

$isOK = $dbh->commit();
if($isOK != 0)
{
    echo '<br>New row added';
}
else
{
    echo '<br>Error in transaction';
}
echo '<br><a href="MainPage.php">Back</a>';
?>