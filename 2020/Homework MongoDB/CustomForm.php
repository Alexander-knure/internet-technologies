<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;

?>
</div>
<hr class="mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="col-10">
             <input class="form-control" type="number" min="1" max="10" value="1" id="inputNumber">
         </div>
        </div>
    <div class="col-md-6 mb-3">
        <input class="btn btn-primary btn-lg btn-block mb-5" name="addForms" type="submit"
        value="Добавить форму ключ-значение" onClick="AddKeyValueForm()"/>
    </div>
</div>



</div>
    <div id="choosedCustomForm"></div>