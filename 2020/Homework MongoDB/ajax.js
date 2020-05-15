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



function AuditoriumQuery() {
    let ajax = new XMLHttpRequest();
    let aud = document.getElementById('auditoriumSelect').value;

    ajax.onload = () => {
        let result = document.getElementById(`auditoriumTable`);
        result.innerHTML = '';

        let response = ajax.responseText;

        if (response == null) {
            return;
        }
        console.log(response);
        let data = JSON.parse(response);


        let table = document.createElement('tbody');
        let tr = document.createElement('tr');
        let th = document.createElement('th');
        th.innerText = 'week_day';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'lesson_number';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'disciple';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'name';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'group';
        tr.appendChild(th);

        th = document.createElement('th');
        th.innerText = 'type';
        tr.appendChild(th);
        table.appendChild(tr);
        data.forEach(element => {
            tr = document.createElement('tr');

            let td = document.createElement('td');
            td.innerText = element.week_day;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = element.lesson_number;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = element.disciple;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = element.name;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = element.title;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = element.type;
            tr.appendChild(td);

            table.appendChild(tr);
        });
        result.appendChild(table);
    }


    ajax.open('GET', `AuditoriumQuery.php?aud=${aud}`);
    ajax.send();
}