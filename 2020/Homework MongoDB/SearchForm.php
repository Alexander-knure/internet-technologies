<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;
$cursor = $collection->find();?>

<div class="text-center">
    <form>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <?php 
                           $selectList = $cursor ->  $collection->find('name');
                           while(selectList)
                           {    
                                 echo'<option value="',
                                 $rowT['ID_Teacher'],'">',$rowT['name'],
                                 '</option>';   
                           }
                    ?>
                </select>
            </div>
            <div class="col-auto my-1">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
                </div>
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


    <table class="table table-striped">
        <thead class="bg-primary">
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Номер телефона</th>
            </tr>
        </thead>
        <tbody>

<?php
$arr_name = array();
$arr_numbers = array();
$size=0;

foreach ($cursor as $document) 
{
    echo '<tr class="table-light text-dark">  <td>',$document['name'],'</td>',
               '<td>',$document['phone'],'</td>',
         '</tr>';   

    array_push($arr_name, $document['name']);
    array_push($arr_numbers, $document['phone']);
    $size++;
}

echo '</tbody></table></div>';
?>