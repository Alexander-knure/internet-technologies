<?php 
require_once __DIR__ . "../vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;

//for($i = 0; $i < 10; $i++){
//    $key = 'k'.$i;
//    $value = 'v'.$i;
//    if($_GET[$key] != null && $_GET[$value ] != null){
//        array_push($doc,array($_GET[$key ] => $_GET[$value ]));
//    }
//}
////////////////////////////////////////////////////////
//for ($i = 0; $i < 10; $i++) {
//    $key = 'k'.$i;
//    $value = 'v'.$i;
//    if($_GET[$key] != null && $_GET[$value ] != null){
//        $doc[$_GET["k{$i}"] = $_GET["v{$i}"]];
//    }
//}

//$doc = array($_GET['k0'] => $_GET['v0'],
//$_GET['k1'] => $_GET['v1'],
//$_GET['k2'] => $_GET['v2'],
//$_GET['k3'] => $_GET['v3'],
//$_GET['k4'] => $_GET['v4'],
//$_GET['k5'] => $_GET['v5'],
//$_GET['k6'] => $_GET['v6'],
//$_GET['k7'] => $_GET['v7'],
//$_GET['k8'] => $_GET['v8'],
//$_GET['k9'] => $_GET['v9']);

$keys = [];
$values = [];
for($i = 0; $i < 10; $i++){
    if($_GET["k{$i}"] != null && $_GET["v{$i}"] != null){
        array_push($keys,$_GET["k{$i}"]);
        array_push($values,$_GET["v{$i}"]);
    }
}
$doc = array_combine($keys, $values);
$collection->insertOne($doc );
for($i = 0; $i < 10; $i++)
{
    $k = $_GET["k{$i}"];
    if($k != null && $k != 'name' && $k != 'phone' && $k != 'lastname' && $k != 'email'&& $k != 'address' && $k != 'address2')
    {
        $collection->updateOne(
            ['name'=>'Alexander'],
            ['$set' => [$k => ' ']]   
        );
    }
}


header('Location: MainPage.php');
?>