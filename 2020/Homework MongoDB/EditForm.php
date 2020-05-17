<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;
$cursor = $collection->find();
?>
<hr class="mb-4">
<div class="text-center">
    <form class="needs-validation" action="deleteTable.php" method="get" novalidate>
        <div class="form-row">
            <div class="col-auto my-1 ml-4">
                <select class="text-dark custom-select mr-sm-4" name="dKey" id="inlineDeleteFormKey">
                    <option selected>Название поля...</option>
                    <?php
                    $headers = $collection->findOne();
                    while ($keys = current($headers)) {
                        if (key($headers) != "_id") 
                            echo '<option>', key($headers), '</option>';
                        next($headers);
                    }
                    ?>
                </select>
            </div>

            <div class="col-auto my-1">
                <input type="text" class="form-control" name="dValue" id="inlineDeleteFormValue" placeholder="Значение" value="">
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary btn-danger" name="btnDelete" onClick="DeleteTableForm()">Удалить по ключу</button>
            </div>
        </div>
    </form>

    <hr class="mb-4">
    <form class="needs-validation" action="editTable.php" method="get" novalidate>
        <div class="form-row">

            <div class="col-auto my-1 ml-4">
                <select class="text-dark custom-select mr-sm-4" name="eKey" id="inlineEditFormKey">
                    <option selected>Поиск поля...</option>
                    <?php
                    $headers2 = $collection->findOne();
                    while ($keys = current($headers2)) {
                        if (key($headers2) != "_id") {
                            echo '<option>', key($headers2), '</option>';
                        }
                        next($headers2);
                    }
                    ?>
                </select>
            </div>

            <div class="col-auto my-1">
                <input type="text" class="form-control " name="eValue" id="inlineEditFormSValue" placeholder="Поиск значения" value="">
            </div>

            <div class="col-auto my-1">
                <select class="text-dark custom-select mr-sm-4" name="eChangeKey" id="inlineDeleteFormKey">
                    <option selected>Изменение поля...</option>
                    <?php
                    $headers = $collection->findOne();
                    while ($keys = current($headers)) {
                        if (key($headers) != "_id") 
                            echo '<option>', key($headers), '</option>';
                        next($headers);
                    }
                    ?>
                </select>
            </div>

            <div class="col-auto my-1">
                <input type="text" class="form-control " name="eChangeValue" id="inlineEditFormChangeValue" placeholder="Изменение значения" value="">
            </div>

            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary btn-warning" name="btnEdit" onClick="EditTableForm()">Изменить на значение</button>
            </div>
        </div>
    </form>

    <hr class="mb-4">
    </form>
    <div id="choosedEditForm"></div>