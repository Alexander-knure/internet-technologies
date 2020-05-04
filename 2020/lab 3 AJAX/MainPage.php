<?php include 'Connect.php'; ?>
<html>
   <head>
      <meta charset="utf-8">
      <title>Shedule</title>
      <script src="ajax.js"></script>
   </head>
   <body>
         <b>Group schedule</b>
         <select id="groupSelect" name="group">
         <?php
            $qGroup = $dbh -> query('SELECT `ID_Groups`, `title` from `groups`');
            while($rowG = $qGroup ->fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowG['ID_Groups'],'">',$rowG['title'],
                  '</option>';   
            }
            ?>
         </select>
         <input id="btnGroup" type="button" name="send" value="OPEN" onClick="GroupQuery()">

         <table border="1">
            <thead><tr><th>week_day</th><th>lesson_number</th><th>auditorium</th><th>disciple</th><th>name</th><th>type</th></thead>
            <tbody id="groupTable"></tbody>
         </table>
         
         <br><br>

         
         <b>Teacher schedule</b>
         <select id="teacherSelect" name="teacher">';
         <?php
            $qTeacher = $dbh -> query('SELECT `ID_Teacher`, `name` FROM `teacher`');
            while($rowT = $qTeacher ->fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowT['ID_Teacher'],'">',$rowT['name'],
                  '</option>';   
            }
            ?>
         </select>
         <input id="btnTeacher" type="button" name="send" value="OPEN" onClick="TeacherQuery()">

   
         <table border="1">
         <thead><tr><th>week_day</th><th>lesson_number</th><th>auditorium</th><th>disciple</th><th>Group</th><th>type</th></thead>
         <tbody id="teacherTable"></tbody>
         </table>

         <br><br>

         <b>Auditorium schedule</b>
         <select id="auditoriumSelect" name="aud">';
         <?php
            $qAuditorium = $dbh -> query('SELECT DISTINCT `auditorium` FROM `lesson`');
            while($rowA = $qAuditorium ->fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowA['auditorium'],'">',$rowA['auditorium'],
                  '</option>';   
            }
         ?>
         </select>
         <input id="btnAuditorium" type="button" name="send" value="OPEN" onClick="AuditoriumQuery()">

         <table border="1">
         <tbody id="auditoriumTable"></tbody>
         </table>


         <br><br>

      <form action="Add.php" method="POST">
         <b>Add new practical lesson:</b><br><br>
         Input day of week<br>
         <input type="text" name="week" value="Saturday"><br>
         Input number of lesson<br>
         <input type="number" min="1" name="numberL" value="1"><br>
         Input number of auditorium<br> 
         <input type="text" name="audN" value="100"><br>
         Input name of disciple<br> 
         <input type="text" name="disciple" value="Math"><br><br>
         <b>Choose teacher</b>
         <select name="teacher">';
         <?php
            $qTeacher = $dbh -> query('SELECT `ID_Teacher`, `name` FROM `teacher`');
            while($rowT = $qTeacher -> fetch(PDO::FETCH_ASSOC))
            {    
                  echo'<option value="',
                  $rowT['ID_Teacher'],'">',$rowT['name'],
                  '</option>';   
            }
         ?>

         </select><br><br>
         <b>Choose group</b>
         <select name="group">';
         <?php    $qGroup = $dbh -> query('select `ID_Groups`, `title` from `groups`');
            while($rowG = $qGroup ->fetch(PDO::FETCH_ASSOC))
            {    
             echo'    <option value="',
            $rowG['ID_Groups'],'">',$rowG['title'],
            '</option>';   
            }
            
            ?></select>
         <input type="submit" name="send" value="ADD">
      </form>
   </body>
</html>