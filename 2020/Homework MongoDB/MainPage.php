<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ajax.js"></script>
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>Phonebook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container">
        <div class="py-3">
            <h1 class="text-center">Телефонная книга</h1>
            <p class="lead text-center">Хранение данных с произвольным набором полей. Основные возможности:</p>
            <ul class="list-group text-dark">
                <li class="list-group-item">Добавление новой записи с произвольным набором полей</li>
                <li class="list-group-item">Фильтрация вывода документов по заданному пользователем параметру</li>
                <li class="list-group-item">Редактирование и удаление выбранного документа</li>
            </ul>

        </div>

        <div>
            <div class="col-md-16 order-md-1">
                <h4 class="text-center mb-3">Форма</h4>
                <div class="text-center">
                    <div class="btn-group ">
                        <label class="btn btn-primary">
                            <input type="radio" name="form" id="form1" onClick="SimpleForm()"> Простая
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="form" id="form2" onClick="ExtendedForm()"> Расширенная
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="form" id="form3" onClick="CustomForm()"> Пользовательская
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="form" id="form4" onClick="EditForm()"> Редактирование
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="form" id="form5" onClick="SearchForm()"> Поиск
                        </label>
                    </div>
                </div>
                <div id="choosedForm"></div>
                <!--
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Name">Имя</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Номер телефона</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Number is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Необязательно)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Адрес</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Адрес 2 <span class="text-muted">(Необязательно)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>
                    -->
     
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script> window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="validation.js"></script>
</body>

</html>