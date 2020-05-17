<form class="needs-validation" action="addCustomNumber.php" method="get" novalidate>


<?php
$ind = $_GET['number'];
for($i = 0; $i < $ind; $i++){
echo '<div  class="row">
<div class="col-md-6 mb-3">
        <label for="Key">Название поля ',$i+1,'</label>
        <input type="text" class="form-control" name="k',$i,'" id="Key',$i,'" value="" required>
        <div class="invalid-feedback">
            Valid key is required.
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="Value">Значение ',$i+1 ,'</label>
        <input type="tel" class="form-control" name="v',$i,'" id="Value',$i,'" value="" required>
        <div class="invalid-feedback">
            Valid value is required.
        </div>
    </div>
    </div>
';

}
echo '    </div>
<hr class="mb-4">
<button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Добавить контакт</button>
</form> ';
?>
