<?php require_once __DIR__ . "/vendor/autoload.php"; 
$collection = (new MongoDB\Client)->lab2->lessons;?>

<html>
   <head>
      <meta charset="utf-8">
      <title>lab2</title>
      <script>

      function LoadPage(){
         alert(localStorage.getItem("page"));
         if(localStorage.getItem("page") == null){
            alert("Нет данных в хранилище...");
         }
         else if(localStorage.getItem("page") == "LaboratoryPage")
         {
            document.write('<table border="1"> <caption>Расписание лабораторных работ ' + localStorage.getItem("group") + '</caption><tr><th>дата</th><th>№ пары</th><th>аудитория</th><th>дисциплина</th><th>преподаватель</th>');
            var arr_date = JSON.parse(localStorage.getItem('date'));       
            var arr_lessons_number = JSON.parse(localStorage.getItem('lessons_number'));
            var arr_auditorium = JSON.parse(localStorage.getItem('auditorium'));          
            var arr_disciple = JSON.parse(localStorage.getItem('disciple'));      
            var arr_teacher = JSON.parse(localStorage.getItem('teacher'));   
            var size = parseInt(localStorage.getItem("size"));
            for(let i = 0; i<size; i++) {
               document.write('<tr><td>' + arr_date[i].split(',') + '</td>');
               document.write('    <td>' + arr_lessons_number[i] + '</td>');
               document.write('    <td>' + arr_auditorium[i].split(',') + '</td>');
               document.write('    <td>' + arr_disciple[i].split(',') + '</td>');
               document.write('    <td>' + arr_teacher[i].split(',') + '</td>');
               document.write('</tr>');
            };
            document.write('</table><br><a href="MainPage.php">Back</a>');
         }
         else if(localStorage.getItem("page") == "LecturePage")
         {
            document.write('<table border="1"> <caption>Расписание лекций по дисциплине '+ localStorage.getItem("disciple") + ' у '+ localStorage.getItem("teacher") + '</caption><tr><th>дата</th><th>№ пары</th><th>аудитория</th><th>группы</th>');
            var arr_date = JSON.parse(localStorage.getItem('date'));          
            var arr_lessons_number = JSON.parse(localStorage.getItem('lessons_number'));
            var arr_auditorium = JSON.parse(localStorage.getItem('auditorium'));      
            var arr_group = JSON.parse(localStorage.getItem('group'));          
            var size = parseInt(localStorage.getItem("size"));
            for(let i = 0; i<size; i++) {
               document.write('<tr><td>' + arr_date[i].split(',')           + '</td>');
               document.write('    <td>' + arr_lessons_number[i] + '</td>');
               document.write('    <td>' + arr_auditorium[i].split(',')     + '</td>');
               document.write('    <td>' + arr_group[i].split('.')          + '</td>');
               document.write('</tr>');
            };
            document.write('</table><br><a href="MainPage.php">Back</a>');
         }
         else if(localStorage.getItem("page") == "AuditoriumPage")
         {
            document.write('<table border="1"> <caption>Расписание аудитории '+ localStorage.getItem("auditorium") +'</caption><tr><th>дата</th><th>№ пары</th><th>дисциплина</th><th>тип</th><th>группы</th><th>преподаватель</th>');
            var arr_date = JSON.parse(localStorage.getItem('date'));          
            var arr_lessons_number = JSON.parse(localStorage.getItem('lessons_number'));
            var arr_disciple = JSON.parse(localStorage.getItem('disciple'));      
            var arr_type = JSON.parse(localStorage.getItem('type'));          
            var arr_group = JSON.parse(localStorage.getItem('group'));         
            var arr_teacher = JSON.parse(localStorage.getItem('teacher'));      
            var size = parseInt(localStorage.getItem("size"));
            for(let i = 0; i<size; i++) {
               document.write('<tr><td>' +  arr_date[i].split(',')  + '</td>');
               document.write('    <td>' +  arr_lessons_number[i] + '</td>');
               document.write('    <td>' +  arr_disciple[i].split(',')  + '</td>');
               document.write('    <td>' +  arr_type[i].split(',')  + '</td>');
               document.write('    <td>' +  arr_group[i].split('.') + '</td>');
               document.write('    <td>' +  arr_teacher[i].split(',')  + '</td>');
               document.write('</tr>');
            };
            document.write('</table><br><a href="MainPage.php">Back</a>');
         }
      }
      </script>
   </head>
   <body>
      <form action="LaboratoryPage.php" method="POST">
         <b>Laboratory schedule</b>
         <select name="group" id="value_group">
         <?php
            var_dump($document['laboratory']);
            $cursorLab = $collection->distinct("groups");
            foreach ($cursorLab as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <input type="submit" name="send" value="OPEN">
      </form>
      

      <form action="LecturePage.php" method="POST">
         <b>Lecture schedule</b>
         <select name="teacher" id="value_teacher">
         <?php
            $cursorTeacher = $collection->distinct("teacher");
            foreach ($cursorTeacher as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <select name="disciple" id="value_disciple">
         <?php
            $cursorDisciple = $collection->distinct("disciple");
            foreach ($cursorDisciple as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <input id="LecturePage" type="submit" name="send" value="OPEN">
      </form>

      <form action="AuditoriumPage.php" method="POST">
         <b>Auditorium schedule</b>
         <select name="auditorium" id="value_auditorium">
         <?php
            $cursorAud = $collection->distinct("auditorium");
            foreach ($cursorAud as $document) 
            {   
                  echo'<option value="',$document,'">',
                  $document,
                  '</option>';  
            }
            ?>
         </select>
         <input id="AuditoriumPage" type="submit" name="send" value="OPEN">
      </form>

      <form>
         <input id="btnWebStorage" type="button" name="load" value="LOAD" onclick="LoadPage()">
      </form>
   </body>
</html>