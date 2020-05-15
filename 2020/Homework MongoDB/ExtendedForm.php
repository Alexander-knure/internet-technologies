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
            <label for="phoneNumber">Номер телефона</label>
            <input type="tel" class="form-control" id="phoneNumber" placeholder="" value="" required>
            <div class="invalid-feedback">
                Number is required.
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="lastName">Фамилия</label>
        <input type="text" class="form-control" id="lastName" placeholder="Fisher" required>
        <div class="invalid-feedback">
            Please enter your lastname.
        </div>
    </div>

    <div class="mb-3">
        <label for="email">Email <span class="text-light">(Необязательно)</span></label>
        <input type="email" class="form-control" id="email" placeholder="you@example.com">
        <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
        </div>
    </div>

    <div class="mb-3">
        <label for="address">Адрес</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
        <div class="invalid-feedback">
            Please enter your address.
        </div>
    </div>

    <div class="mb-3">
        <label for="address2">Адрес 2 <span class="text-light">(Необязательно)</span></label>
        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
    </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Добавить</button>
    