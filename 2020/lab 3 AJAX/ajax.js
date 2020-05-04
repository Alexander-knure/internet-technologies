function GroupQuery()
{
    let ajax = new XMLHttpRequest();

    let group = document.getElementById("groupSelect").value;
    
    ajax.onreadystatechange = function() {
		if (ajax.readyState === 4 && ajax.status === 200) {
			document.getElementById("groupTable").innerHTML = ajax.responseText;
		}
    };

    ajax.open('GET', `GroupQuery.php?group=${group}`);
    ajax.send();
}

function TeacherQuery()
{
    let ajax = new XMLHttpRequest();
    let teacher = document.getElementById("teacherSelect").value; 

    ajax.onload = () => 
    {
        let result = document.getElementById("teacherTable"); 
        result.innerHTML = '';
        let xml = ajax.responseXML;
        
        if(xml == null) {
            return;
        }
        console.log(xml);
        let week_days =xml.getElementsByTagName("week_day");
        let lesson_numbers=xml.getElementsByTagName("lesson_number");
        let auditoriums=xml.getElementsByTagName("auditorium");
        let disciples =xml.getElementsByTagName("disciple");
        let titles =xml.getElementsByTagName("title");
        let types =xml.getElementsByTagName("type");
        console.log(week_days);

        for (var i = 0; i < week_days.length; i++) 
        {
            let tr = document.createElement('tr');

			let td = document.createElement('td');
			td.innerHTML = week_days[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = lesson_numbers[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = auditoriums[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = disciples[i].textContent;
            tr.appendChild(td);
            
            td = document.createElement('td');
			td.innerHTML = titles[i].textContent;
            tr.appendChild(td);
            
            td = document.createElement('td');
			td.innerHTML = types[i].textContent;
			tr.appendChild(td);

			result.appendChild(tr);
        }
    };
    
    ajax.open('GET', `TeacherQuery.php?teacher=${teacher}`);
    ajax.send();
}

function AuditoriumQuery()
{
    let ajax = new XMLHttpRequest();
    let aud = document.getElementById('auditoriumSelect').value;
    
    ajax.onload = () => {
        let result = document.getElementById(`auditoriumTable`);
        result.innerHTML='';
        
        let response = ajax.responseText;
        
        if(response==null)
        {
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