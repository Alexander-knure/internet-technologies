<?php require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->Homework->phonebook;
?>
</div>
<hr class="mb-4">
<form class="needs-validation" action="addNumber.php" method="get" novalidate>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="Name">Имя</label>
            <input type="text" class="form-control" name="name" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid name is required.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Phone">Номер телефона</label>
            <input type="tel" class="form-control" name="phone" id="Phone" placeholder="" value="" required>
            <div class="invalid-feedback">
                Number is required.
            </div>
        </div>
    </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Добавить контакт</button>