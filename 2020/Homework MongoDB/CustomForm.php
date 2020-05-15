<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;
?>
</div>
<form class="needs-validation" novalidate>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="Key">Название поля</label>
            <input type="text" class="form-control" id="Key" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid key is required.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Value">Значение</label>
            <input type="tel" class="form-control" id="Value" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid value is required.
            </div>
        </div>
    </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Добавить</button>