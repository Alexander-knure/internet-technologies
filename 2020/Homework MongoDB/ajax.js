function SimpleForm() {
    let ajax = new XMLHttpRequest();

    let frm = document.getElementById("form1").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `SimpleForm.php`);
    ajax.send();
}

function ExtendedForm() {
    let ajax = new XMLHttpRequest();

    let frm = document.getElementById("form2").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `ExtendedForm.php?`);
    ajax.send();
}

function CustomForm() {
    let ajax = new XMLHttpRequest();

    let frm = document.getElementById("form3").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `CustomForm.php?`);
    ajax.send();
}

function EditForm() {
    let ajax = new XMLHttpRequest();

    let frm = document.getElementById("form4").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `EditForm.php?`);
    ajax.send();
}

function SearchForm() {
    let ajax = new XMLHttpRequest();

    let frm = document.getElementById("form5").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `SearchForm.php?`);
    ajax.send();
}
//////////////////////////////////////////////////////////////////////////////////////////
function AddKeyValueForm() {
    let ajax = new XMLHttpRequest();

    //let key = document.getElementById("Key" + 1).value;
    //let value = document.getElementById("Value" + 1).value;
    let number = document.getElementById("inputNumber").value;
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedCustomForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `KeyValueForm.php?number=${number}`);

    ajax.send();
}

function DeleteTableForm() {
    let ajax = new XMLHttpRequest();

    let key = document.getElementById("inlineDeleteFormKey").value;
    let value = document.getElementById("inlineDeleteFormValue").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedEditForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `deleteTable.php?key=${key}&value=${value}`);
    ajax.send();
}

function EditTableForm() {
    let ajax = new XMLHttpRequest();

    let key = document.getElementById("inlineEditFormKey").value;
    let value = document.getElementById("inlineEditFormValue").value;
    let changeValue = document.getElementById("inlineEditFormChangeValue").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedEditForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `editTable.php?key=${key}&value=${value}&changeValue=${changeValue}`);
    ajax.send();
}

function SearchNameForm() {
    let ajax = new XMLHttpRequest();

    let name = document.getElementById("inlineSearchFormSelect").value;
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedTableForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `searchName.php?name=${name}`);
    ajax.send();
}

function SearchKeyValueForm() {
    let ajax = new XMLHttpRequest();
    let key = document.getElementById("inlineSearchFormkey").value;
    let value = document.getElementById("inlineSearchFormvalue").value;

    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedTableForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `searchKeyValue.php?key=${key}&value=${value}`);
    ajax.send();
    countForms++;
}

function AddTableForm() {
    let ajax = new XMLHttpRequest();


    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("choosedTableForm").innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', `TableForm.php?`);

    ajax.send();
    countForms++;
}