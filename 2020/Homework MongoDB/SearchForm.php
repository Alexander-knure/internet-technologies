<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;
$cursor = $collection->find();
?>
<hr class="mb-4">
<div class="text-center">
    <div class="form-row align-items-center">
        
        <div class="col-auto my-1 ml-4">

            <select class="text-dark custom-select mr-sm-4" id="inlineSearchFormSelect">
                <option selected>Имя контакта...</option>
                <?php 
                        $distinct = $collection->find( );
                        foreach ($distinct as $document) 
                        {    
                            if(!empty($document))
                            {
                                echo '<option>', $document['name'],'</option>';   
                            }
                        }
                    ?>
            </select>
        </div>

        <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary" onClick="SearchNameForm()">Поиск по имени</button>
        </div>
        <div class="col-auto my-1 ml-4">
            <select class="text-dark custom-select mr-sm-4" id="inlineSearchFormkey">
                <option selected>Название поля...</option>
                <?php
                 $headers = $collection->findOne();
                 while ( $keys = current($headers)) 
                 {
                     if(key($headers) != "_id" )
                     {
                         echo '<option>',key($headers),'</option>';
                     }
                     next($headers);
                 }
                ?>
                </select>
        </div>
        <div class="col-auto my-1">
            <input type="text" class="form-control" name="value" id="inlineSearchFormvalue" placeholder="значение" value="">
        </div>
        <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary" onClick="SearchKeyValueForm()">Поиск по полю</button>
        </div>
        <div class="col-auto my-1 ml-4">
            <button type="submit" class="btn btn-info" onClick="AddTableForm()">Таблица</button>
        </div>

    </div>

    <hr class="mb-4">
    <div id="choosedTableForm"></div>